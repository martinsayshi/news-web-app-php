# News Web Application

This is a PHP web application that allows users to add new, edit, and explore articles and their authors. It provides a simple and user-friendly interface to manage the news, and it can be used for various purposes such as personal blog or news portal.

## Features

-   Add new articles
-   Edit existing articles
-   Explore articles and authors

## How to Use

To use this web application, simply click on the link: [https://blog-php-crud.000webhostapp.com/](https://blog-php-crud.000webhostapp.com/) and start exploring. You can navigate through the different pages using the links in the navigation bar.

## Technologies Used

This application is built using PHP and MySQL for the backend, HTML and CSS for the frontend. It also uses the Bootstrap framework for styling. The code is structured using the Model-View-Controller (MVC) design pattern, which separates the application logic into three interconnected components.

## Credits

This application was created by Marcin Miękisz.

## Using the App

To use the app, follow these steps:

1.  Install PHP and a web server (such as Apache or Nginx) on your machine.
    
2.  Clone the app repository to your local machine.
    
3.  Navigate to the root directory of the app.
    
4.  Run the following command in your terminal to install the dependencies:
    
    `composer install` 
    
5.  Open the `app/core/Database.php` file and update the database connection settings to match your MySQL database credentials.
    
6.  Import the `.sql` file located in `core/schema.sql` into your MySQL database to create the necessary tables. You can use the following command in the terminal (replace `your_database_name` with the name of your database and `path/to/your/file.sql` with the path to your `.sql` file):
    
    `mysql -u username -p your_database_name < path/to/your/file.sql` 
    
    You will be prompted to enter your MySQL password.
    
7.  Start your web server.
    
8.  Open your web browser and navigate to `http://localhost:your_port_number`, replacing `your_port_number` with the appropriate port number for your web server.
    
9.  You should now see the home page of the app. From here, you can navigate to the other pages using the links in the navigation bar.
    

Note: You may need to configure your web server's document root to point to the `public` directory of the app in order to correctly serve the app files.

## SiteController

The SiteController class has several static methods that handle different requests from the user.

-   `index()`: This method retrieves all articles from the Model and creates an array of ArticleDTO objects for each article. It then renders the 'home' view with the array of ArticleDTO objects.
    
-   `addNews()`: This method handles both GET and POST requests. If it receives a POST request, it retrieves the data from the form, adds it to the Model, and then redirects the user to the home page. If it receives a GET request, it simply renders the 'addnews' view.
    
-   `editNews()`: This method handles both GET and POST requests. If it receives a POST request, it retrieves the data from the form, updates the corresponding article in the Model, and then redirects the user to the home page. If it receives a GET request, it retrieves the article with the corresponding id from the Model and creates an ArticleDTO object for that article. It then renders the 'edit' view with the ArticleDTO object.
    
-   `checkPost()`: This method retrieves an article with a specific id from the Model and creates an ArticleDTO object for that article. It then renders the 'article' view with the ArticleDTO object.
    
-   `checkAuthor()`: This method handles both GET and POST requests. If it receives a GET request with an author id, it retrieves all articles by that author from the Model and creates an array of ArticleDTO objects for those articles. It then renders the 'articlesauthor' view with the array of ArticleDTO objects. If it receives a GET request without an author id, it retrieves all authors from the Model and renders the 'author' view with an array of AuthorDTO objects for each author.
    
-   `getTopAuthors()`: This method retrieves the top authors from the Model and creates an array of AuthorDTO objects for those authors. It then renders the 'topauthors' view with the array of AuthorDTO objects.

## ArticleDTO

The ArticleDTO class represents an article in the application. It has private properties for the article's id, title, text, creation date, and authors. The constructor takes an stdClass object as an argument and initializes the properties with the corresponding values from the object. The class also has getter methods for each property.

## AuthorDTO

The AuthorDTO class represents an author in the application. It has private properties for the author's name and article count. The constructor takes an stdClass object as an argument and initializes the properties with the corresponding values from the object. The class also has getter methods for each property.

## Database Class

The `Database` class provides a simple PDO-based wrapper for interacting with a MySQL database. The class has methods for querying the database and returning results as an array of objects or a single object. It also provides methods for binding values to prepared statements, executing queries, and retrieving the last insert ID.

### Properties

-   `$host`: the hostname of the database server (default: "localhost")
-   `$user`: the username to use when connecting to the database (default: "root")
-   `$password`: the password to use when connecting to the database (default: "")
-   `$dbName`: the name of the database to connect to (default: "news_article_system")
-   `$pdo`: an instance of the PDO class used for interacting with the database
-   `$stmt`: the prepared statement object returned by the `prepare()` method
-   `$error`: any error messages generated by the database

### Methods

#### `__construct()`

The constructor method establishes a connection to the database by creating a new instance of the PDO class using the provided credentials. It also sets the error mode to throw exceptions.

#### `query($sql)`

The `query()` method prepares a SQL query for execution by calling the `prepare()` method on the PDO instance.

#### `bind($param, $value, $type = null)`

The `bind()` method binds a value to a parameter in a prepared statement. The third parameter `$type` specifies the data type of the value being bound, and is optional. If it is not specified, the method will attempt to determine the type automatically.

#### `execute()`

The `execute()` method executes the prepared statement and returns `true` on success or `false` on failure.

#### `lastInsertId()`

The `lastInsertId()` method returns the ID of the last inserted row in the database.

#### `resultSet()`

The `resultSet()` method executes the prepared statement and returns an array of objects representing the rows in the result set.

#### `single()`

The `single()` method executes the prepared statement and returns a single object representing the first row in the result set.

#### `rowCount()`

The `rowCount()` method returns the number of rows affected by the most recent query.

## Router

The `Router` class is responsible for routing incoming requests to the appropriate controller method based on the HTTP method and URI path. It has the following methods:

-   `get($path, $callback)`: adds a GET route to the `$routes` property with the specified `$path` and `$callback`.
-   `post($path, $callback)`: adds a POST route to the `$routes` property with the specified `$path` and `$callback`.
-   `resolve()`: resolves the current request by checking the HTTP method and URI path and calling the appropriate callback function from the `$routes` property. If no matching route is found, it will return "Page Not Found".

## Model

The `Model` class is responsible for interacting with the database to fetch and manipulate news articles and authors. It has the following methods:

-   `getOneArticle($id)`: fetches the news article with the specified `$id` from the database and returns it.
-   `getArticles()`: fetches all news articles from the database and returns them.
-   `getAllAuthors()`: fetches all authors from the database and returns them.
-   `getAuthorsId($data)`: fetches the author IDs from the database for the authors specified in the `$data` array and returns them.
-   `add($data)`: adds a new news article to the database based on the data in the `$data` array.
-   `edit($data)`: updates an existing news article in the database based on the data in the `$data` array.
-   `getArticlesByAuthor($authorId)`: fetches all news articles from the database that are written by the author with the specified `$authorId` and returns them.
-   `getTopAuthorsLastWeek()`: fetches the top 3 authors who wrote the most articles last week and returns them.

## View

The `View` class is responsible for rendering the HTML templates that display the news articles and authors. It has the following methods:

-   `render($view, $params = [])`: renders the template file with the specified `$view` name and passes the `$params` array as variables to the template.