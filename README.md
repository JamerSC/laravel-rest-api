### Learning Laravel API | August 23, 2025

### Youtube tutorial by Envato Tuts+ https://www.youtube.com/watch?v=YGqCZjdgJJk

### Documentation provided by default on creating new Laravel Project

### Setup

### Chapter 1: Introduction to LARAVEL

### Chapter 2: Getting Started

1. CREATING THE PROJECT

-   laravel project ex. laravel-api
-   Create Github repo then initialize the repo in the project folder
-   Find the .env file and check the database name & create the database in the mysql/xampp db

2. DESIGNING AND SEEDING THE DATABASE

-   Create a Model Customer & Invoice (php artisan make:model Invoice --all)
-   Added data types of Customer & Invoice
-   Set the app > model Customer class (hasMany) & Invoice class (BelongsTo)
-   Set the Customer & Invoice factory
-   Seeding the database
-   After setting up the Customer & Invoice Model, Added Data types, Factory, Seeder. Next migrate the date (php artisan migrate:fresh --seed)
-   Note: Check the database

### Chapter 3: Providing Data

3. VERSIONING AND DEFINING ROUTES

-   App > Http > Controllers > Api > Version & Routes > api
-   Run the server then test the api url: http://127.0.0.1:8000/api/v1/customers

4. TRANSFORMING DATABASE DATA INTO JSON

-   Php artisan make:resource V1\CustomerResource (Resource transform Eloquent Model into Json)

### August 24, 2025

5. FILTERING DATA

-   added Services Folder > create new class CustomerQuery
-   added logic to Controller > Index function
-   added logic to Service > Customer Query > add variables for mapping & filterRequest() method
-   example of API query parameter
-   http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=90000
-   http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=90000&type[eq]=B

6. FILTERING MORE DATA

-   Change/Rename forder Services to Filter Folders, CustomersQuery to CustomersFilter
-   Added ApiFilter Class
-   Copy paste the logic of CustomerFilter into ApiFilter class
-   Added InvoiceFilter Class
-   Removed the method of Customers & Invoices Filter Class
-   Update the controller logic to maintain the link filter query

7. INCLUDING RELATED DATA

-   Updated the Customer controller chage the index method login and added a variable inlude invoices
-   Updated the App > Http> Controller > Resources > CustomerResource Class then added a new field for Invoice

### Chapter 4: Manipulating Data

8. CREATING RESOURCES WITH POST REQUESTS

-   In controller create() & edit() method will not be use in API (usually it is use on web application)
-   Use the existing or StoreCustomerRequest or type - 'php artisan make:request V1\StoreCustomerRequest'
-   StoreCustomerRequest - make the authorize method true, add rules, & create a prepareForValidation() method for camelCase jason to merge to database column
-   Add fillable in Customer Model
-   Test post request in the postman
-   Update the header.. unchecked the application, then create Application & select the Application/Json

9. UPDATING WITH PUT & PATCH

-   Use the existing or UpdateCustomerRequest or type - 'php artisan make:request V1\UpdateCustomerRequest'
-   Update the UpdateCustomerRequest function logic for PUT & PATCH Method, update Customer controller -> update() method.
-   Test put & patch request in the postman
-   Update the header.. unchecked the application, then create Application & select the Application/Json
