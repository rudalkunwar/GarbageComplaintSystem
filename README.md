# Garbage Complaint System

## Overview

The Garbage Complaint System is a web-based application developed using PHP and the Tailwind CSS framework. It is designed to streamline the process of managing garbage collection complaints, bin assignments, and user interactions. The system is divided into distinct directories to manage different roles and functionalities:

- **Admin**: This directory contains all the functionalities related to administrators, including bin creation, driver assignment, complaint verification, profile editing, and password changes.

- **User**: The User directory handles user-related operations such as registration, viewing available bins, submitting complaints, changing passwords, and updating user profiles.

- **Driver**: In the Driver directory, you'll find files dedicated to drivers' tasks, including receiving assigned tasks, updating their status, changing passwords, and editing their profiles.

- **Layout**: The Layout directory contains header and footer layouts that are used across the application to maintain a consistent look and feel.

## Features

- **User Registration**: Users can sign up for the platform, providing their necessary information.

- **Bin Creation**: Admins can create new bins for garbage collection areas.

- **Driver Assignment**: Admins can assign drivers to specific tasks or areas.

- **Complaint Verification**: Admins can review and verify user complaints.

- **View Bins**: Users can view available bins in their area.

- **Submit Complaints**: Users can submit complaints about garbage collection issues.

- **Change Password**: Users, admins, and drivers can change their passwords.

- **Profile Editing**: Users, admins, and drivers can update their profiles.

## Technologies Used

- **PHP**: The project's backend is built using PHP, which handles server-side logic and database interactions.

- **Tailwind CSS**: The Tailwind CSS framework is used for styling and creating a responsive user interface.If you failed to load 
any styles then run this command in your terminal 
-> npx tailwindcss -i ./src/tailwind.css -o ./public/style.css --watch

## Getting Started

To get started with the Garbage Complaint System, follow these steps:

1. Clone this repository to your local machine.

2. Set up a web server with PHP support (e.g., Apache, Nginx) and configure it to serve the project files.

3. Import the database schema provided in the project.

4. Run this project

## Default Admin Login Credentials

To access the admin panel, you can use the following default login credentials:

- **Username**: ankushruzal@gmail.com
- **Password**: 12345678

Please note that it's crucial to change the default password after your initial login for security reasons.

## License

This project is licensed under the Rudal Kunwar.



