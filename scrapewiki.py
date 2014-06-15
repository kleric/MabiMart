import sys
import string
from lxml import html
import requests
from cssselect import HTMLTranslator, SelectorError

def delete_mouseover(element):
  '''Given an element of the tree, looks for and deletes any mouseover text
  associated with it.
  '''
  to_delete = [element.get_element_by_id('mouseover-content', None),
               element.get_element_by_id('mouseover-custom', None)]
  for x in to_delete:
    if x is not None:
      x.drop_tree()

def mw_item_page_scrape(url):
  '''Given a URL of an item page on Mabinogi World Wiki, scrapes the following
  info into a dictionary:
    Description
    Description Bullets (as list; may be empty)
    Icon Link (link to the icon picture used on the website)
    Stats (and Limitations) (as dictionary)

  Finally, returns a dictionary of this data using the above as the keys. If an
  error indicating an improper parse is encountered, prints an error message
  and returns None.
  '''

  mw_base_url = 'http://wiki.mabinogiworld.com'
  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    print 'ERROR: Request error'
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  # CSS selectors for desired items
  table_css = 'div#mw-content-text > h2:contains("Base Stats and Information") + table.mabitable'
  # the CSS path to the Base Stats and Information table body; apparently, this thing
  # ignores the <tbody> tag, and considers the <td> as direct children of <table>
  description_css = 'div#mw-content-text > p:nth-of-type(1)'
  description_bullets_css = description_css + ' + ul > li'
  icon_css = table_css + ' > tr:nth-child(1) > td.image:nth-child(1) > a > img'
  all_th_css = table_css + ' > tr:not(tr:nth-child(1)) > th'
  all_td_css = all_th_css + ' + td'
  enchant_types_css = table_css + ' tr > th:contains("Enchant Types") + td'
  other_info_css = table_css + ' tr > th:contains("Other Information") + td'
  obtained_from_css = table_css + ' tr > td > table > tr:nth-child(2) > td:nth-child(1) > div > ul > li'
  sold_by_css = table_css + ' tr > td > table > tr:nth-child(2) > td:nth-child(2) > div > ul > li'

  translator = HTMLTranslator()
  try: # generate XPaths using CSS selector strings
    description_xpath = translator.css_to_xpath(description_css)
    description_bullets_xpath = translator.css_to_xpath(description_bullets_css)
    icon_link_xpath = translator.css_to_xpath(icon_css) + '/@src'
    all_th_xpath = translator.css_to_xpath(all_th_css)
    all_td_xpath = translator.css_to_xpath(all_td_css)
    enchant_types_xpath = translator.css_to_xpath(enchant_types_css)
    other_info_xpath = translator.css_to_xpath(other_info_css)
    obtained_from_xpath = translator.css_to_xpath(obtained_from_css)
    sold_by_xpath = translator.css_to_xpath(sold_by_css)
  
  except SelectorError:
    sys.exit('FATAL ERROR: Invalid selector')
  
  # find elements matching XPaths; all are lists
  description = tree.xpath(description_xpath)
  description_bullets = tree.xpath(description_bullets_xpath)
  icon_link = tree.xpath(icon_link_xpath)
  all_th = tree.xpath(all_th_xpath)
  all_td = tree.xpath(all_td_xpath)
  enchant_types = tree.xpath(enchant_types_xpath)
  other_info = tree.xpath(other_info_xpath)
  obtained_from = tree.xpath(obtained_from_xpath)
  sold_by = tree.xpath(sold_by_xpath)
  
  # some invariants to check to make sure we selected the right elements:

  # check that there is exactly one <th> "Enchant Types" and one <th>
  # "Other Information", and that these are also selected in all_th
  if len(enchant_types) != 1:
    print 'ERROR:', str(len(enchant_types)), '"Enchant Types" <td> selected'
    return None
  if len(other_info) != 1:
    print 'ERROR:', str(len(other_info)), '"Other Information" <td> selected'
    return None
  if not (enchant_types[0] in all_td and other_info[0] in all_td):
    print 'ERROR: "Enchant Types" or "Other Information" unaccounted for in all_td'
    return None
  # check that every <th> has a corresponding <td>
  if len(all_th) != len(all_td):
    print 'ERROR: all_th and all_td lengths unequal'
    return None
  
  # remove 'Enchant Types' and 'Other Information' from all_th and all_td
  remove = [enchant_types[0], other_info[0]]
  for x in remove:
    index = all_td.index(x)
    del all_th[index]
    del all_td[index]

  # set up dictionary of stats and values
  stats = {}
  for i in xrange(len(all_th)):
    # delete extraneous mouseover text
    delete_mouseover(all_th[i])
    delete_mouseover(all_td[i])
    # set dictionary entry
    stats[all_th[i].text_content().strip()] = all_td[i].text_content().strip()
  
  # process Enchant Types and Other Info into lists
  types = [t.strip() for t in
    string.split(enchant_types[0].text_content(), '/') if len(t.strip()) > 0]
  others = [o.text_content().strip() for o in other_info[0].cssselect('ul > li')]

  # Here's all the data, finally compiled in a dictionary
  data = {'Description': description[0].text_content().strip(),
          'Description Bullets': [db.text_content().strip()
                                  for db in description_bullets],
          'Stats': stats,
          'Enchant Types': types,
          'Other Information': others,
          'Obtained From': [of.text_content().strip() for of in obtained_from],
          'Sold By': [sb.text_content().strip() for sb in sold_by]}

  got_icon = len(icon_link)
  if not got_icon: # test if image link was found
    print 'WARNING: Has no icon image.'
    data['Icon Link'] = None
  else:
    if got_icon > 1: # warn if multiple images in box found, but use first one
      print 'WARNING: Multiple images in first table box. Using first one.'
    data['Icon Link'] = mw_base_url + icon_link[0]

  return data

def print_scrape(scrape_data):
  print 'Description:', scrape_data['Description']
  for db in scrape_data['Description Bullets']:
    print ' o', db
  print 'Icon link:', scrape_data['Icon Link']
  print 'Stats:'
  stats = scrape_data['Stats']
  for key in stats:
    print key + ':', stats[key]
  print 'Enchant Types:', scrape_data['Enchant Types']
  print 'Other Information:'
  for oi in scrape_data['Other Information']:
    print ' o', oi
  print 'Obtained From:', scrape_data['Obtained From']
  print 'Sold By:', scrape_data['Sold By']

print_scrape(mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Amulet'))
print_scrape(mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Knight_Lance'))
