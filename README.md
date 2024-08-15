    # ISPager
[![Software License] (https://ru.ru)] (LICENSE.md)

A library to split result into multiple pages

## Install

Via composer

```bash
$ composer require s-kholman/pager
```

## Usage

```php
$obj = new ISPager\DirPager(
new ISPager\PagerList(),
'photos',
3,
2
);

echo '<pre>';
print_r($obj->getItems());
echo '</pre>';
echo "<p>$obj</p>";
```

## License
The MIT License (MIT).