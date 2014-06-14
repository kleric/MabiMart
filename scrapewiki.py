import sys
from lxml import html
import requests
from cssselect import HTMLTranslator, SelectorError

def mw_item_page_scrape(url):
  mw_base_url = 'http://wiki.mabinogiworld.com'
  r = requests.get(url) # fetch desired webpage to scrape
  css_path_to_table = 'div#mw-content-text > table.mabitable:nth-of-type(1)'
  # the CSS path to the Base Stats and Information table body; apparently, this thing
  # ignores the <tbody> tag, and considers the <td> as direct children of <table>
  if r.status_code != requests.codes.ok: # confirm that request was successful
    sys.exit('Request error')
  
  tree = html.fromstring(r.text) # parse html into tree
  
  try: # generate XPaths using CSS selector strings
    description_path = HTMLTranslator().css_to_xpath('#mw-content-text > p')
    description_bullets_path = HTMLTranslator().css_to_xpath('#mw-content-text > p + ul > li')
    icon_image_path = HTMLTranslator().css_to_xpath(css_path_to_table + ' > tr:nth-child(1) > td.image > a > img') + '/@src'
    all_th_path = HTMLTranslator().css_to_xpath(css_path_to_table + ' > tr:not(tr:nth-child(1)) > th')
    all_td_path = HTMLTranslator().css_to_xpath(css_path_to_table + ' > tr:not(tr:nth-child(1)) > th + td')
    enchant_types_path = HTMLTranslator().css_to_xpath(css_path_to_table + ' tr > th:contains("Enchant Types")')
    other_info_path = HTMLTranslator().css_to_xpath(css_path_to_table + ' tr > th:contains("Other Information")')
  
  except SelectorError:
    print('Invalid selector.')
  
  # find elements matching XPaths; all are lists
  description = tree.xpath(description_path)
  description_bullets = tree.xpath(description_bullets_path)
  icon_image = tree.xpath(icon_image_path)
  all_th = tree.xpath(all_th_path)
  all_td = tree.xpath(all_td_path)
  enchant_types = tree.xpath(enchant_types_path)
  other_info = tree.xpath(other_info_path)
  
  for d in description:
    print 'Description:', d.text_content()
  
  for db in description_bullets:
    print ' *', db.text_content()
  
  for ii in icon_image:
    print 'Icon link:', mw_base_url + ii
  
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
  
  for key in stats:
    print key + ':', stats[key]
  
  print "All Done"

mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Amulet')
mw_item_page_scrape('http://wiki.mabinogiworld.com/view/Knight_Lance')
