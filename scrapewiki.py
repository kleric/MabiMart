import sys
import string
from lxml import html
import requests
#from cssselect import HTMLTranslator, SelectorError


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

def remove_nondigits(num_string):
  return filter(lambda c: c.isdigit() or c == '.', num_string)

def process_number_datum(raw_num):
  '''Process the raw number data (in string form) from the Wiki's table cells,
  removing extraneous characters and converting to int or float.'''
  clean_num = remove_nondigits(raw_num)
  if '.' in clean_num:
    return float(clean_num)
  else:
    return int(clean_num)

def process_stats(stats):
  '''Process the "raw" data scraped from the Wiki's table. Mostly just changing
  the dictionary keys to the ones we'll use for the database, but also doing
  some extra processing of special characters into understandable forms, and
  changing some types.
  '''
  new_stats = {}
  for key in stats:
    try: # to catch all exceptions: just skip it and report a warning
      if key == 'Balance':
        new_stats['balance'] = process_number_datum(stats[key])
      elif key == 'Critical':
        new_stats['critical'] = process_number_datum(stats[key])
      elif key == 'Damage':
        tilde_index = string.find(stats[key], '~')
        if tilde_index == -1:
          print 'WARNING:', 'Unable to process Damage field correctly'
        else:
          new_stats['weaponmin'] = process_number_datum(stats[key][:tilde_index])
          new_stats['weaponmax'] = process_number_datum(stats[key][tilde_index+1:])
      elif key == 'Defense':
        new_stats['defense'] = process_number_datum(stats[key])
      elif key == 'Dual W.':
        if stats[key] == u'\u2714':
          new_stats['dualwieldable'] = True
        else:
          new_stats['dualwieldable'] = False
      elif key == 'Durability':
        new_stats['maxdurability'] = process_number_datum(stats[key])
      elif key == 'Elf':
        if stats[key] == u'\u2714':
          new_stats['elfm'] = True
          new_stats['elff'] = True
        elif stats[key] == u'\u2718':
          new_stats['elfm'] = False
          new_stats['elff'] = False
        else:
          if 'M' in stats[key]:
            new_stats['elfm'] = True
          else:
            new_stats['elfm'] = False
          if 'F' in stats[key]:
            new_stats['elff'] = True
          else:
            new_stats['elff'] = False
      elif key == 'Enchant':
        if stats[key] == u'\u2714':
          new_stats['enchantable'] = True
        else:
          new_stats['enchantable'] = False
      elif key == 'Giant':
        if stats[key] == u'\u2714':
          new_stats['giantm'] = True
          new_stats['giantf'] = True
        elif stats[key] == u'\u2718':
          new_stats['giantm'] = False
          new_stats['giantf'] = False
        else:
          if 'M' in stats[key]:
            new_stats['giantm'] = True
          else:
            new_stats['giantm'] = False
          if 'F' in stats[key]:
            new_stats['giantf'] = True
          else:
            new_stats['giantf'] = False
      elif key == 'Human':
        if stats[key] == u'\u2714':
          new_stats['humanm'] = True
          new_stats['humanf'] = True
        elif stats[key] == u'\u2718':
          new_stats['humanm'] = False
          new_stats['humanf'] = False
        else:
          if 'M' in stats[key]:
            new_stats['humanm'] = True
          else:
            new_stats['humanm'] = False
          if 'F' in stats[key]:
            new_stats['humanf'] = True
          else:
            new_stats['humanf'] = False
      elif key == 'Injury':
        tilde_index = string.find(stats[key], '~')
        if tilde_index == -1:
          print 'WARNING:', 'Unable to process Injury field correctly'
        else:
          new_stats['weaponinjurymin'] = process_number_datum(stats[key][:tilde_index])
          new_stats['weaponinjurymax'] = process_number_datum(stats[key][tilde_index+1:])
      elif key == 'NPC Value':
        new_stats['npcvalue'] = process_number_datum(stats[key])
      elif key == 'Protection':
        new_stats['protection'] = process_number_datum(stats[key])
      elif key == 'Reforge':
        if stats[key] == u'\u2714':
          new_stats['reforgable'] = True
        else:
          new_stats['reforgable'] = False
      elif key == 'S. Angle':
        new_stats['sangle'] = process_number_datum(stats[key])
      elif key == 'S. Damage':
        new_stats['sdamage'] = process_number_datum(stats[key])
      elif key == 'S. Radius':
        new_stats['sradius'] = process_number_datum(stats[key])
      elif key == 'SP/Swing':
        new_stats['stamswing'] = process_number_datum(stats[key])
      elif key == 'Sp. Up.':
        if stats[key] == u'\u2714':
          new_stats['specialupgradable'] = True
        else:
          new_stats['specialupgradable'] = False
      elif key == 'Stun':
        new_stats['stuntime'] = process_number_datum(stats[key])
      elif key == 'Upgrade':
        slash_index = string.find(stats[key], '/')
        if slash_index != -1: # if no slash, leave null
          new_stats['upgrades'] = process_number_datum(stats[key][:slash_index])
          new_stats['gemupgrades'] = process_number_datum(stats[key][slash_index+1:])
    except:
      print 'WARNING: some exception thrown in data processing'

  return new_stats

