# Diactoros

Unicode Character Replacer

## Installing

```
$ composer require bhrdn/diactoros
```

### Getting started

```php
$app = new \Diactoros\Diactoros;
$app->addReplacer(["Z" => "\u{0410}"]); // change Z with unicode char A
$app->addText(implode('', range("A", "Z")));
print_r($app->encode()); // A...A
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details
