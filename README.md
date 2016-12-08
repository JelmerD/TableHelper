TableHelper for CakePHP 3.x
===========

[![Build Status](https://travis-ci.org/JelmerD/TableHelper.svg?branch=master)](https://travis-ci.org/JelmerD/TableHelper)

[Demo and examples](http://sandbox.jelmerdroge.nl/plugins/table-helper)

In case the live example is down, you can see the examples [here](https://github.com/JelmerD/cakephp-sandbox-3/tree/master/src/Template/Element/Demo/TableHelper) too.

Installation
------------

The easiest way to install the plugin is to use Composer.
Install Composer in the app folder of your application and then simply run:

```
php composer.phar require jelmerd/table-helper
// or if composer is installed globally
composer require jelmerd/table-helper
```

You can also clone the repository in the Plugin folder:

```
$ cd src/plugins
$ git submodule add git@github.com:JelmerD/TableHelper.git
```

Once the plugin is in place, load it in your `src/config/bootstrap.php` by adding this line:

```php
Plugin::load('TableHelper');
// when developing via a submodule, use
Plugin::load('TableHelper', ['autoload' => true]);
```

Now to use the Helper, simply load it in your Controller:

```php
public $helpers = array('TableHelper.Table');
```

