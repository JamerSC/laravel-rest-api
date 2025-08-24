## Learning Laravel API | August 23, 2025

### Youtube tutorial by Envato Tuts+ https://www.youtube.com/watch?v=YGqCZjdgJJk

## Documentation provided by default on creating new Laravel Project

## Setup

1. Create new Project

-   laravel project ex. laravel-api
-   Create Github repo then initialize the repo in the project folder
-   Find the .env file and check the database name & create the database in the mysql/xampp db

2. Designing & Seeding the Database

-   Create a Model Customer & Invoice (php artisan make:model Invoice --all)
-   Added data types of Customer & Invoice
-   Set the app > model Customer class (hasMany) & Invoice class (BelongsTo)
-   Set the Customer & Invoice factory
-   Seeding the database
-   After setting up the Customer & Invoice Model, Added Data types, Factory, Seeder. Next migrate the date (php artisan migrate:fresh --seed)
-   Note: Check the database

3. Versioning & Defining Routes

-   App > Http > Controllers > Api > Version & Routes > api
-   Run the server then test the api url: http://127.0.0.1:8000/api/v1/customers
-   Transforming database data into Json: php artisan make:resource V1\CustomerResource (Resource transform Eloquent Model into Json)

## August 24, 2025

4. Fitlering Data (Part 1)

-   added Services Folder > create new class CustomerQuery
-   added logic to Controller > Index function
-   added logic to Service > Customer Query > add variables for mapping & filterRequest() method
-   example of API query parameter
-   http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=90000
-   http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=90000&type[eq]=B

5. Fitlering More Data (Part 2)

-   Change/Rename forder Services to Filter Folders, CustomersQuery to CustomersFilter
-   Added ApiFilter Class
-   Copy paste the logic of CustomerFilter into ApiFilter class
-   Added InvoiceFilter Class
-   Removed the method of Customers & Invoices Filter Class
-   Update the controller logic to maintain the link filter query

6. Including Related Data
