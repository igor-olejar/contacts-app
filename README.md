# Contacts Web App
### by Igor Olejar (igor.olejar@gmail.com)

## Pre-requisites
- PHP 8
- MySQL
- composer
- git

This app uses the latest version of the Laravel framework, together with Bootstrap for the front end.

To run the application on your local machine, do the following.

## Clone the repository from **github**
<code>git clone https://github.com/igor-olejar/contacts-app.git</code>

<code>cd contacts-app</code>

<code> git checkout master</code>

## Dependencies
From the command line, run this to install the dependencies:

<code>composer install</code>

## Migrate database tables
<code>php artisan migrate</code>

## Seed some data
<code>php artisan db:seed</code>

## Run the tests
<code>phpunit</code>

## Run the app in your browser
<code>php artisan serve</code>
