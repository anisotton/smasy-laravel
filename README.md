# SMASY

School Manager System.


### Built With

* [Visual Studio Code](https://code.visualstudio.com/)
* [Docker](https://www.docker.com/)
* [Git](https://git-scm.com/)
* [Cmder](https://cmder.net/)
* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)
* [Composer](https://getcomposer.org/)


## Getting Started

### Prerequisites

Install Cmder, Git and Docker to be able to run the system.

### Installation

_Create a folder to install the system and execute Cmder in this with the follow commands_

1. Clone the repo
   ```sh
   git clone https://github.com/anisotton/smasy-laravel.git .
   ```
2. Create a docker container according to the `docker-compose.yml`
   ```sh
   docker-compose up -d
   ```
3. Access the container app
   ```sh
   docker exec -it app sh
   ```
4. Install composer and its dependencies
   ```sh
   composer install
   ```
5. Exit the container app
   ```sh
   exit
   ```
6. Create the `.env` file
   ```sh
   cp .env.example .env
   ```
7. Now you can create your DB according the `.env` file

## Usage

System created to manage schools of any kind.


## License
[MIT](https://choosealicense.com/licenses/mit/)

## Contact

Anderson Isotton - anderson@isotton.com.br

Roger Lauermann - roger@lauermann.dev

Project Link: [https://github.com/anisotton/smasy-laravel](https://github.com/anisotton/smasy-laravel)
