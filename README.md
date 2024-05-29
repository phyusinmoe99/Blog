

## Prerequisites
- PHP 7.4 or higher
- Composer
- Node.js and npm
- XAMPP

## Setup Instructions

1. **Install PHP dependencies**:
    ```sh
    composer install
    ```

2. **Set up environment variables**:
    ```sh
    cp .env.example .env
    ```
    Update the `.env` file with your database credentials and other necessary configurations.

3. **Generate an application key**:
    ```sh
    php artisan key:generate
    ```

4. **Run the migrations**:
    ```sh
    php artisan migrate
    ```

5. **Seed the database** (optional):
    ```sh
    php artisan db:seed
    ```

6. **Install Node.js dependencies**:
    ```sh
    npm install
    ```

7. **Compile assets**:
    ```sh
    npm run dev
    ```

8. **Start the local development server**:
    ```sh
    php artisan serve
    ```


   


