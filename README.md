# Covid Web Tracker

Covid web tracker is web-based tool designed to emulate some functionalities of the COVID-19 Public Health Care System (C19PHCS), to help the public health administration keep track of, monitor, and control the spread of COVID-19.

The application maintains personal information about the population involved in the pandemic whether infected or not, information about Public Health workers involved in the PCR (Polymerase Chain Reaction) tests, information about the Public Health facilities where PCR tests are performed, and the diagnostic results.

## Architecture

Covid web tracker is developed using [Laravel](https://laravel.com/), [Compose](https://getcomposer.org/), and [MySQL](https://www.mysql.com/). The application offers a graphical user interface that contains an authentication layer and a CRUD API. Authentication layer separates regular users from authorized users and provides a different view based on user's permissions. In their portal regular users will receive messages regarding the status their PCR test and alerts which includes the change in the status of their region and the new guidelines that should be followed. Authorized users however have access to the CURD API where they can send and edit alerts and messages to regular users.

### Database Design

The E/R diagram below illustrates the design of the application's database.

<p alt="ER diagram-image" align="center"><a href="https://github.com/rmanaem/covid-web-tracker/blob/master/img/diagram.png"><img src="https://github.com/rmanaem/covid-web-tracker/blob/master/img/diagram.png?raw=true"/></a></p>

## Local Setup

To set up and run the application, you need to have the dependencies installed/configured.

### PHP

You will need a server and a dependency manager to run the application.

#### XAMPP

[XAMPP](https://www.apachefriends.org/) is a free and open-source tool cross-platform web server solution package that offers an interpreter (among other things) for scripts written in PHP. For installation and configuration instructions of XAMPP server, refer to the official website/documentation.

#### Composer

[Composer](https://getcomposer.org/) is an application-level dependency manager for PHP. For installation and configuration instructions of Composer, refer to the official website/documentation.

### MySQL

The application database is developed using MySQL. For installation and configuration instructions of MySQL, refer to the official website/documentation.

### Configure Compose and Laravel

In a powershell instance enter the following command:

```powershell
composer global require Laravel/installer
```

### Run the application

Lastly, having installed and configuerd the dependencies, you can run the application by running the following command in powershell:

```powershell
cd "directory/where/you/cloned/the/repo"
php artisan serve
```

The application will run on port 8000 of the local host: http://localhost:8000

## License

Covid web tracker is licensed under the terms of [MIT License](LICENSE).
