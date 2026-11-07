<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

/**
 * Peity line chart
 * @link https://benpickles.github.io/peity/#line-charts
 * @author Andrey Borodulin
 */
class PeityLineWidget extends PeityWidget
{
    public $fill = '#c6d9fd';
    public $height = 16;
    public $max = null;
    public $min = 0;
    public $stroke = '#4d89f9';
    public $strokeWidth = 1;
    public $width = 32;

    /**
     * @inheritdoc
     */
    protected function chartType()
    {
        return 'line';
    }

    /**
     * @inheritdoc
     */
    protected function chartOptions()
    {
        return [
            'delimiter' => $this->delimiter,
            'fill' => $this->fill,
            'height' => $this->height,
            'max' => $this->max,
            'min' => $this->min,
            'stroke' => $this->stroke,
            'strokeWidth' => $this->strokeWidth,
            'width' => $this->width,
        ];
    }
}
