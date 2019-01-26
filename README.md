REQUEST CSE HELPERS
=======

The helpers allows you to Request processing. Get value for POST/GET/REQUEST method by key and set default value, check exist AJAX, POST and GET method - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-request

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. REQUEST CSE HELPERS solves the problem set default value to POST, GET and REQUEST method, and check exist AJAX, POST and GET method.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-request).

### Composer

Execute the following command to get the latest version of the package:
```
composer require cse/helpers-request
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-request": "*"
    }
}
```

### Git

Clone this repository locally:
```
git clone https://github.com/cs-eliseev/helpers-request.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-request/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-request.php](https://github.com/cs-eliseev/helpers-request/blob/master/examples/examples-request.php).

**Method POST data by key name**

Example:
```php
$_POST['example'] = 12345;
Request::post('example');
// 12345
```

Set default value:
```php
Request::post('example_2', 12345);
// 12345
```


**Method GET data by key name**

Example:
```php
$_GET['example'] = 12345;
Request::get('example');
// 12345
```

Set default value:
```php
Request::get('example_2', 12345);
// 12345
```

**Method REQUEST data by key name**

Example:
```php
$_REQUEST['example'] = 12345;
Request::request('example');
// 12345
```

Set default value:
```php
   Request::request('example_2', 12345);
// 12345
```

**Is AJAX**

Example:
```php
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
Request::isAjax();
// true
```



## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-request/blob/master/LICENSE.md) file for licensing details.