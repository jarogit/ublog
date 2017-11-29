Blog application based on Symfony framework
========================

## Installing

 1. Clone the repository
 2. composer install
 3. Create the database with 'php bin/console doctrine:database:create'
 4. Update schema with 'php bin/console doctrine:schema:create'
 5. Load fixtures with 'php bin/console --no-interaction doctrine:fixtures:load'
 
 ## Admin
 
 username: admin
 
 password: admin
 
 ## REST API
 
 * `GET /api/post`
 
   Returns a list of blog posts
 
 * `GET /api/post/{id}`
 
   Returns details of a single blog post
