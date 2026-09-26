Personal Task Manager

A simple Laravel web application for managing personal tasks. Users can create, view, edit, delete, and update the status of tasks from Pending to Completed.

Project Information
<br>
Item	Details
Project Code	WST21
Student Name	KYLE JAE R. CAPITO
Course & Year	BSIT 2ND YEAR SEC 9
Database	SQLite
Features

Add new tasks

View all tasks

Edit existing tasks

Delete tasks

Update task status between Pending and Completed

Set an optional due date

View pending and upcoming tasks on the dashboard

Simple and responsive task-management interface

Technologies Used

Laravel 12

PHP 8.2 or later

Blade Templates

SQLite

Vite

HTML & CSS

Task Database

The tasks table contains the following fields:

Field	Description
id	Unique task ID
task_name	Name of the task
description	Optional task details
status	Task status: Pending or Completed
due_date	Optional task deadline
created_at	Task creation timestamp
updated_at	Last update timestamp
Installation
Requirements

Before installing the project, make sure the following are installed:

PHP 8.2 or later

Composer

Node.js and npm

Git

1. Clone the Repository

Clone the repository and enter the project directory:

git clone <your-public-github-repository-url>
cd capito

2. Install PHP Dependencies
composer install

3. Create the Environment File

Copy the example environment file:

Windows:

copy .env.example .env


macOS/Linux:

cp .env.example .env


Generate the Laravel application key:

php artisan key:generate

4. Configure SQLite

Open the .env file and make sure the database connection is configured as:

DB_CONNECTION=sqlite


Create the SQLite database file if it does not already exist.

Windows:

type nul > database\database.sqlite


macOS/Linux:

touch database/database.sqlite

5. Run Database Migrations

Create the required database tables:

php artisan migrate

6. Install Frontend Dependencies

Install the Node.js dependencies:

npm install


Build the frontend assets:

npm run build

Running the Application

Start the Laravel development server:

php artisan serve


The application will normally be available at:

http://localhost:8000


Open the URL in your web browser.

Vite Development Server

For frontend development and hot reloading, open a second terminal and run:

npm run dev

Laravel Project Structure

The project follows the standard Laravel application structure.

Location	Purpose
routes/web.php	Defines application routes
app/Http/Controllers/TaskController.php	Handles task requests and validation
app/Models/Task.php	Represents the task database record
database/migrations/	Contains database table migrations
resources/views/	Contains Blade templates
public/css/	Contains application stylesheets
Main Request Flow
Route
  ↓
Controller
  ↓
Model
  ↓
Database
  ↓
Blade View

Main Routes
Method	URL	Purpose
GET	/	Display the dashboard
GET	/tasks	Display all tasks
GET	/tasks/create	Display the create-task form
POST	/tasks	Save a new task
PUT	/tasks/{task}	Update an existing task
PATCH	/tasks/{task}/toggle	Toggle Pending/Completed status
DELETE	/tasks/{task}	Delete a task
CRUD Operations

The application supports the following task operations:

Create

Users can create a new task by providing:

Task name

Optional description

Optional due date

New tasks are initially assigned a Pending status.

Read

Users can view their tasks through the task list and dashboard.

Update

Users can:

Edit task information

Change the task status

Toggle a task between Pending and Completed

Delete

Users can permanently remove tasks they no longer need.

Testing

Run the Laravel test suite using:

php artisan test


Before submitting the project, make sure all required task-management functions work correctly.

Troubleshooting
Clear Laravel Cache

If changes are not appearing correctly, you can clear the Laravel caches:

php artisan optimize:clear

Rebuild Frontend Assets

If CSS or frontend changes are not showing:

npm run build


For development with automatic updates:

npm run dev

Submission Checklist

Before submitting the project, verify the following:

 Student name and course/year are correct

 GitHub repository is public

 Complete Laravel project has been uploaded

 .env is not uploaded to GitHub

 database/database.sqlite is configured correctly

 Database migrations run successfully

 Application starts successfully

 Create task feature works

 View task feature works

 Edit task feature works

 Delete task feature works

 Pending/Completed status works

 Due dates work correctly

 Dashboard displays pending/upcoming tasks

 Laravel tests have been checked

 Repository URL is ready for submission

Project Status

The required task-management features are implemented, including CRUD operations, task status management, optional due dates, and dashboard task displays.

Before submission, verify the application locally and remove or fix any unused routes.

Note: If /calendar is registered in routes/web.php, make sure a corresponding resources/views/calendar.blade.php view exists before submission. Otherwise, remove the unused /calendar route.

Author

KYLE JAE R. CAPITO

BSIT 2ND YEAR SEC 9

Project Code: WST21
