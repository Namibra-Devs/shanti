### Project Structure
Project Controllers are located inside app/Http/controllers
You can find the Admin controllers in the Admin Folder, Frontend Controllers in the Front Folder and what have you

Project views or html templates are located in resources/views
Backend views or html templates are located in the admin folder
frontend views views are in the frontend folder
user views in the user folder

## Project Components
fronted navbar
    resources/views/frontend/partials/navba.blade.php

frontend main content
    resources/views/frontend/index.php

All components are included in resources/views/frontend/layout.blade.php
eg.  @includeIf('frontend.partials.navbar') to include the navbar to the template


Project styles are located in public/assets folder
backend or admin styles in the admin/css folder
frontend styles in the frontend/css folder
frontend hompage styles are public/assets/css/styles.css

## Database Configuration
find the sql file in the database file folder, create a database and import it
In the .env file change the database details as indeicated below
DB_CONNECTION=mysql
DB_HOST=yourhostname
DB_PORT=yourport
DB_DATABASE=yourdatabasename
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword
