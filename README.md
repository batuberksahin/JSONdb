# JSONdb
// *Work In Progress*

Simple file-base data storage

## installation
Move 'JSONdb.php' file to your class folder. After that you can import JSONdb to your project like this

```php
require_once "classes/JSONdb.php";
```

## usage
First of all, create a JSONdb.
```php
$db = new JSONdb("db.json", [
	"name",
	"secondName"
]);
```
Then you can use JSONdb methods.

***insert***

Add a data to the database.
```php
$db->insert([
	"name" => "batu",
	"secondName" => "berk"
]);
```
***getFullContent***

Get all data in database.
```php
$users = $db->getFullContent();

foreach($users as $user) {
    echo 'First name: ' . $user->name . '<br>';
    echo 'Second name: ' . $user->secondName . '<br>';
    echo '-------<br>';
}
```
Output:
```
First name: batu
Second name: berk
-------
First name: batu
Second name: sahin
-------
First name: berk
Second name: sahin
-------
```

***getContentById***

Get data by id.
```php
$data = $db->getContentById($_GET["id"]);
```
This method returns an array.

***deleteById***

Delete data by id.
```php
$db->deleteById($_GET["id"]);
```

## LICENSE
[GNU General Public License v3.0](https://github.com/batuberksahin/JSONdb/blob/master/LICENSE)
