<h1 align="center">Help Desk 🆘</h1>

> Project Status: ⏳ In progress


## Project description 📝

<p align="justify">
The present Help Desk system project was developed for the WEB II Development course of Bachelor of Computer Science at Instituto Federal Catarinense - IFC, aims to provide a support tool, acting in the opening and registration of tickets (called) and their management.
</p>

## Technologies 👨‍💻

<p align="center">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img src="https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white"/>
  <img src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
</p>

## Configuration ⚙️

### Minimum requirements

- PHP - v8.1.X.
- MySQL - v10.4.22 or above.
- Composer - v2.3.10 or above.

### Installation

To run this project, you will need to install PHP, MySQL and Composer. 
Once installed, run the following steps:

- Copy the .env.example and rename to .env.
- Change the .env file informing the connection data and passwords.

Then run the following commands in the shell:

```shell
   composer install

   php artisan key:generate
```

### Database configuration

It's necessary to create a database with the default configuration in advance, then run the following commands in the shell to create the tables and perform the inclusion of the initial data:

```shell
   php artisan migrate

   php artisan db:seed
```

## How to execute ▶️

Execute the command below to run the project in your shell.

```shell
   php artisan serve
```

## Documents 📄

[Scope Project (PT-BR)]()

[Software Requirements (PT-BR)]()

[Diagram Model Entity Relationship]()

## Libraries and frameworks 📚

[Summernote](https://github.com/summernote/summernote/)

[FPDF](http://www.fpdf.org/)

## Functionalities 🔧

✔️ Enable tickets to be opened, both by a technician and by the customer.

✔️ Control the amount of hours worked by a particular technician on each ticket.

✔️ Possibility to control the priorities of tickets.

## Observations 👀

This project is not yet in its final version.

## Screenshots 🖼


## Future enhancements 🚀

✔️ Internal chat.

✔️ Attachment management and control.

✔️ TODO List.

## License 🔑

The [MIT License]() (MIT)

Copyright ©️ 2022 - Rafael Camargo

