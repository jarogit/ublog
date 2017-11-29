Blog application based on Symfony framework
========================

## Installing

 1. Clone the repository
 2. `cd ublog`
 3. `composer install`
 4. Create the database with `php bin/console doctrine:database:create`
 5. Update schema with `php bin/console doctrine:schema:create`
 6. Load fixtures with `php bin/console --no-interaction doctrine:fixtures:load`
 7. Make sure that /var/ directory and all included directories are writable for web server user. If you are not familiar with it then just run: `sudo chmod -R 0777 var`
 
 ## Admin
 
 username: admin
 
 password: admin
 
 You can use Admin area to create and edit Posts and Tags.
 
 ## REST API
 
 * `GET /api/post`
 
   Returns a list of blog posts
 
 * `GET /api/post/{id}`
 
   Returns details of a single blog post
