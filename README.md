## Simple Inventory API
This is a practice environment and API for creating a working React frontend. This readme will not contain data models or endpoint explanations as that is part of the learning experience. In order to determine the data models, it may be helpful to make a GET request to the endpoints and see what data is returned.

### Installation
1. Setup a new site called `inventory.test` in your Homestead instance.
2. Clone this repository.
3. `composer install` from the Vagrant box.
4. `npm install && npm run dev` from the Host (Your mac).
5. `php artisan migrate --seed` from the Vagrant box.
6. Configure the `.env` file to match your Database/server and app URL

### Usage
The API has two endpoints: `rooms` and `items`. Each endpoint implements a basic [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) interface. 

Base URL: http://inventory.test/api

### Rooms
Endpoint: `/rooms`

You can perform a GET, POST, PUT and DELETE request to manipulate data in the backend. 

Get all items for a room: `/rooms/{room}/items`

### Items
Endpoint: `/items`

You can perform a GET, POST, PUT and DELETE request to manipulate data in the backend. 

