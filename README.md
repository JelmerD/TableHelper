TableHelper
===========

TableHelper for CakePHP 3.x

Installation
------------

The easiest way to install the plugin is to use Composer.
Install Composer in the app folder of your application and then simply run:

```
php composer.phar require jelmerd/table-helper:dev-master
```

You can also clone the repository in the Plugin folder:

```
$ cd plugins
$ git clone git@github.com:JelmerD/TableHelper.git
```

Once the plugin is in place, load it in your `src/Config/bootstrap.php` by adding this line:

```php
Plugin::load('TableHelper');
```

Now to use the Helper, simply load it in your Controller:

```php
public $helpers = ['TableHelper.Table'];
```

Examples
--------

**Input**

```PHP
echo $this->Table->create();
echo $this->Table->row(['Clint', 'Eastwood']);
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
echo $this->Table->head(['ID', 'First name', 'Last name']);
echo $this->Table->row([1, 'Clint','Eastwood']);
echo $this->Table->foot([null, 'Total names', 1]);
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
echo $this->Table->create(['data-table-stuff' => 'some data']);
echo $this->Table->head([false, 'First name', 'Last name'], ['class' => 'bold'], ['id' => 'my-head']);
echo $this->Table->row([1, 'Clint', 'Eastwood']);
echo $this->Table->row([2, ['Arnold', ['colspan' => 2]]]);
echo $this->Table->row([3, 'David', 'Hasselhoff'], ['data-foo-bar' => 'hide this']);
echo $this->Table->foot(['Total names', [3, ['id' => 'total-count']]]);
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

