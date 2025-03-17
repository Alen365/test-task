# Book Library API

A simple API for managing books and authors. It supports CRUD operations and filtering.

## Table of Contents

- [Installation & Setup](#installation-setup)
- [Postman Collection](#postman-collection)

## Installation & Setup

### Step 1: Clone the Repository

Clone the repository to your local machine:

`git clone https://github.com/your-username/book-library-api.git`

#### Navigate into the project directory:

`cd book-library-api`

### Step 2: Install Dependencies

`composer install`

### Step 3: Set Up Environment Configuration

`cp .env.example .env`
`php artisan key:generate`

### Step 4: Configure Database (for faster setup use sqlite)

```
DB_CONNECTION=sqlite
DB_DATABASE=/path_to_your_database/database.sqlite
```

### Step 5: Migrate and Seed the Database

`php artisan migrate:fresh --seed`

### Step 6: Start the Development Server

`php artisan serve`

## Postman Collection

### Step 1: Download the Postman Collection

The Postman collection is available in the docs folder of the project. You can directly import it into Postman.

Navigate to the docs folder in the project directory.
Locate the
`./docs/BookLibraryAPI.postman_collection.json` and `./docs/Library Api (Local).postman_environment.json` files.

### Step 2: Import the Collection into Postman

Open Postman.
Go to File > Import.
Select the `BookLibraryAPI.postman_collection.json` file from the docs folder to import the collection.

Select the `Library Api (Local).postman_environment.json` file from the docs folder to import the environment.
