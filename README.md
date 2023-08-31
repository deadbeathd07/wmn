<h1 align="center">Women's Calendar</h1>

## About Project

This application allows you to track data such as:
- mestruation
- fertile days
- ovulation

The application, based on the entered data, calculates the above items.

The application allows you to specify such data as:
- mood
- notes
- drugs taken
- sexual activity
- symptoms
  
It also allows you to track daily water intake, weight and body temperature.
The entered data is subject to change.


## Necessary requirements for installation
- Local server (for example <a href="https://ospanel.io/">Open Server Panel</a>)


## Application installation

Due to the fact that the repository contains both frontend files and backend files, below are the instructions for installing this application.

### Project setup

If you are working with this, then you need to clone the repository to the domains folder and install there.

1. Set up the Laravel directories
```
composer install
```
2. In the top folder copy the .env.example file and under the name .env and enter the following command
```
php artisan migrate
```
Click *yes* on the prompted dialog box to create a database for this application.

3. To start the server, enter 
```
php artisan serve
```
4. Set up Vue directories, but before that you need to go to the folder Vue so that the files will be installed in the location we need
```
cd vue
```
5. Set up the node modules
```
npm install --legacy-peer-deps
```
6. To run the application enter the following command in the terminal
```
npm run serve
```
