<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

/**
 * Peity bar chart
 * @link https://benpickles.github.io/peity/#bar-charts
 * @author Andrey Borodulin
 */
class PeityBarWidget extends PeityWidget
{
    public $fill = ['#4d89f9'];
    public $height = 16;
    public $max = null;
    public $min = 0;
    public $padding = 0.1;
    public $width = 32;

    /**
     * @inheritdoc
     */
    protected function chartType()
    {
        return 'bar';
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
            'padding' => $this->padding,
            'width' => $this->width,
        ];
    }
}
