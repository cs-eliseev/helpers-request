[English](https://github.com/cs-eliseev/helpers-request/blob/master/README.md) | Русский

REQUEST CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-request.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-request)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-request.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-request)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-request.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-request/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-request.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-request)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-request)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-request.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-request/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-request.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-request/archive/master.zip)

Данная библиотек позволяет удобно работать с запросами. Доступны методы POST/GET/REQUEST для получения данных и установки значений по умолчанию, также можно проверить существование методов AJAX, POST и GET, а так же другие функци.

Репозиторий проекта: https://github.com/cs-eliseev/helpers-request

**DEMO**
```php
switch(true) {
    case Request::isAjax():
    case Request::isPost():
        Request::post('example', 5);
        break;
    case Request::isGet():
        Request::getRequestUri();
        break;
}
```

***


## Описание проекта

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. REQUEST CSE HELPERS, позволит вам довольно просто проверять и обрабатывать запросы.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-request).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-request
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-request": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-request.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-request/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-request.php](https://github.com/cs-eliseev/helpers-request/blob/master/examples/examples-request.php).


**Получить POST данные по ключу**

Пример:
```php
$_POST['example'] = 12345;
Request::post('example');
// 12345
```

Установить значение по умолчанию:
```php
Request::post('example_2', 12345);
// 12345
```

**Получить GET данные по ключу**

Пример:
```php
$_GET['example'] = 12345;
Request::get('example');
// 12345
```

Установить значение по умолчанию:
```php
Request::get('example_2', 12345);
// 12345
```

**Получить данные из REQUEST по ключу**

Пример:
```php
$_REQUEST['example'] = 12345;
Request::request('example');
// 12345
```

Установить значение по умолчанию:
```php
Request::request('example_2', 12345);
// 12345
```

**Проверить что пришел AJAX запрос**

Пример:
```php
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
Request::isAjax();
// true
```

**Проверить что пришел POST запрос**

Пример:
```php
$_SERVER['REQUEST_METHOD'] = Request::METHOD_POST;
Request::isPost();
// true
```

**Проверить что пришел GET запрос**

Пример:
```php
$_SERVER['REQUEST_METHOD'] = Request::METHOD_GET;
Request::isGet();
// true
```

**Получить ссылку запроса**

Пример:
```php
$_SERVER['HTTP_REFERER'] = '/link/example';
Request::getRequestUri();
// /link/example
```

Установить значение по умолчанию:
```php
Request::getRequestUri('/link/home');
// /link/home
```

Пример для AJAX запроса:
```php
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
$_SERVER['REQUEST_URI'] = '/link/example_ajax';
Request::getRequestUri();
// /link/example_ajax
```

**Проверить что есть перенаправление на HTTPS**

Пример:
```php
Request::isRedirectedToHttps('http://google.com');
// true
```


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

REQUEST CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-request/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)