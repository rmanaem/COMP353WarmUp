# Covid Web Tracker

Covid web tracker is web-based tool designed to emulate some functionalities of the COVID-19 Public Health Care System (C19PHCS), to help the public health administration keep track of, monitor, and control the spread of COVID-19.

The application maintains personal information about the population involved in the pandemic whether infected or not, information about Public Health workers involved in the PCR (Polymerase Chain Reaction) tests, information about the Public Health facilities where PCR tests are performed, and the diagnostic results.

## Architecture

Covid web tracker is developed using [Laravel](https://laravel.com/), [Compose](https://getcomposer.org/), and [MySQL](https://www.mysql.com/). The application offers a graphical user interface that contains an authentication layer and a CRUD API. Authentication layer separates regular users from authorized users and provides a different view based on user's permissions. In their portal regular users will receive messages regarding the status their PCR test and alerts which includes the change in the status of their region and the new guidelines that should be followed. Authorized users however have access to the CURD API where they can send and edit alerts and messages to regular users.

# Dependencies

-   PHP
-   Composer

## Windows

### Download XAMPP's installer

Get XAMPP's installer: https://www.apachefriends.org/download.html

### Download Composer's installer

Get Composer's installer: https://getcomposer.org/download/

### Configure Compose and Laravel

In a powershell instance enter the following command:

```powershell
composer global require Laravel/installer
```

## Executing the project

In a powershell window enter the following commands:

```powershell
cd "directory/where/you/cloned/the/repo"
php artisan serve
```

The project will run here: http://localhost:8000

# Languages

-   HTML5
-   CSS3
-   PHP
-   MySQL

## Team Members

-   Alexander Fourneaux
-   Arman Jahanpour
-   Elvira Konovalov
-   Antoine Poulin
