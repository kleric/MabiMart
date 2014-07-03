import sys
import string
from lxml import html
import requests
from cssselect import HTMLTranslator, SelectorError

#START COMMON CODE

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

#END COMMON CODE

#START EQUIPMENT/ITEMS SCRAPE CODE

def convert_worn_on(worn_string):
  '''Converts a string describing the Worn On table entry to a number
  representing the same, for consistency and easier processing.'''
  if worn_string == 'Accessory':
    return 1
  elif worn_string == 'Head':
    return 2
  elif worn_string == 'Hand':
    return 3
  elif worn_string == 'Foot':
    return 4
  elif worn_string == 'Robe':
    return 5
  elif worn_string == 'Body':
    return 6
  elif worn_string == 'Left Hand':
    return 7
  else:
    return 0

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
          sys.stderr.write('WARNING: Unable to process Damage field correctly\n') 
        else:
          new_stats['weaponmin'] = process_number_datum(stats[key][:tilde_index])
          new_stats['weaponmax'] = process_number_datum(stats[key][tilde_index+1:])
      elif key == 'Defense':
        new_stats['defense'] = process_number_datum(stats[key])
      elif key == 'Dual W.':
        new_stats['dualwieldable'] = (stats[key] == u'\u2714')
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
        new_stats['enchantable'] = (stats[key] == u'\u2714')
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
          sys.stderr.write('WARNING: Unable to process Injury field correctly\n')
        else:
          new_stats['weaponinjurymin'] = process_number_datum(stats[key][:tilde_index])
          new_stats['weaponinjurymax'] = process_number_datum(stats[key][tilde_index+1:])
      elif key == 'NPC Value':
        new_stats['npcvalue'] = process_number_datum(stats[key])
      elif key == 'Protection':
        new_stats['protection'] = process_number_datum(stats[key])
      elif key == 'Reforge':
        new_stats['reforgable'] = (stats[key] == u'\u2714')
      elif key == 'S. Angle':
        new_stats['sangle'] = process_number_datum(stats[key])
      elif key == 'S. Damage':
        new_stats['sdamage'] = process_number_datum(stats[key])
      elif key == 'S. Radius':
        new_stats['sradius'] = process_number_datum(stats[key])
      elif key == 'SP/Swing':
        new_stats['stamswing'] = process_number_datum(stats[key])
      elif key == 'Sp. Up.':
        new_stats['specialupgradable'] = (stats[key] == u'\u2714')
      elif key == 'Stun':
        new_stats['stuntime'] = process_number_datum(stats[key])
      elif key == 'Upgrade':
        slash_index = string.find(stats[key], '/')
        if slash_index != -1: # if no slash, leave null
          new_stats['upgrades'] = process_number_datum(stats[key][:slash_index])
          new_stats['gemupgrades'] = process_number_datum(stats[key][slash_index+1:])
      elif key == 'Worn On':
        worn_num = convert_worn_on(stats[key])
        if worn_num > 0:
          new_stats['wornon'] = worn_num
        else:
          sys.stderr.write('WARNING: Unable to convert "Worn On" value to a number; omitting field')
    except:
      sys.stderr.write('WARNING: some exception thrown in stats processing\n')

  return new_stats

