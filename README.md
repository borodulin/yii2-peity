# Peity widget for Yii2 framework

[![Latest Version](https://img.shields.io/packagist/v/conquer/peity.svg)](https://packagist.org/packages/conquer/peity)
[![Total Downloads](https://img.shields.io/packagist/dt/conquer/peity.svg)](https://packagist.org/packages/conquer/peity)
[![License](https://img.shields.io/packagist/l/conquer/peity.svg)](LICENSE.md)

## Description

Peity (sounds like deity) is a simple jQuery plugin that converts an element's content into a simple <svg> mini pie  donut  line  or bar chart  and is compatible with any browser that supports <svg>: Chrome, Firefox, IE9+, Opera, Safari.
For more information please visit [Peity](http://benpickles.github.io/peity/) 

## Requirements

- PHP 7.4 or 8.x
- Yii 2.0
- [asset-packagist](https://asset-packagist.org) repository configured in your application's `composer.json` (standard for Yii2 app templates)

## Installation

Install the extension via [Composer](https://getcomposer.org):

```bash
composer require conquer/peity:^1.1
```

## Usage

```php
<?php
use conquer\peity\PeityBarWidget;
use conquer\peity\PeityLineWidget;
use conquer\peity\PeityPieWidget;
use conquer\peity\PeityDonutWidget;
?>

<?= PeityBarWidget::widget(['values'=>[5, 6, 7, 11, 14, 10, 15, 19, 15, 2]]); ?>

<?= PeityLineWidget::widget(['values'=>[5, 6, 7, 11, 14, 10, 15, 19, 15, 2]]); ?>

<?= PeityPieWidget::widget(['values'=>[0.6]]); ?>

<?= PeityDonutWidget::widget(['values'=>[3/7]]); ?>

```

## License

**conquer/peity** is released under the MIT License. See the bundled [`LICENSE.md`](LICENSE.md) for details.