def mw_item_page_scrape(url):
  '''Given a URL of an item page on Mabinogi World Wiki, scrapes the following
  info into a dictionary to return:
    Description
    Icon Link (link to the icon picture used on the website)
    Attack Speed (weapons only)
    Attack Hits (weapons only)
    Stats (and Limitations) (as dictionary)
    Other Information

  unless the item is a simple item that doesn't have the "Base Stats and
  Information" table, in which case only Description is included.

  If an error indicating an improper parse is encountered, prints an error
  message and returns None.
  '''

  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    print 'ERROR: Request error'
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  # do these first, 'cause it's the only thing needed for simple items
  # overly broad, but mostly safe because we only use the first one later
  description_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Description')]/following-sibling::p/i"
  # use this one for pages that don't have a "Description" header
  description_alt_xpath = "descendant-or-self::div[@id = 'mw-content-text']/p/i"

  description = tree.xpath(description_xpath)
  if len(description) == 0:
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
    return {'description': description[0].text_content().strip()}

  # the rest of the stuff, in the table
  icon_link_xpath = "*[name() = 'tr' and (position() = 1)]/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' image ') and (name() = 'td') and (position() = 1)]/a/img/@src"
  attack_type_xpath = "*[name() = 'tr' and (position() = 1)]/*[@class and contains(concat(' ', normalize-space(@class), ' '), ' image ') and (name() = 'td') and (position() = 1)]/text()[contains(., 'Hit Weapon')]" 
  all_th_xpath = "tr[not(name() = 'tr' and (position() = 1))]/th"
  all_td_xpath = "tr[not(name() = 'tr' and (position() = 1))]/th/following-sibling::*[name() = 'td' and (position() = 1)]"
  enchant_types_xpath = "tr/th[contains(., 'Enchant Types')]/following-sibling::*[name() = 'td' and (position() = 1)]"
  other_info_xpath = "tr/th[contains(., 'Other Information')]/following-sibling::*[name() = 'td' and (position() = 1)]"

  icon_link = tree.xpath(table_xpath + '/' + icon_link_xpath)
  attack_type = tree.xpath(table_xpath + '/' + attack_type_xpath)
  all_th = tree.xpath(table_xpath + '/' + all_th_xpath)
  all_td = tree.xpath(table_xpath + '/' + all_td_xpath)
  enchant_types = tree.xpath(table_xpath + '/' + enchant_types_xpath)
  other_info = tree.xpath(table_xpath + '/' + other_info_xpath)
  
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
  # check that only one attack type is selected (should be rarely violated)
  if len(attack_type) > 1:
    print 'ERROR:', str(len(attack_type)), 'attack types selected'
  
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
    key = all_th[i].text_content().strip()
    value = all_td[i].text_content().strip()
    if key in stats: # should only happen for Human: M and Human: F, etc.
      stats[key] += value # append and cross fingers
    else:
      stats[key] = value
  
  # process Icon Link
  got_icon = len(icon_link)
  if not got_icon: # test if image link was found
    print 'WARNING: Has no icon image.'
    icon = None
  else:
    if got_icon > 1: # warn if multiple images in box found, but use first one
      print 'WARNING: Multiple images in first table box. Using first one.'
    icon = mw_base_url + icon_link[0]

  # process Other Info (get raw HTML of ul)
  others = other_info[0].cssselect('ul')
  if others:
    notes = html.tostring(others[0])
  else:
    notes = None

  # set up initial dictionary with the data from the table
  data = process_stats(stats)
  # add other data
  data['description'] = description[0].text_content().strip()
  data['imgurl'] = icon
  if notes is not None:
    data['notes'] = notes

  # process and add attack_type for weapons
  if attack_type:
    attack_type = attack_type[0].split()
    attack_speed = ' '.join(attack_type[:-3])
    if attack_speed == 'Very Slow':
      data['attackrate'] = 1
    elif attack_speed == 'Slow':
      data['attackrate'] = 2
    elif attack_speed == 'Normal':
      data['attackrate'] = 3
    elif attack_speed == 'Fast':
      data['attackrate'] = 4
    else: # attack_speed == 'Very Fast'
      data['attackrate'] = 5
    data['numattacks'] = int(attack_type[-3])

  return data

def gather_item_links_to_scrape():
  '''Scrapes all the required links from the Equipment and Items
  category pages, and returns them in a list. The links are relative, and
  must be appended to mw_base_url.
  '''
  equipment_url = "http://wiki.mabinogiworld.com/view/Category:Equipment"
  items_url = "http://wiki.mabinogiworld.com/view/Category:Items"
  urls = [equipment_url, items_url]

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
      if i < 1 and page_number == 1: # if first page of Weapons or Equipment
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

    all_links += [l for l in links if l not in all_links]

  return all_links

def print_scrape_datatable_form(scrape):
  '''Requires: scrape is not None'''
  print 'Item::create(array('
  for key in scrape:
    if key == 'notes' or key == 'imgurl': 
      print "'" + key + "'", '=>', "'" + scrape[key] + "',"
    elif key == 'description':
      # a hack to make sure we don't have an extra comma on the last data line
      pass
    else:
      print "'" + key + "'", '=>', str(scrape[key]).lower()
  print "'description' => '" + scrape['description'] + "')"
  print ');'

def print_equipment_items_data():
  total_count = 0
  err_count = 0
  critical_count = 0
  for link in gather_item_links_to_scrape():
    try:
      scrape = mw_item_page_scrape(mw_base_url + link)
    except:
      print 'ERROR: some error occurred in scraping'
      scrape = None
    if scrape is None:
      err_count += 1
    else:
      try:
        print_scrape_datatable_form(scrape)
      except:
        print "CRITICAL: an error occured in printing this item's data; file may be corrupted at this point. Inspection and correction by hand necessary."
        critical_count += 1
    if total_count % 100 == 0:
      sys.stdout.flush()
    total_count += 1
  print 'Total ERRORs:', str(err_count)
  print 'CRITICAL errors:', str(critical_count)
  print 'These MUST be corrected by hand to restore file validity. Also be sure to remove ERROR and WARNING lines.'

print_equipment_items_data()