def mw_item_page_scrape(url):
  '''Given a URL of an item page on Mabinogi World Wiki, scrapes the following
  info into a dictionary to return:
    Name
    URL on Wiki
    Description
    Icon Link (link to the icon picture used on the website)
    Attack Speed (weapons only)
    Attack Hits (weapons only)
    Stats (and Limitations) (as dictionary)
    Other Information

  unless the item is a simple item that doesn't have the "Base Stats and
  Information" table, in which case only Name, URL, Description, and Icon Link
  are included.

  If an error indicating an improper parse is encountered, logs an error
  message and returns None.
  '''

  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    sys.stderr.write('ERROR: Request error\n')
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  # do these first, 'cause it's the only thing needed for simple items
  name_xpath = "descendant-or-self::h1[@id = 'firstHeading']"
  # overly broad, but mostly safe because we only use the first one later
  description_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Description')]/following-sibling::p/i"
  # use this one for pages that don't have a "Description" header
  description_alt_xpath = "descendant-or-self::div[@id = 'mw-content-text']/p/i"

  name = tree.xpath(name_xpath)
  if len(name) == 0:
    sys.stderr.write('ERROR: Unable to find a name\n')
    return None
  description = tree.xpath(description_xpath)
  if len(description) == 0:
    description = tree.xpath(description_alt_xpath)
    if len(description) == 0: # if both original and alt are empty
      sys.stderr.write('ERROR: Unable to find a description\n')
      return None

  table_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Base Stats and Information')]/following-sibling::*[@class and contains(concat(' ', normalize-space(@class), ' '), ' mabitable ') and (name() = 'table') and (position() < 3)]"
  table_alt_xpath = "descendant-or-self::div[@id = 'mw-content-text']/h2[contains(., 'Base Stats and Information')]/following-sibling::*[@class and contains(concat(' ', normalize-space(@class), ' '), ' tabdiv ') and (name() = 'div') and (position() < 3)]/div[@id = 'tab1']/table[@class and contains(concat(' ', normalize-space(@class), ' '), ' mabitable ')]"
  
  # see if the table exists (check two paths to cover Spirit Weapons)
  table = tree.xpath(table_xpath)
  if not table:
    table = tree.xpath(table_alt_xpath)
    table_xpath = table_alt_xpath
  if len(table) > 1:
    sys.stderr.write('ERROR: ' + str(len(table)) + ' tables selected\n')
    return None
  elif len(table) == 0: # simple item; table processing omitted
    sys.stderr.write('No table selected; treating as simple item...\n')
    icon_link_xpath = "descendant-or-self::div[@id = 'mw-content-text']/table[@class and contains(concat(' ', normalize-space(@class), ' '), ' imagetable ')]/tr/td/a/img/@src"
    icon_link = tree.xpath(icon_link_xpath)
    if not icon_link:
      sys.stderr.write('WARNING: Unable to find an icon link\n')
      return {'name': name[0].text_content().strip(), 'wikilink': url, 'description': description[0].text_content().strip()}
    else:
      return {'name': sanitize_text(name[0].text_content()), 'wikilink': url, 'description': sanitize_text(description[0].text_content()), 'imgurl': mw_base_url + icon_link[0]}

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
    sys.stderr.write('ERROR: ' + str(len(enchant_types)) + ' "Enchant Types" <td> selected\n')
    return None
  if len(other_info) != 1:
    sys.stderr.write('ERROR: ' + str(len(other_info)) + ' "Other Info" <td> selected\n')
    return None
  if not (enchant_types[0] in all_td and other_info[0] in all_td):
    sys.stderr.write('ERROR: "Enchant Types" or "Other Information" unaccounted for in all_td\n')
    return None
  # check that every <th> has a corresponding <td>
  if len(all_th) != len(all_td):
    sys.stderr.write('ERROR: all_th and all_td lengths unequal\n')
    return None
  # check that only one attack type is selected (should be rarely violated)
  if len(attack_type) > 1:
    sys.stderr.write('ERROR: ' + str(len(attack_type)) + ' attack types selected\n')
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
    key = all_th[i].text_content().strip()
    value = all_td[i].text_content().strip()
    if key in stats: # should only happen for Human: M and Human: F, etc.
      stats[key] += value # append and cross fingers
    else:
      stats[key] = value
  
  # process Icon Link
  got_icon = len(icon_link)
  if not got_icon: # test if image link was found
    sys.stderr.write('WARNING: Unable to find an icon link\n')
    icon = None
  else:
    if got_icon > 1: # warn if multiple images in box found, but use first one
      sys.stderr.write('WARNING: Multiple images in first table box. Using first one.\n')
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
  data['name'] = name[0].text_content()
  data['description'] = description[0].text_content()
  data['wikilink'] = url
  if icon is not None:
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
    elif attack_speed == 'Very Fast':
      data['attackrate'] = 5
    try:
      data['numattacks'] = int(attack_type[-3])
    except ValueError: # skip this field if not an int
      pass

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
        sys.stderr.write('FATAL_ERROR: Link gathering request error')
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

#END EQUIPMENT/ITEMS SCRAPE CODE

#START ENCHANTS SCRAPE CODE

