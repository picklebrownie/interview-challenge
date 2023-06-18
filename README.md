# Interview Challenge

The challenge is to recreate this [page](https://longofathens.com/gs-vehicle/list?filter=New) and the page that is displayed when an item is clicked. Additionally, the user should have to log in in order to see either of these pages. 
- do not use a framework
- must be built in PHP 8.1 or greater
- use Bootstrap for a simple and clean design *(we are focused on functionality, so design is least important)*
- database must be MySQL or MariaDB

## Dev Environment
PHP 8, MariaDB, Nginx, phpMyAdmin, Xdebug, Docker

## Get Started

Ensure you have [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed and **open**. 

Clone the repository from github and open the directory in the terminal.
```
git clone git@github.com:picklebrownie/interview-challenge.git
cd interview-challenge
```

Start the docker container in the background.
```
docker-compose up -d
```

To stop the docker container, run the following from the command line in the root directory of your project.
```
docker-compose down
```

### Import the database

Open phpMyAdmin in your browser at [http://dbadmin.localhost](http://dbadmin.localhost).

go to the import tab and select the file located at `./build/database.sql` and click go. This will import the `interview-challenge` database, tables, and data.

### Opening the site

Open the site at [http://site.localhost](http://site.localhost).

### Debugging

Debugging is set up to run with PHPDebug extension in VSCode and Xdebug in the docker container. To debug, ensure the PHP Debug extension is installed in VSCode and click the debug button in the sidebar. Then click the green play button to start debugging.

## TODO

- [ ] Export database and put in build directory
- [ ] Update readme for how to import database

- [x] Create development environment with docker
- [x] Enable php debugger
- [x] Create a database
- [x] Create a table for vehicles
- [x] Create a table for users
- [x] Import data into the vehicles table
- [x] Modify data in the vehicles table
- [x] Create a db connection class
- [x] Create a user class
- [x] Add a login page
- [x] Add a logout button
- [x] Add a register page
- [x] Add a reset password page
- [x] Create the index page
- [x] Create the header
- [x] Create Vehicle class with get methods
- [x] Enable pagination
- [x] Create the vehicle list
- [x] Create the filter results form
- [x] Implement filtering by condition, make, model, year, and color
- [x] Implement filtering by keyword
- [ ] Create the vehicle detail page
- [x] Find and assign images for the Subaru vehicles
- [ ] Implement search by price with [jQuery slider](http://ionden.com/a/plugins/ion.rangeSlider/)
- [ ] Implement search by mileage with [jQuery slider](http://ionden.com/a/plugins/ion.rangeSlider/)
- [x] Create an images table with foreign key to vehicle id, many images to one vehicle relationship. images table has two columns: id and image_url where image_url is points to the image location on the server
- [x] Add images to the vehicle detail page
- [x] Add images to the index listings
- [x] Create a features table with foreign key to vehicle id, many features to one vehicle relationship. features table has two columns: id and feature
- [x] Display features on the vehicle detail page
- [ ] Add stock number, interior color, engine, and mpg to the vehicle detail page
- [ ] Use stock number to the index listings instead of the VIN
- [ ] Add new fields to the vehicle detail page
- [x] Add image slider on vehicle details page
- [ ] Add keywords column to the vehicles table
- [ ] Search keywords instead of all fields in the filter results
- [ ] Research and add semantic search for keywords
- [ ] Implement a proper footer