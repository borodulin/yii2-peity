Peity widget for Yii2 framework
=================

## Description

Peity (sounds like deity) is a simple jQuery plugin that converts an element's content into a simple <svg> mini pie  donut  line  or bar chart  and is compatible with any browser that supports <svg>: Chrome, Firefox, IE9+, Opera, Safari.
For more information please visit [Peity](http://benpickles.github.io/peity/) 

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). 

To install, either run

```
$ php composer.phar require conquer/peity "*"
```
or add

```
"conquer/peity": "*"
```

to the ```require``` section of your `composer.json` file.

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

<?= PeityPieWidget::widget(['values'=>0.6]); ?>

<?= PeityDonutWidget::widget(['values'=>3/7]); ?>

```

## License

**conquer/peity** is released under the MIT License. See the bundled `LICENSE.md` for details.