def process_effects(effects):
  '''Processes the raw text from the Effects cell, figuring out where to
  separate the items and adding HTML tags to turn it into a <ul> containing
  several <li>s. Be warned: this requires some mad hax.
  '''
  effects = effects.replace(u'\xa0', ' ').strip()
  lis = ''

  plus = string.rfind(effects, '+')
  minus = string.rfind(effects, '-')
  while plus > -1 or minus > -1:
    # loop invariant: effects has zero whitespace at the front and back
    # if + is at end of string or has extra text after it (Rank 7: Refined)
    while plus == len(effects)-1 or (plus > -1 and not effects[plus+1].isdigit()):
      plus = string.rfind(effects, '+', 0, plus) # ignore this +
    # if - is at end of string... or is actually a sneaky HYPHEN!
    while minus == len(effects)-1 or (minus > -1 and not effects[minus+1].isdigit()):
      minus = string.rfind(effects, '-', 0, minus) # ignore this -
    closest_sign = plus if plus > minus else minus
    if not effects[closest_sign+1].isdigit():
      sys.stderr.write('ERROR: Something\'s mad screwed up, yo.\n')
      sys.stderr.write('Here\'s where: ' + effects)
    lis = '\n<li>' + effects[closest_sign:] + '</li>' + lis
    # remove last item and strip whitespace
    effects = effects[:closest_sign].strip()
    plus = string.rfind(effects, '+')
    minus = string.rfind(effects, '-')

  return '<ul>' + lis + '\n</ul>'

