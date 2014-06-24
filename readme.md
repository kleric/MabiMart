<p align="center">
<img src="http://mabimart.com/images/logo.png"/>
</p>
MabiMart is an online auction site for the free-to-play game Mabinogi. Built to simplify the buying and selling of items in game. Not to mention also gaining some experience developing web applications.

MabiMart is built on top of Laravel (PHP Framework) backend and Bootstrap frontend. So far it's been tons of fun to develop, and hopefully it'll be really useful!

## Contributing
Honestly, just try to keep code clean, simple, and logical. If some parts of the code may be difficult to understand or read, add comments. If you're stuck with a merge conflict, and you're not sure how to resolve it, just ask.

### Setting up a Dev Environment
Getting up and running with Laravel is SUPER easy. Especially since you can just use their "Homestead" system. To do that, just checkout their docs on how to use Homestead http://laravel.com/docs/homestead.

You'll want to follow their instructions, as it'll get you going pretty quickly.

You should have a shared folder created (default name is Code), you'll want to clone the MabiMart repo into there. Afterwards, you'll want to install (gets all the dependencies for Laravel). To do that just run:

    composer install
    
Make sure you make the nginx site that points to the folder.

### Setting up the Databases
After you've got the site up and running, you'll want to actually setup the databases. This is pretty simple. SSH into vagrant and go to your root of the MabiMart code base and run:

    php artisan migrate
    php artisan db:seed
    
That will setup the tables, and then seed the data (all the items, enchants, etc). Then you should be good to go!

If you ever edit a migration or seed file (or make a new one), you can refresh the entire database by running:

    php artisan migrate:refresh --seed
    
That'll rollback and rerun your migrations and then seed.

#### Creating a Migration
To actually make a migration, just run:

    php artisan migrate:make migration_name_here
    
Generally do a description of what the migration actually does for the name (e.g. create_user_table). It'll append a date to the end, that determines an ordering for how the migrations are run (older first).

Sometimes the migrations might not work (it'll be like what the hell is this). To fix that run:

    composer dump-autoload
    
That'll fix class not found exceptions.
    

## Credit
This site is currently being developed by Jemmin Chang and Clark Chen.
