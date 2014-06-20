#!/usr/bin/python
import MySQLdb
import getpass

hst = raw_input("Host:")
usr = raw_input("User:")
passwrd = getpass.getpass()
database = raw_input("Database:")

db = MySQLdb.connect(host=hst, user=usr, passwd=passwrd,db=database)

cur = db.cursor()

cur.execute("SELECT id,imgurl FROM items")

for row in cur.fetchall():
  print row[0]