def mw_enchant_page_scrape(url):
  '''Scrapes a rank page of Enchants, returning a list of dictionaries
  containing the following data under these keys:
  name [string]
  effects [string (raw HTML)]
  enchantsonto [string]
  personalized [boolean]
  rank [int]
  type [int]
  '''

  r = requests.get(url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    sys.stderr.write('ERROR: Request error\n')
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  rows_xpath = "descendant-or-self::div[@id = 'mw-content-text']/table[@class and contains(concat(' ', normalize-space(@class), ' '), ' mabitable ') and (@class and contains(concat(' ', normalize-space(@class), ' '), ' sortable ')) and (@class and contains(concat(' ', normalize-space(@class), ' '), ' center '))]/tr[not(name() = 'tr' and (position() = 1))]"

  enchants_data = []
  rows = tree.xpath(rows_xpath)
  for row in rows:
    enchant = {}
    table_cells = row.cssselect('td')
    if len(table_cells) < 5:
      sys.stderr.write('ERROR: Table row has incorrect number of cells\n')
      return None
    name = table_cells[0].cssselect('b')
    if len(name) > 1:
      sys.stderr.write('WARNING: Multiple names selected. Using first.\n')
    elif len(name) == 0:
      sys.stderr.write('ERROR: Unable to find a name\n')
      return None
    enchant['name'] = name[0].text_content()
    enchant['personalized'] = ('Personalize' in table_cells[0].text_content())
    if 'Prefix' in table_cells[1].text_content().strip():
      enchant['type'] = 1
    else:
      enchant['type'] = 2 # represents Suffix
    enchant['rank'] = int(url[-10], 16)
    enchant['enchantsonto'] = table_cells[2].text_content()
    enchant['effects'] = process_effects(table_cells[3].text_content())
    enchants_data.append(enchant)

  return enchants_data

#END ENCHANTS SCRAPE CODE

#START REFORGES SCRAPE CODE

def reforges_scrape():
  '''Scrapes the reforges into a list of dictionaries, with the following data
  under these keys:

  name [Attribute]
  description [Effect Limitation]'''

  reforges_url = 'http://wiki.mabinogiworld.com/view/Reforges'

  r = requests.get(reforges_url) # request desired webpage to scrape
  if r.status_code != requests.codes.ok: # confirm that request was successful
    sys.stderr.write('ERROR: Request error\n')
    return None
  
  tree = html.fromstring(r.text) # parse html into tree

  table_row_xpath = "descendant-or-self::div[@id = 'mw-content-text']/table/tr"
  rows = tree.xpath(table_row_xpath)

  row_datas = []

  for row in rows:
    row_data = {}
    name_cell = row.cssselect('td:first-child')
    if len(name_cell) > 1:
      sys.stderr.write('WARNING: more than one first td selected (how is that even possible?)\n')
    elif len(name_cell) < 1:
      pass # these are the th rows; skip them
    else:
      row_data['name'] = name_cell[0].text_content()

      description_cell = row.cssselect('td:nth-child(3)')
      if len(description_cell) > 1:
        sys.stderr.write('WARNING: more than one third td selected (how is that even possible?)\n')
      elif len(description_cell) < 1:
        sys.stderr.write('ERROR: unable to find a third td\n')
        sys.stderr.write('in ' + row.text_content())
      else:
        row_data['description'] = description_cell[0].text_content()
      row_datas.append(row_data)

  return row_datas

#END REFORGES SCRAPE CODE

#START COMMON CODE

def sanitize_text(raw_text):
  '''Slash-escapes double quotes to prepare this string for database seeding'''
  return raw_text.strip().replace('"', r'\"')

def scrape_datatable_format(scrape, thing_type):
  '''Requires: scrape is not None, thing_type is a string that will be used to
  begin each line'''
  thing_line = thing_type + '::create(array('
  for key in scrape:
    if key in ['description', 'wikilink', 'imgurl', 'notes', #rest for Enchants
               'enchantsonto', 'effects']:
      thing_line += "'" + key + "' => \"" + sanitize_text(scrape[key]) + "\","
    elif key == 'name':
      # a hack to make sure we don't have an extra comma on the last data line
      pass
    else:
      thing_line +=  "'" + key + "' => " + str(scrape[key]).lower() + ","
  thing_line += "'name' => \"" + sanitize_text(scrape['name']) + "\"));"
  return thing_line

#END COMMON CODE

#START PRINTING CODE

def print_equipment_items_data():
  total_count = 0
  err_count = 0
  sys.stderr.write('Gathering links...\n')
  links = gather_item_links_to_scrape()
  if not links:
    # gather_item_links_to_scrape will print 'FATAL_ERROR'
    return
  sys.stderr.write('Links gathered. Scraping data...\n')
  for link in links: 
    sys.stderr.write('Processing link ' + mw_base_url + link + '...\n')
    try:
      scrape = mw_item_page_scrape(mw_base_url + link)
    except:
      sys.stderr.write('ERROR: some exception thrown in scraping\n')
      scrape = None
      sys.stderr.write('Scrape FAILED.\n')
    if scrape is None:
      err_count += 1
    else:
      try:
        line = scrape_datatable_format(scrape, 'Item')
        print line
        sys.stderr.write('Scrape successful.\n')
      except:
        sys.stderr.write('ERROR: some exception thrown in formatting scrape data\n')
        sys.stderr.write('Scrape FAILED.\n')
        err_count += 1
    if total_count % 100 == 0:
      sys.stdout.flush()
    total_count += 1
  sys.stderr.write('Data scrape complete.\n')
  sys.stderr.write('Total links processed: ' + str(total_count) + '\n')
  sys.stderr.write('Total ERRORs: ' + str(err_count))

def print_enchant_data():
  total_count = 0
  err_count = 0
  sys.stderr.write('Gathering links...\n')
  links = []
  for n in (range(2,10) + ['A','B','C','D','E','F']):
    links.append('http://wiki.mabinogiworld.com/view/Rank_' + str(n) + '_Enchants')
  sys.stderr.write('Links gathered. Scraping data...\n')
  for link in links: 
    sys.stderr.write('Processing link ' + link + '...\n')
    try:
      enchants = mw_enchant_page_scrape(link)
      if enchants is None:
        raise Exception('Scrape failed')
    except Exception as e:
      sys.stderr.write('FATAL_ERROR: page scrape FAILED\n')
      sys.stderr.write('Exception message: ' + str(e.args) + '\n')
      return
    sys.stderr.write('Page scrape successful.\n')
    for enchant in enchants:
      try:
        line = scrape_datatable_format(enchant, 'Enchant')
        print line
      except:
        sys.stderr.write('ERROR: some exception thrown in formatting enchant data\n')
        err_count += 1
      total_count += 1
  sys.stderr.write('Data scrape complete.\n')
  sys.stderr.write('Total enchants processed: ' + str(total_count) + '\n')
  sys.stderr.write('Total ERRORs: ' + str(err_count) + '\n')
  sys.stderr.write('Wait! ERROR count is probably innacurate, since enchants are processed by page. Use grep -c ERROR enchants.log to see the real number of errors.')

def print_reforges_data():
  sys.stderr.write('Scraping data...\n')
  reforges = reforges_scrape()
  if reforges is None:
    return
  else:
    for reforge in reforges:
      try:
        line = scrape_datatable_format(reforge, 'Reforge')
        print line
      except:
        sys.stderr.write('ERROR: some exception thrown in formatting reforge data\n')
  sys.stderr.write('Data scrape complete.')

#END PRINTING CODE

# MAIN CODE

# TO SCRAPE EQUIPMENT AND ITEMS DATA:
# print_equipment_items_data()
# run this command to write output to a file called scrape.data and {progress,
# WARNINGs, and ERRORs} to scrape.log, while also printing the latter to the
# terminal so you can watch its progress:
# python scrapewiki.py 2>&1 >equipitems.data | tee equipitems.log

# TO SCRAPE ENCHANTS DATA:
# print_enchant_data()
# make sure above statement is commented, then
# run python scrapewiki.py 2>&1 >enchants.data | tee enchants.log

# TO SCRAPE REFORGES:
print_reforges_data()
# make sure everything else is commented, then
# run python scrapewiki.py 2>&1 >reforges.data | tee reforges.log
