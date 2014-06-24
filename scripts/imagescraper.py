#!/usr/bin/python
#########################
#
# Will pull all images of the items and save them in /images/items/{id}.png
# Pulls the items from the database, so we don't have to do any work.
#
#

import MySQLdb
import getpass
import urllib

hst = "localhost"
usr = "root"
passwrd = getpass.getpass()
database = raw_input("Database:")

db = MySQLdb.connect(host=hst, user=usr, passwd=passwrd,db=database)

cur = db.cursor()

cur.execute("SELECT id,imgurl FROM items")

numimages = 0

for row in cur.fetchall():
  try:
    localpath = "../public/images/items/" + str(row[0]) + ".png"
    urllib.urlretrieve(row[1], localpath)
    print "Downloaded " + row[1] + " successfully!"
    numimages = numimages + 1
  except IOError, e:
    print str(row[1])

cur.close()

print "Downloaded " + numimages + " images successfully"
