<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

/**
 * Peity donut chart
 * @link https://benpickles.github.io/peity/#donut-charts
 * @author Andrey Borodulin
 */
class PeityDonutWidget extends PeityWidget
{
    /**
     * @var string|null null: detected by Peity from the values (`'3/7'` is a fraction)
     */
    public $delimiter = null;
    public $fill = ['#ff9900', '#fff4dd', '#ffd592'];
    public $height = null;
    public $innerRadius = null;
    public $radius = 8;
    public $width = null;

    /**
     * @inheritdoc
     */
    protected function chartType()
    {
        return 'donut';
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
            'innerRadius' => $this->innerRadius,
            'radius' => $this->radius,
            'width' => $this->width,
        ];
    }
}
