🚀 Setup InstructionsFollow these steps to get the project running locally:

Clone the repositorygit clone https://github.com/Ahmed-Raza-Khan/Task-Management-System-Laravel-13.git
cd Task-Management-System-Laravel-13

Install Dependencies

composer install
npm install

Environment Configuration
cp .env.example .env

Generate the application key:
php artisan key:generate

Open .env and configure your database settings (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

Database Setup
Run the migrations to create the necessary tables:

php artisan migrate

Run the Application
You will need to run two separate terminals:

Terminal 1 (Backend):
php artisan serve

Terminal 2 (Frontend Assets):
npm run dev

🌱 Database Seeding Commands
To populate your database with initial data for users, tasks, and priorities, run

:php artisan db:seed

Note: If you want to refresh the entire database and seed it in one go, use:
php artisan migrate:fresh --seed

📝 Additional NotesCore Features: The system tracks Users, Tasks, and Task Priorities.
Framework: This project utilizes the latest Laravel 13 features and conventions.