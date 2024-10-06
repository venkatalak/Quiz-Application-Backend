# Quiz Application Backend

This repository contains the backend PHP files for the Quiz Application. It provides backend support for the following frontend components:

- `topics.js`: Fetches quiz topics from the database
- `quiz.js`: Retrieves quiz questions from the database
- `result.js`: Handles posting quiz results to the database and retrieving scores

## PHP Files

- `topics.php`: Retrieves topics from the database
- `quiz.php`: Fetches questions for a specific quiz topic
- `score.php`: Handles posting quiz results to the database
- `result.php`: Retrieves scores from the database

## Setup Instructions

1. Install XAMPP server
2. Navigate to the XAMPP installation directory
3. Locate the `htdocs` folder
4. Create a new folder named `quiz-application-backend` inside `htdocs`
5. Clone or copy the contents of this repository into the `quiz-application-backend` folder

## Running the Project

1. Start XAMPP Control Panel
2. Start Apache and MySQL services
3. Open a web browser and navigate to `http://localhost/phpmyadmin`
4. Create a new database named `quiz-application` (if it doesn't already exist)
5. Import the provided SQL file (if available) or manually create the necessary tables

## Note

Ensure that your frontend application is configured to make requests to the correct backend URL.

## Database

The default database used is MySQL, which comes pre-installed with XAMPP. You can manage the database through phpMyAdmin, accessible at `http://localhost/phpmyadmin` after starting the XAMPP server.
