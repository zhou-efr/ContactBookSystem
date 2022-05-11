# Contact Book System
_Simple contact system developed for a php lab exam._ [link](https://github.com/zhou-efr/ContactBookSystem)   
![](https://img.shields.io/badge/PHP-7.0-blueviolet)

## Table of Contents
* [Installation](#installation)
* [Features](#Features)

## Installation
No installation required for the website. You should just be able to run the command `php contact.php` and see the contact book.

I recommend using [PhpStorm](https://www.jetbrains.com/phpstorm/) to easily edit and run the code thanks to the [_PHP-CGI Server_](https://www.jetbrains.com/help/phpstorm/running-applications.html). In my case, I used php 7.0 (with MAMP) and PhpStorm 2018.2.

You still need a database to store the contacts. I recommend using [MySQL](https://www.mysql.com/). You must fill your database information in `source/conn.php` file.

## Features
This is a contact book, then you can add, edit, delete and search contacts. According to the lab subject, each contact has a phone number, email and address. To access the contact book, you need to login with your username and password. However, the contact book is common for all users. _If you log in as an admin, you can add, edit, delete and search contacts (wip)._

The contact book consists of a main page including a search bar, a list of contacts and a form to add a new contact. This page is accessible by all users after registration and login.
### 1. Add new contact
You can add a new contact by clicking the "Add new contact" button. To add a new contact you have to fill the following fields:
- Name
- Email
- Phone number
- Address
- Relationship
- Birthday
- Gender
### 2. Search contact
You can search by name, email, phone number or adress through the search bar.
### 3. Delete contact
You can delete a contact by clicking on the __Delete__ button in the __Action__ column.
### 4. Update contact
You can update a contact by clicking on the __Update__ button in the __Action__ column.

It displays all the contact's information in a form.
### 5. Sort contact
You can sort the contacts by relationship through the sidebar links.
### 6. User authentication
When no user is logged in, the website offer to either connect or create an account.

On the main page, you can see the user's name and the logout button.
