# Financial Management Application

This is a web-based financial management application built with Laravel. It allows users to track their income, expenses, entities, categories, accounts, credit cards, and financial goals.

## Table of Contents

*   [Features](#features)
*   [Installation](#installation)
*   [Configuration](#configuration)
*   [Database Setup](#database-setup)
*   [Usage](#usage)
*   [Directory Structure](#directory-structure)
*   [Models](#models)
*   [Controllers](#controllers)
*   [Views](#views)
*   [Routes](#routes)
*   [Form Requests](#form-requests)
*   [Authentication](#authentication)
*   [Dark Mode](#dark-mode)
*   [Contributing](#contributing)
*   [License](#license)

## Features

*   **User Authentication:** Secure user registration, login, and logout.
*   **Entity Management:** Create, read, update, and delete financial entities (e.g., businesses, personal accounts, properties).
*   **Transaction Tracking:** Record income and expenses, categorize transactions, and associate them with entities, accounts, and credit cards.
*   **Category Management:** Define and manage transaction categories (e.g., food, housing, transportation).
*   **Account Management:** Track bank accounts, savings accounts, and cash accounts.
*   **Credit Card Management:** Manage credit card details, including credit limits, available credit, and interest rates.
*   **Goal Setting:** Set financial goals, track progress, and monitor target dates.
*   **Dashboard:** Provides an overview of financial data, including key metrics and visualizations.
*   **Dark Mode:** Supports a dark theme for improved user experience in low-light environments.

## Installation

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd financial_management_app
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

4.  **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

## Configuration

1.  **Configure your database connection in the `.env` file:**

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

2.  **Configure your email settings in the `.env` file (optional):**

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=your_mail_host
    MAIL_PORT=your_mail_port
    MAIL_USERNAME=your_mail_username
    MAIL_PASSWORD=your_mail_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=your_email_address
    MAIL_FROM_NAME="${APP_NAME}"
    ```

## Database Setup

1.  **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

2.  **Seed the database with initial data (optional):**

    ```bash
    php artisan db:seed
    ```

## Usage

1.  **Start the development server:**

    ```bash
    php artisan serve
    ```

2.  **Access the application in your browser:**

    ```
    http://localhost:8000
    ```

3.  **Register a new user account or log in with an existing account.**

4.  **Navigate the application using the navigation menu.**

## Directory Structure
financial_management_app/
├── app/ # Application code
│ ├── Console/ # Custom Artisan commands (optional)
│ ├── Exceptions/ # Exception handling
│ ├── Http/ # HTTP controllers, middlewares, and requests
│ │ ├── Controllers/ # Logic for handling requests
│ │ │ ├── Auth/ # Authentication controllers (LoginController, RegisterController, etc.)
│ │ │ ├── EntityController.php # Manages financial entities (companies, accounts, etc.)
│ │ │ ├── TransactionController.php # Manages transactions (income, expenses)
│ │ │ ├── CategoryController.php # Manages transaction categories (food, housing, etc.)
│ │ │ ├── AccountController.php # Manages bank accounts
│ │ │ ├── CreditCardController.php # Manages credit cards
│ │ │ ├── DashboardController.php # Logic for the main dashboard
│ │ │ ├── GoalController.php # Manages financial goals
│ │ │ ├── ProfileController.php # Manages user profiles
│ │ │ ├── UserController.php # Manages users and permissions
│ │ ├── Middleware/ # HTTP middlewares (authentication, authorization, etc.)
│ │ ├── Requests/ # Form data validation
│ │ │ ├── StoreEntityRequest.php # Validation for creating a financial entity
│ │ │ ├── UpdateEntityRequest.php # Validation for updating a financial entity
│ │ │ ├── StoreTransactionRequest.php # Validation for creating a transaction
│ │ │ └── ... # Other validations
│ ├── Models/ # Database data representation (Eloquent Models)
│ │ ├── User.php # User model (already exists)
│ │ ├── Entity.php # Represents a financial entity (company, house, etc.)
│ │ ├── Transaction.php # Represents a financial transaction
│ │ ├── Category.php # Represents a transaction category
│ │ ├── Account.php # Represents a bank account
│ │ ├── CreditCard.php # Represents a credit card
│ │ ├── Goal.php # Represents a financial goal
│ ├── Providers/ # Service providers (configurations and initializations)
├── bootstrap/ # Laravel initialization files
├── config/ # Configuration files
│ ├── database.php # Database configurations
│ ├── filesystems.php # File storage configurations (for future uploads)
├── database/ # Database migrations and seeds
│ ├── migrations/ # Database schemas (table creation)
│ │ ├── xxxx_create_users_table.php # User table (already exists)
│ │ ├── xxxx_create_entities_table.php # Financial entity table
│ │ ├── xxxx_create_transactions_table.php # Transaction table
│ │ ├── xxxx_create_categories_table.php # Category table
│ │ ├── xxxx_create_accounts_table.php # Bank account table
│ │ ├── xxxx_create_credit_cards_table.php # Credit card table
│ │ ├── xxxx_create_goals_table.php # Financial goal table
│ │ └── ... # Other migrations
│ ├── seeders/ # Initial database population (optional)
├── public/ # Public files (CSS, JavaScript, images)
├── resources/ # Application views and assets
│ ├── css/ # CSS stylesheets
│ ├── js/ # JavaScript files
│ ├── lang/ # Translation files (optional)
│ ├── views/ # Blade templates (HTML)
│ │ ├── layouts/ # Application layouts (app.blade.php, etc.)
│ │ ├── auth/ # Authentication views (login, register, etc.)
│ │ ├── entities/ # Views for financial entities (index, create, edit, show)
│ │ ├── transactions/ # Views for transactions (index, create, edit, show)
│ │ ├── categories/ # Views for categories (index, create, edit, show)
│ │ ├── accounts/ # Views for bank accounts (index, create, edit, show)
│ │ ├── credit_cards/ # Views for credit cards (index, create, edit, show)
│ │ ├── dashboard/ # Views for the dashboard (index)
│ │ ├── goals/ # Views for financial goals (index, create, edit, show)
│ │ ├── profile/ # Views for user profile (edit)
│ │ └── ... # Other views
├── routes/ # Application routes
│ ├── web.php # Web routes (user interface)
│ ├── api.php # API routes (for other applications) (optional)
├── storage/ # Application stored files (logs, uploads, etc.)
├── tests/ # Automated tests
├── vendor/ # Composer dependencies
├── .env # Environment variables (sensitive configurations)
├── artisan # Script to execute Artisan commands
├── composer.json # Project dependency information
└── composer.lock # Exact versions of project dependencies

## Models

*   **`app/Models/Entity.php`:** Represents a financial entity (company, house, etc.).
    *   Fields: `user_id`, `name`, `description`, `type`
    *   Relationships: `belongsTo(User::class)`, `hasMany(Transaction::class)`
*   **`app/Models/Transaction.php`:** Represents a financial transaction.
    *   Fields: `entity_id`, `category_id`, `account_id`, `credit_card_id`, `date`, `description`, `amount`, `type`
    *   Relationships: `belongsTo(Entity::class)`, `belongsTo(Category::class)`, `belongsTo(Account::class)`, `belongsTo(CreditCard::class)`
*   **`app/Models/Category.php`:** Represents a transaction category.
    *   Fields: `name`, `description`, `type`
    *   Relationships: `hasMany(Transaction::class)`
*   **`app/Models/Account.php`:** Represents a bank account.
    *   Fields: `name`, `type`, `balance`, `description`
    *   Relationships: `hasMany(Transaction::class)`
*   **`app/Models/CreditCard.php`:** Represents a credit card.
    *   Fields: `name`, `number`, `expiration_date`, `cvv`, `credit_limit`, `available_credit`, `interest_rate`
    *   Relationships: `hasMany(Transaction::class)`
*   **`app/Models/Goal.php`:** Represents a financial goal.
    *   Fields: `user_id`, `name`, `description`, `target_amount`, `current_amount`, `target_date`
    *   Relationships: `belongsTo(User::class)`

## Controllers

*   **`app/Http/Controllers/EntityController.php`:** Manages financial entities.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/TransactionController.php`:** Manages transactions.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/CategoryController.php`:** Manages transaction categories.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/AccountController.php`:** Manages bank accounts.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/CreditCardController.php`:** Manages credit cards.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/DashboardController.php`:** Manages the dashboard.
    *   Methods: `index`
*   **`app/Http/Controllers/GoalController.php`:** Manages financial goals.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
*   **`app/Http/Controllers/ProfileController.php`:** Manages user profiles.
    *   Methods: `edit`, `update`, `destroy`
*   **`app/Http/Controllers/UserController.php`:** Manages users and permissions.
    *   Methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`

## Views

The views are organized in directories corresponding to each resource (entities, transactions, categories, etc.). Each directory contains the views for listing (`index.blade.php`), creating (`create.blade.php`), editing (`edit.blade.php`), and displaying details (`show.blade.php`) of the resource.

The `resources/views/layouts/app.blade.php` file contains the main layout of the application, including the header, sidebar, footer, and CSS/JavaScript includes.

## Routes

The `routes/web.php` file defines the web routes for the application. It associates URLs with specific controllers and actions.

Routes within the `Route::middleware(['auth'])->group(function () { ... });` block are protected and require the user to be authenticated.

`Route::resource('resource_name', Controller::class);` automatically creates the standard routes for a resource (index, create, store, show, edit, update, destroy) pointing to the corresponding actions in the controller.

## Form Requests

Form requests are used to validate form data before it is processed by the controllers. They are located in the `app/Http/Requests` directory.

*   `StoreEntityRequest.php`: Validation rules for creating a financial entity.
*   `UpdateEntityRequest.php`: Validation rules for updating a financial entity.
*   `StoreTransactionRequest.php`: Validation rules for creating a transaction.
*   ... (and so on for other resources)

## Authentication

The application uses Laravel's built-in authentication system. The authentication routes and views are located in the `routes/auth.php` and `resources/views/auth` directories, respectively.

## Dark Mode

The application supports a dark theme. To enable dark mode, you may need to configure Tailwind CSS and add the `dark` class to the `<html>` element or use the `media` strategy in your `tailwind.config.js` file.

## Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Make your changes and commit them with descriptive commit messages.
4.  Push your changes to your fork.
5.  Submit a pull request.

