# phpunit-example
A small example of using PHPUnit to unit test an application. Here we have several classes:

* User: represents a user of our application
* UserRepository: contains all SQL code for retrieving, updating users.
* DbHandler: represents a connection to the database. This is the class that will actually perform the SQL queries.

We have tests added for both the User and UserRepository. By creating mock database connections we avoid actually connecting to the database during automated tests, making them run much faster, and avoid having to insert real data into the database and clear it out after each test.
