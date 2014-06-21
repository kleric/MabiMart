#!/usr/bin/python
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

for row in cur.fetchall():
  try:
    localpath = "public/images/items/" + str(row[0]) + ".png"
    urllib.urlretrieve(row[1], localpath)
    print "Downloaded " + row[1] + " successfully!"
  except IOError, e:
    print str(row[1])

cur.close()
