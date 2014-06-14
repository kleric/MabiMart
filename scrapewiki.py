import sys
from lxml import html
import requests
from cssselect import HTMLTranslator, SelectorError

def mw_item_page_scrape(url):
  mw_base_url = 'http://wiki.mabinogiworld.com'
  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    sys.exit('Request error')
  
  tree = html.fromstring(r.text) # parse html into tree

  # CSS selectors for desired items
  table_css = 'div#mw-content-text > h2:contains("Base Stats and Information") + table.mabitable'
  # the CSS path to the Base Stats and Information table body; apparently, this thing
  # ignores the <tbody> tag, and considers the <td> as direct children of <table>
  description_css = '#mw-content-text > p:nth-of-type(1)'
  description_bullets_css = description_css + ' + ul > li'
  icon_css = table_css + ' > tr:nth-child(1) > td.image > a > img'
  all_th_css = table_css + ' > tr:not(tr:nth-child(1)) > th'
  all_td_css = all_th_css + ' + td'
  enchant_types_css = table_css + ' tr > th:contains("Enchant Types")'
  other_info_css = table_css + ' tr > th:contains("Other Information")'

  translator = HTMLTranslator()
  try: # generate XPaths using CSS selector strings
    description_xpath = translator.css_to_xpath(description_css)
    description_bullets_xpath = translator.css_to_xpath(description_bullets_css)
    icon_link_xpath = translator.css_to_xpath(icon_css) + '/@src'
    all_th_xpath = translator.css_to_xpath(all_th_css)
    all_td_xpath = translator.css_to_xpath(all_td_css)
    enchant_types_xpath = translator.css_to_xpath(enchant_types_css)
    other_info_xpath = translator.css_to_xpath(other_info_css)
  
  except SelectorError:
    print('Invalid selector.')
  
  # find elements matching XPaths; all are lists
  description = tree.xpath(description_xpath)
  description_bullets = tree.xpath(description_bullets_xpath)
  icon_link = tree.xpath(icon_link_xpath)
  all_th = tree.xpath(all_th_xpath)
  all_td = tree.xpath(all_td_xpath)
  enchant_types = tree.xpath(enchant_types_xpath)
  other_info = tree.xpath(other_info_xpath)
  
  # check that there is only one th "Enchant Types" and one th "Other Information",
  # and that these are also selected in all_th
  if len(enchant_types) != 1:
    sys.exit(str(len(enchant_types)) + ' "Enchant Types" <th> selected!')
  if len(other_info) != 1:
    sys.exit(str(len(other_info)) + ' "Other Information" <th> selected!')
  if not (enchant_types[0] in all_th and other_info[0] in all_th):
    sys.exit('"Enchant Types" or "Other Information" unaccounted for in all_th!')
  if len(all_th) != len(all_td):
    sys.exit('all_th and all_td lengths unequal!')
  
  # remove 'Enchant Types' and 'Other Information' from all_th and all_td
  
  remove = all_th.index(enchant_types[0])
  del all_th[remove]
  del all_td[remove]
  remove = all_th.index(other_info[0])
  del all_th[remove]
  del all_td[remove]
  
  # set up dictionary of stats and values
  stats = {}
  for i in xrange(len(all_th)): # put in each stat, value pair
    to_kill = [all_th[i].get_element_by_id('mouseover-content', None), all_th[i].get_element_by_id('mouseover-custom', None), all_td[i].get_element_by_id('mouseover-content', None), all_td[i].get_element_by_id('mouseover-custom', None)]
    # extraneous mouseover text to kill in some <th>s and <td>s
    for x in to_kill:
      if x is not None:
        x.drop_tree()
    # set dictionary entry
    stats[all_th[i].text_content().strip()] = all_td[i].text_content().strip()
  
  # Here's all the data, finally compiled in a dictionary
  data = {'Description': description[0].text_content().strip(), 'Description Bullets': [b.text_content().strip() for b in description_bullets], 'Icon Link': mw_base_url + icon_link[0], 'Stats': stats}

  return data

def print_scrape(scrape_data):
  print 'Description:', scrape_data['Description']
  for db in scrape_data['Description Bullets']:
    print ' o ' + db
  print 'Icon link:', scrape_data['Icon Link']
  print 'Stats:'
  stats = scrape_data['Stats']
  for key in stats:
    print key + ':', stats[key]

print_scrape(mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Amulet'))
print_scrape(mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Knight_Lance'))
