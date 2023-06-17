# Interview Challenge

The challenge is to recreate this [page](https://longofathens.com/gs-vehicle/list?filter=New) and the page that is displayed when an item is clicked. Additionally, the user should have to log in in order to see either of these pages. 
- do not use a framework
- must be built in PHP 8.1 or greater
- use Bootstrap for a simple and clean design *(we are focused on functionality, so design is least important)*
- database must be MySQL or MariaDB

## Dev Environment
PHP 8, MariaDB, Nginx, phpMyAdmin, Xdebug, Docker in a VSCode DevContainer

## Get Started

Ensure you have [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed. 

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