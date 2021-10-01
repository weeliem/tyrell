
# Tyrell System Assignments

This assignments consist of 2 parts.
- Programming Test
- SQL Improvement Logic Test

This project is developed using the following frameworks and tools.
- Laravel 8
- PHP 7.4
- Vue.js 2
- Docker

Time spent on each assignment:
- **Assignment 1** - 2 hours
- **Assignment 2** - 30 minutes
## Requirements

1. Require docker installed in your machine
2. Stop all the apache / php server that currently running on your local machine.
3. Port required to run this project are 8088, 33064 and 3306.

  
## Installation

1. Clone a copy of project.
2. Use console or terminal to navigate into the project folder.
3. With any code editor(eg. Visual Studio Code), open up the project folder.
4. Make a copy of .env.example and rename it into .env.
5. Run **'docker-compose up'** and wait until all containers completely created. This might take a while.
6. Open another console or terminal and run **'docker ps'** in the same project folder.
7. Copy the tyrell/tyrell_app container ID (eg. 1c94a8bda8df).
8. Run **'docker exec -it <tyrell/tyrell_app container ID> sh'**.  For example **'docker exec -it 1c94a8bda8df sh'**. Please note that i am using Windows machine, if Mac, might need to run **'docker exec -it 1c94a8bda8df bash'**.
9. Run **'composer install'** and wait until complete.
10. Run **'npm install'** and wait until complete.
11. In your browser, run http://localhost:8088.