import sys
import string
from lxml import html
import requests
from cssselect import HTMLTranslator, SelectorError


mw_base_url = 'http://wiki.mabinogiworld.com'

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
  info into a dictionary to return:
    Description
    Description Bullets (as list; may be empty)
    Icon Link (link to the icon picture used on the website)
    Stats (and Limitations) (as dictionary)
    Enchant Types
    Other Information
    Obtained From
    Sold By

  unless the item is a simple item that doesn't have the "Base Stats and
  Information" table, in which case only Description and Description Bullets
  are included.

  If an error indicating an improper parse is encountered, prints an error
  message and returns None.
  '''

  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    print 'ERROR: Request error'
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  #DEBUG: keep for now
  # CSS selectors for desired items; used with CSSSelect to produce the XPaths
  # below
#  table_css = 'div#mw-content-text > h2:contains("Base Stats and Information") + table.mabitable'
#  table_alt_css = 'div#mw-content-text > h2:contains("Base Stats and Information") + div.tabdiv > div#tab1 > table.mabitable'
#  # <tbody> element is invisible to this for some reason
#  description_css = 'div#mw-content-text > h2:contains("Description") ~ p > i'
#  description_bullets_css = description_css + ' + ul > li'
#  icon_link_css = 'tr:nth-child(1) > td.image:nth-child(1) > a > img'
#  all_th_css = 'tr:not(tr:nth-child(1)) > th'
#  all_td_css = all_th_css + ' + td'
#  enchant_types_css = 'tr > th:contains("Enchant Types") + td'
#  other_info_css = 'tr > th:contains("Other Information") + td'
#  obtained_from_css = 'tr > td > table > tr:nth-child(2) > td:nth-child(1) > div > ul > li'
#  sold_by_css = table_css + ' tr > td > table > tr:nth-child(2) > td:nth-child(2) > div > ul > li'
  #DEBUG: keep for now

  # do these first, 'cause it's the only thing needed for simple items

  # overly broad, but mostly safe because we only use the first one later
  description_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Description')]/following-sibling::p/i"
  # this is still a bit dangerous as it selects from all that match above
  description_bullets_xpath = description_xpath + "/following-sibling::*[name() = 'ul' and (position() = 1)]/li"
  # use this one for pages that don't have a "Description" header
  description_alt_xpath = "descendant-or-self::div[@id = 'mw-content-text']/p/i"

  description = tree.xpath(description_xpath)
  description_bullets = tree.xpath(description_bullets_xpath)
  if len(description) > 1:
    print 'WARNING: More than one description matched; extraneous bullets may be included.'
  elif len(description) == 0:
    description = tree.xpath(description_alt_xpath)
  if len(description) == 0: # if both original and alt are empty
    print 'ERROR: Unable to find a description.'
    return None

  table_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Base Stats and Information')]/following-sibling::*[@class and contains(concat(' ', normalize-space(@class), ' '), ' mabitable ') and (name() = 'table') and (position() = 1)]"
  table_alt_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Base Stats and Information')]/following-sibling::*[@class and contains(concat(' ', normalize-space(@class), ' '), ' tabdiv ') and (name() = 'div') and (position() = 1)]/div[@id = 'tab1']/table[@class and contains(concat(' ', normalize-space(@class), ' '), ' mabitable ')]"
  
  # see if the table exists (check two paths to cover Spirit Weapons)
  table = tree.xpath(table_xpath)
  if not table:
    table = tree.xpath(table_alt_xpath)
    table_xpath = table_alt_xpath
  if len(table) > 1:
    print 'ERROR:', str(len(table)), 'tables selected!'
    return None
  elif len(table) == 0: # simple item; table processing omitted
    print 'WARNING:', 'No table selected; treating as simple item.'
    return {'Description': description[0].text_content().strip(),
            'Description Bullets': [db.text_content().strip()
                                    for db in description_bullets]}

  # the rest of the stuff, in the table
  icon_link_xpath = "*[name() = 'tr' and (position() = 1)]/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' image ') and (name() = 'td') and (position() = 1)]/a/img/@src"
  all_th_xpath = "tr[not(name() = 'tr' and (position() = 1))]/th"
  all_td_xpath = "tr[not(name() = 'tr' and (position() = 1))]/th/following-sibling::*[name() = 'td' and (position() = 1)]"
  enchant_types_xpath = "tr/th[contains(., 'Enchant Types')]/following-sibling::*[name() = 'td' and (position() = 1)]"
  other_info_xpath = "tr/th[contains(., 'Other Information')]/following-sibling::*[name() = 'td' and (position() = 1)]"
  obtained_from_xpath = "tr/td/table/*[name() = 'tr' and (position() = 2)]/*[name() = 'td' and (position() = 1)]/div/ul/li"
  sold_by_xpath = "tr/td/table/*[name() = 'tr' and (position() = 2)]/*[name() = 'td' and (position() = 2)]/div/ul/li"

  icon_link = tree.xpath(table_xpath + '/' + icon_link_xpath)
  all_th = tree.xpath(table_xpath + '/' + all_th_xpath)
  all_td = tree.xpath(table_xpath + '/' + all_td_xpath)
  enchant_types = tree.xpath(table_xpath + '/' + enchant_types_xpath)
  other_info = tree.xpath(table_xpath + '/' + other_info_xpath)
  obtained_from = tree.xpath(table_xpath + '/' + obtained_from_xpath)
  sold_by = tree.xpath(table_xpath + '/' + sold_by_xpath)
  
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
  
  # process Icon Link
  got_icon = len(icon_link)
  if not got_icon: # test if image link was found
    print 'WARNING: Has no icon image.'
    icon = None
  else:
    if got_icon > 1: # warn if multiple images in box found, but use first one
      print 'WARNING: Multiple images in first table box. Using first one.'
    icon = mw_base_url + icon_link[0]

  # process Enchant Types
  types = [t.strip() for t in
    string.split(enchant_types[0].text_content(), '/') if len(t.strip()) > 0]

  # process Other Info
  others = [o.text_content().strip() for o in other_info[0].cssselect('ul > li')]

  # process Obtained From
  obtained = [of.text_content().strip() for of in obtained_from]
  if len(obtained) == 1 and obtained[0] == 'None':
    obtained = []

  # process Sold By data
  solds = []
  if sold_by[0].text_content().strip() != 'None':
    for price in sold_by:
      sellers = []
      for seller in price.cssselect('ul > li'):
        sellers.append(seller.text_content().strip())
        seller.drop_tree() # we have to drop all of these after getting the
                           # text so we can get the price text by itself
      solds.append((price.text_content().strip(), sellers)) # add as a pair

  # Here's all the data, finally compiled in a dictionary
  data = {'Description': description[0].text_content().strip(),
          'Description Bullets': [db.text_content().strip()
                                  for db in description_bullets],
          'Icon Link': icon,
          'Stats': stats,
          'Enchant Types': types,
          'Other Information': others,
          'Obtained From': obtained,
          'Sold By': solds}

  return data

def print_scrape(scrape_data):
  print 'Description:', scrape_data['Description']
  for db in scrape_data['Description Bullets']:
    print ' o', db
  if 'Stats' in scrape_data:
    print 'Icon Link:', scrape_data['Icon Link']
    print 'Stats:'
    stats = scrape_data['Stats']
    for key in stats:
      print key + ':', stats[key]
    print 'Enchant Types:', scrape_data['Enchant Types']
    print 'Other Information:'
    for oi in scrape_data['Other Information']:
      print ' o', oi
    print 'Obtained From:', scrape_data['Obtained From']
    print 'Sold By:'
    for (price, sellers) in scrape_data['Sold By']:
      print 'Price:', price
      for s in sellers:
        print ' o', s

def gather_item_links_to_scrape():
  '''Scrapes all the required links from the Weapons, Equipment, and Items
  category pages, and returns them in a list. The links are relative, and
  must be appended to mw_base_url.
  '''
  weapons_url = "http://wiki.mabinogiworld.com/view/Category:Weapons"
  equipment_url = "http://wiki.mabinogiworld.com/view/Category:Equipment"
  items_url = "http://wiki.mabinogiworld.com/view/Category:Items"
  urls = [weapons_url, equipment_url, items_url]

  links_xpath = "descendant-or-self::div[@id = 'mw-pages']/div[@class and contains(concat(' ', normalize-space(@class), ' '), ' mw-content-ltr ')]/table/tr/td/ul/li/a/@href"
  # On the first page of Weapons and Equipment, the first ul is extraneous
  extraneous_links_xpath = "descendant-or-self::div[@id = 'mw-pages']/div[@class and contains(concat(' ', normalize-space(@class), ' '), ' mw-content-ltr ')]/table/tr/*[name() = 'td' and (position() = 1)]/ul[position() = 1]/li"
  next_page_xpath = "descendant-or-self::div[@id = 'mw-pages']/a[position() = last() and (contains(., 'next 200'))]/@href"

  all_links = []

  for i in xrange(len(urls)): 
    links = []
    url = urls[i]
    page_number = 1

    # bit hacky, but it works nicely; we set page_number = 0 to end the loop
    while page_number:
      r = requests.get(url) # request desired webpage to scrape
      if r.status_code != requests.codes.ok: # confirm request successful
        print 'ERROR: Request error'
        return None
      tree = html.fromstring(r.text) # parse html into tree
      # add links on this page
      if i < 2 and page_number == 1: # if first page of Weapons or Equipment
        omit = len(tree.xpath(extraneous_links_xpath)) # mark for deletion
      links += tree.xpath(links_xpath) # add all links
      next_page = tree.xpath(next_page_xpath) # look for a 'next 200' link
      if not next_page:
        page_number = 0
      else:
        url = mw_base_url + next_page[0]
        page_number += 1

    for j in xrange(omit):
      del links[0]

    all_links += links

  return all_links

gather_item_links_to_scrape()
