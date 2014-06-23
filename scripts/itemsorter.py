#!/usr/bin/python
######
# Will sort all of the items into their respective categories based
# on a certain number of criteria. 
#
# To add more categories, just create a SELECT statement, then edit
# print the category. (The category has to exist in the table, it'll automatically pull the ID of the category.
#
# It is hard coded to use the homestead (development) DB. Don't you dare run it on the production server, even 
# if it weren't hard coded.
######
import MySQLdb
import getpass
import urllib

def getid(category, cnx):
	cnx.execute('SELECT id FROM categories WHERE urlname = \"' + category + '"')
	return str(cnx.fetchone()[0])

def printcategory(category, cnx):
	for row in cnx.fetchall():
		print """
		SortedItem::create(array(
			'sorteditem_id' => """ + str(row[0]) + """,
			'sorteditem_type' => "Item",
			'category_id' => """ + getid(category, cnx) + "));"

def printheader():
	print """
<?php

class SortedItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('sorteditems')->delete();
"""

hst = "localhost"
usr = "root"
passwrd = getpass.getpass()
database = "homestead"

db = MySQLdb.connect(host=hst, user=usr, passwd=passwrd,db=database)

cur = db.cursor()

printheader()

cur.execute("SELECT * FROM items WHERE (name not like \"%Staff%\" AND name not like \"%Wand%\") AND weaponmax is NOT NULL AND weaponmax > 0")

weapons = []

printcategory("weapons", cur)


cur.execute("SELECT * FROM items WHERE defense is NOT NULL AND defense >= 6 AND upgrades is NOT NULL and upgrades = 5")

printcategory("heavyarmors", cur)

cur.execute("SELECT * FROM items WHERE defense is NOT NULL AND defense >= 4 AND upgrades is NOT NULL and upgrades = 4 OR name like \"%Languhiris Chaser Armor%\"")

printcategory("lightarmors", cur)

cur.execute("SELECT * FROM items WHERE (name like \"%Staff%\" OR name like \"%Wand%\") AND weaponmax is NOT NULL")

printcategory("magicweapons", cur)

cur.execute("SELECT * FROM items WHERE wornon = 7") #name like \"%Shield%\" OR name like \"%Holy Eagle Mask%\"")

printcategory("shields", cur)

cur.execute("SELECT * FROM items WHERE defense is NOT NULL AND defense = 2 AND upgrades is not null and (upgrades = 3 OR upgrades = 0) and protection is not null and protection = 0")

printcategory("clothing", cur)

cur.execute("SELECT * FROM items WHERE wornon = 5")#defense is NOT NULL AND defense = 0 AND protection is NOT NULL AND protection = 0 AND reforgable = 0 AND enchantable = 0 AND (name like \"%Robe%\" OR name like \"%Wings%\" OR name like \"%Overcoat%\")")

printcategory("robes", cur)

cur.execute("SELECT * FROM items WHERE wornon = 4")#(name like \"%Shoes%\" OR name like \"%Boots%\" OR name like \"%Pumps%\" OR name like \"%Sandals%\" OR name like \"%Greaves%\" OR name like \"%Slippers%\")")

printcategory("shoes", cur)

cur.execute("SELECT * FROM items WHERE wornon = 3")#(name like \"%Glove%\" OR name like \"%Bracelet%\" OR name like \"%Wristband%\" OR name like \"%Gauntlet%\" OR name like \"%Bracer%\" OR name like \"%Paws%\" OR name like \"%Protector%\" OR name like \"%Vambrace%\" OR name like \"%Wrist Guard%\") AND (name NOT LIKE \"%Bracer Knuckle%\" AND name NOT LIKE \"%Matching Couples Bracelet%\")")

printcategory("gloves", cur)

cur.execute("SELECT * FROM items WHERE wornon = 2")#(name like \"%Glove%\" OR name like \"%Bracelet%\" OR name like \"%Wristband%\" OR name like \"%Gauntlet%\" OR name like \"%Bracer%\" OR name like \"%Paws%\" OR name like \"%Protector%\" OR name like \"%Vambrace%\" OR name like \"%Wrist Guard%\") AND (name NOT LIKE \"%Bracer Knuckle%\" AND name NOT LIKE \"%Matching Couples Bracelet%\")")

printcategory("hats", cur)

cur.execute("SELECT * FROM items WHERE wornon = 1")  #(name like \"%Flying Puppet%\" OR name like \"%Support Puppet%\" OR name like \"%Balloon%  \" OR (((defense = 2 AND protection = 0) OR (defense = 1 AND protection = 1) OR (defense = 0 AND protection = 2) OR (defense = 2 AND protection = 2)) AND maxdurability = 5 AND upgrades IS NULL AND name NOT LIKE \"%Helm%\" AND name NOT LIKE \"%Hat%\" AND name NOT LIKE \"%Glove%\")) ")

printcategory("accessories", cur)

print """
	}
}
"""


cur.close()

#TO RUN, JUST DO
#python itemsorter.py > ../app/database/seeds/SortedItemTableSeeder.php

