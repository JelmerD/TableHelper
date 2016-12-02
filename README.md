TableHelper
===========

TableHelper for CakePHP 3.x 

[![Build Status](https://travis-ci.org/JelmerD/TableHelper.svg?branch=master)](https://travis-ci.org/JelmerD/TableHelper)

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

Examples
--------

**Input**

```PHP
echo $this->Table->create();
echo $this->Table->row(array('Clint', 'Eastwood'));
echo $this->Table->end();
```

**Output**

```Html
<table class="table">
  <tbody>
    <tr>
      <td>Clint</td>
      <td>Eastwood</td>
    </tr>
  </tbody>
</table>
```

---

**Input**

```PHP
echo $this->Table->create();
echo $this->Table->head(array('ID', 'First name', 'Last name'));
echo $this->Table->row(array(1, 'Clint','Eastwood'));
echo $this->Table->foot(array(null, 'Total names', 1));
echo $this->Table->end();
```

**Output**

```Html
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>First name</th>
      <th>Last name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Clint</td>
      <td>Eastwood</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td>Total names</td>
      <td>1</td>
    </tr>
  </tfoot>
</table>
```

---

**Input**

```PHP
echo $this->Table->create(array('data-table-stuff' => 'some data'));
echo $this->Table->head(array(false, 'First name', 'Last name'), array('class' => 'bold'), array('id' => 'my-head'));
echo $this->Table->row(array(1, 'Clint', 'Eastwood'));
echo $this->Table->row(array(2, array('Arnold', array('colspan' => 2))));
echo $this->Table->row(array(3, 'David', 'Hasselhoff'), array('data-foo-bar' => 'hide this'));
echo $this->Table->foot(array('Total names', array(3, array('id' => 'total-count'))));
echo $this->Table->end();
```

**Output**

```Html
<table class="table" data-table-stuff="some data">
  <thead id="my-head">
    <tr class="bold">
      <th>First name</th>
      <th>Last name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Clint</td>
      <td>Eastwood</td>
    </tr>
    <tr>
      <td colspan="2">Arnold</td>
    </tr>
    <tr data-foo-bar="hide this">
      <td>David</td>
      <td>Hasselhoff</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td>Total names</td>
      <td id="total-count">1</td>
    </tr>
  </tfoot>
</table>
```

