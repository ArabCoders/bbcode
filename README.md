# BBCode Parser.

Parse BBCode.

## Install

Via Composer

```bash
$ composer require arabcoders/bbcode
```

## Usage Example.

```php
<?php

$bbcode = new \arabcoders\bbcode\BBCode();

$bbcode->registerFilters( [
    ( new \arabcoders\bbcode\Filters\Text() )->getFilter(),
    ( new \arabcoders\bbcode\Filters\Table() )->getFilter()
] );

echo $bbcode->parse( 'test [b]bold[/b] string' );
```

you can add the other filters as well, or create your own by regsitering them using one of the following methods.

```php
<?php
$bbcode = new \arabcoders\bbcode\BBCode();

// array with all filters.
$bbcode->registerFilters( [] );

// register single filter.
$bbcode->registerFilter( 'name', 'regex', function(){} );
```
