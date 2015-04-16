GenderHelper
============

[![Build Status](https://travis-ci.org/haltuf/gender-helper.svg?branch=master)](https://travis-ci.org/haltuf/genderer)[![Coverage Status](https://coveralls.io/repos/haltuf/gender-helper/badge.svg)](https://coveralls.io/r/haltuf/gender-helper)

Latte filter to detect

Requirements
------------
- PHP 5.3.1 or higher
- [Nette Framework](https://www.github.com/nette/nette), version 2.3 or higher
- [Genderer](https://www.github.com/haltuf/genderer)

Installation
------------

Easiest way to install is to add this line to your `composer.json` file:
```
	"require": {
		"haltuf/gender-helper": "dev-master"
	}
```

or 

```
composer require haltuf/gender-helper:@dev
```

Then register the extension in your `config.neon` file:

```
extensions:
	genderHelper: Haltuf\GenderHelper\DI\Extension
```

Usage
-----

You can use 2 new filters in your Latte templates:

```
{var $name = 'Tomáš Vomáčka'}
{$name|salute} Tomáši Vomáčko
{$name|gender} m
{$name|gender:'muž':'žena'} muž
```

Configuration
-------------

Optionally, you can change the name of the filters in the config.neon file:

```
genderHelper:
	salutationFilter: 'oslov'
	genderFilter: 'pohlavi'
```