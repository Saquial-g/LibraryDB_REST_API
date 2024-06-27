
 # REST API for library database management

This is a technical test for an REST API which manages a small book database by using PHP via the Laravel framework.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)

## Installation

To install and set up this project locally, follow these steps:

1. Clone the repository and open the folder:

	git clone https://github.com/Saquial-g/LibraryDB_REST_API.git
    	cd GPT_API_Endpoint

2. Create a database on MySQL with the name "librarydb".

3. Clone the example .env file and set up environment variables: 
	
	copy .env.example .env
	
	- Modify the .env file according to your local project requirements. Read subsection "Environment Variables" for more details.

4. Run the database structure migration: 

	php artisan migrate

5. Install Node.js following the instructions from the website https://nodejs.org/en/download
	
## Usage

#### API

To start the REST API for development, run the following command:

php artisan serve

It's important to consider that this is for development only, and shouldn't be deployed as a public server.

#### Test webpage

Inside of test_htdocs there's a simple webpage which tests all the REST API functions. The website should be deployed in a simple web server for testing. 
The website has a variable $address which defines the address of the REST API, it should be changed if the address in which the API is deployed varies from the default 127.0.0.1:8000 address.

### API Endpoints

#### Create

- URL: {{baseURL}}/api/library
- Method: POST
- Additional headers:
    - X-CSRF-TOKEN: csrf token which authorizes POST requests. Has to be defined manually if using testing APIs like Postman.
- Body:
    - "title": (required) Title of the book
    - "author": (required) Author of the book
    - "publication_date": (required) Date in which the book was released, uses a YYYY-MM-DD format
    - "genre": (required) Genre of the book.
- Response: a json with the given information will be returned if the data is correct (200 OK), otherwise the data given was invalid and nothing will be returned (400 bad request).
- Explanation: this endpoint receives a POST request which contains the data for a new book in its body. The API uses the LibraryController which checks that the information is valid and then creates an instance with said data, which is later saved into the library database.

#### Read all (Fetch data of all the books)

- URL: {{baseURL}}/api/library
- Method: GET
- Response: a json with the data of all the books in the database will be returned if there is data (200 OK), otherwise there is no data in the database (404 not found).
- Explanation: this endpoint receives a GET request without any data. The API uses the LibraryController which gathers all the data from the database and returns it in a json.

#### Read (Fetch data of one book)

- URL: {{baseURL}}/api/library/{id}
- Method: GET
- Response: a json with the data of the requested book will be returned if it exists (200 OK), otherwise it doesn't exist (404 not found).
- Explanation: this endpoint receives a GET request which indicates in the URL the ID of the book to fetch. The API uses the LibraryController which gathers the data of the requested book from the database and returns it in a json.

## Configuration

### Environment Variables

The application uses the following environment variables:
- DB_HOST= the address of the MySQL database.
- DB_PORT= the port of the MySQL database.
- DB_DATABASE= the name of the database.
- DB_USERNAME= the user to access the database with.
- DB_PASSWORD= the password of said user.

## Contributing

This was made as a technical test, but feel free to contribute as you wish:

1. Fork the repository.

2. Create a new branch for your feature or bugfix: 
	
	git checkout -b feature-name

3. Make your changes and commit them: 

	git commit -m "Description of your changes"

4. Push your changes to your fork: 

	git push origin feature-name

5. Open a pull request on the main repository.

## License

This project is licensed under the MIT License.

