# Peity widget for Yii2 framework

[![Latest Version](https://img.shields.io/packagist/v/conquer/peity.svg)](https://packagist.org/packages/conquer/peity)
[![Total Downloads](https://img.shields.io/packagist/dt/conquer/peity.svg)](https://packagist.org/packages/conquer/peity)
[![CI](https://github.com/borodulin/yii2-peity/actions/workflows/ci.yml/badge.svg)](https://github.com/borodulin/yii2-peity/actions/workflows/ci.yml)
[![License](https://img.shields.io/packagist/l/conquer/peity.svg)](LICENSE.md)

## Description

Peity (sounds like deity) is a jQuery plugin that converts an element's content into a mini `<svg>` pie, donut, line or bar chart.
For more information please visit [Peity](https://benpickles.github.io/peity/).

## Requirements

- PHP 7.4 or 8.x
- Yii 2.0
- [asset-packagist](https://asset-packagist.org) repository configured in your application's `composer.json` (standard for Yii2 app templates)

## Installation

Install the extension via [Composer](https://getcomposer.org):

```bash
composer require conquer/peity:^1.2
```

## Usage

```php
<?php
use conquer\peity\PeityBarWidget;
use conquer\peity\PeityLineWidget;
use conquer\peity\PeityPieWidget;
use conquer\peity\PeityDonutWidget;
?>

<?= PeityLineWidget::widget(['values' => [5, 6, 7, 11, 14, 10, 15, 19, 15, 2]]) ?>

<?= PeityBarWidget::widget([
    'values' => [5, 6, 7, 11, 14, 10, 15, 19, 15, 2],
    'fill' => ['#1abc9c'],
    'height' => 24,
    'width' => 64,
]) ?>

<!-- 3 of 7 -->
<?= PeityPieWidget::widget(['values' => '3/7']) ?>

<!-- slices 1, 2 and 4 -->
<?= PeityDonutWidget::widget(['values' => [1, 2, 4]]) ?>
```

- `values` is an array or a string in the Peity format: `'5,3,9'`, or `'3/7'` for a pie or donut fraction.
  A single number is a whole pie, so pass `'3/7'` or `[3, 4]` rather than `3/7`.
- The chart options (`fill`, `height`, `width`, `min`, `max`, `stroke`, `radius`, `innerRadius`, ...)
  are widget properties, see the [Peity documentation](https://benpickles.github.io/peity/).
- `delimiter` separates the values (`,` by default; for pie and donut it is detected from the values).
- `options` are the HTML attributes of the `<span>` element, e.g. `['class' => 'sparkline']`.

## Upgrading to 1.2

- `conquer/excanvas` is no longer a dependency: Peity draws SVG only, which ExplorerCanvas (a canvas polyfill
  for IE 8) does not provide. If you register `conquer\excanvas\ExcanvasAsset` yourself, require `conquer/excanvas`.
- Values are HTML-encoded.

## License

**conquer/peity** is released under the MIT License. See the bundled [`LICENSE.md`](LICENSE.md) for details.
