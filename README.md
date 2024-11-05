# Movie Sales Tracker

Movie Sales Tracker is a web application built with PHP and Laravel that allows users to manage theaters, movies, and sales data. The application includes features for adding, updating, and deleting records, as well as viewing analytics and charts for total sales, top-selling movies, and top-selling theaters.


## Deliverables

### Database Schema

movies Table
- id: The primary key for the table, auto-incremented.
- title: The title of the movie.
- release_date: The release date of the movie.

theaters Table
- id: The primary key for the table, auto-incremented.
- name: The name of the theater.
- location: The address of the theater.

sales Table
- id: The primary key for the table, auto-incremented.
- movie_id: A foreign key referencing the id column in the movies table.
- theater_id: A foreign key referencing the id column in the theaters table.
- date: The date of the sale.
- sales_amount: The amount of sales for that transaction.

### Database Dump Files

See the database_dump.sql file in movie-sales-app/database/database_dump.sql

Note: The following tables are auto-created by Laravel after running certain Artisan commands. These tables are created to support various features such as caching, job queues, migrations, authentication, and session management.
- cache
- cache_locks
- failed_jobs
- job_batches
- jobs
- migrations
- password_reset_tokens
- sessions
- users


### The two sets of code I wrote to accomplish this task are:

#### 1. Highest Theater Sales Python Script

The highestTheaterSales.py script is a Python program that connects to the `database.sqlite` SQLite database and retrieves the theater with the highest sales for a user-inputted date. 

- **Execute the script using Python:**
    Please make sure you are using Python version 3.6 or above.
    ```sh
    python3 --version
    python3 highestTheaterSales.py
    ```

- **Enter the Date:**

   When prompted, enter the date in the format `MM/DD/YYYY`.

   ```sh
   Enter date (MM/DD/YYYY): 10/31/2024
   ```

   The script will output the theater with the highest sales for the specified date.

   ```sh
   Theater with highest sales: AMC Santa Monica, Sales: $1,400.00
   ```
#### 2. Highest Theater Sales PHP function

In Homecontroller (path: app/http/controllers/HomeController.php) there is a highestTheaterSales function that calculates the theater with the highest sale given a date. Install and run the code on localhost to see the results.

### Installation

1. **Clone the repository and navigate to the movie-sales-app folder:**

   ```sh
   cd movie-sales-app
   ```

2. **Install dependencies:**

   ```sh
   composer install
   npm install
   ```

3. **Start the development server:**

   ```sh
   php artisan serve
   ```

### Usage

1. **Access the application:**

   Open your web browser and navigate to `http://localhost:8000`. 

2. **Calculate Highest Sales for a Given Day**
    - The home page has two components that allow you to calculate the highest theater sales and highest movie sales for a given day.

3. **View Analytics:**

   - Navigate to the analytics page to view total sales, top-selling movies, and top-selling theaters.
   - Use the interactive charts to visualize sales data. These charts will automatically update whenever new movies, sales, or theaters are added.
4. **Manage Records:**

   - Navigate to the admin dashboard to manage theaters, movies, and sales.
   - Use the forms to add new records.
   - Use the edit buttons to update existing records.
   - Use the delete buttons to remove records.

## Explaination of Extension

For this project, I wanted to provide a comprehensive solution for managing and visualizing movie sales data, enhancing both functionality and user experience. Therefore, my extension was creating a webpage with interactive charts and building CRUD (Create, Read, Update, Delete) APIs for the data. This extension allows users to visualize sales data and manage records without directly accessing the database.

## Project Structure

- **app/Http/Controllers:** Contains the application controllers.
- **app/Models:** Contains the Eloquent models.
- **database/migrations:** Contains the database migration files.
- **database/seeders:** Contains the database seeder files.
- **resources/views:** Contains the Blade templates.
- **public:** Contains the public assets (CSS, JS, images).

## Acknowledgements

- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Chart.js](https://www.chartjs.org/)