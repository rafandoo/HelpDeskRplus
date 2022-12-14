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
  <img src="https://img.shields.io/badge/Python-14354C?style=for-the-badge&logo=python&logoColor=white"/>
</p>

## Configuration ⚙️

### Minimum requirements

- PHP - v8.1.X.
- MySQL - v10.4.22 or above.
- Composer - v2.3.10 or above.
- Python - v3.10.6 or above.

### Installation

To run this project, you will need to install PHP, MySQL, Composer and Python. 
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
   python start.py -m -s

   or

   python start.py -ms
```

## How to execute ▶️

Execute the command below to run the project in your shell.

```shell
   python start.py -run
```

## Documents 📄

[Diagram Model Entity Relationship](https://github.com/rafandoo/HelpDeskRplus/blob/a24ccc8894b20fb9cb3fcbce2f6923ad1f36650b/docs/DIAGRAMA%20MODELO%20ENTIDADE%20RELACIONAMENTO.png)

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

The [MIT License](https://github.com/rafandoo/HelpDeskRplus/blob/f78ea11cbcc38ee4a13ce5be79aa4a35c34a2f01/LICENSE) (MIT)

Copyright ©️ 2022 - Rafael Camargo
