# Yaakov Bank

## Installation

Install the project dependencies via composer

```composer install```

Configure autoload

``` composer dump-autoload``` 

## Configuration

Copy the structure of the example environment variable files

```cp .env.example .env```

Next

```php artisan key:generate```

Configure the database access credentials
```
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=true
```
Create a database.sqlite file in the root of the database folder

If you do not have php-sqlite enabled, put it in your php.ini
```
extension_dir = "<php ​​installation directory>/php-7.4.3/ext"
extension=php_pdo_sqlite.dll
extension=php_sqlite3.dll
sqlite3. ... directory>/php-7.4.3/ext"
```
Generate the base structure of the database:
```
php artisan migrate
```
Then create the test data
```
php artisan db:seed
```
## Execution

Run the system
```
php artisan serve
```
## Examples

To create a new account, with a balance, the payload below must be sent to the **/api/accounts** endpoint with a POST request:
```
{
"name": "Teste",
"password":"1111",
"account_number":"111",
"balance": 100.00,
"account_code":"22",
"agency":"333"
}
```
The default account created by the seeder is the following:
```
{
"name": "Thiago Dantas",
"password" : "1111",
"account_number" : "111",
"account_code" : "22",
"balance" : 1000,
"agency": "333"
}
```
To create the account using the factory, simply run the following command:
```
php artisan db:seed --class=AccountFakeTableSeeder
```
## Development Patterns

**Code Style**

[PSR-2](http://www.php-fig.org/psr/psr-2/)

**Division of layers**

Controller -> Service -> Repository -> Model
