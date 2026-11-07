<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Base class of the Peity chart widgets: renders the values in a `<span>` that Peity replaces with an SVG chart.
 *
 * @link https://benpickles.github.io/peity/
 * @author Andrey Borodulin
 */
abstract class PeityWidget extends Widget
{
    /**
     * Chart values: an array (`[5, 3, 9]`) or a string in the Peity format (`'5,3,9'`, `'3/7'` for a pie).
     * @var array|string|int|float
     */
    public $values;

    /**
     * HTML attributes of the `<span>` tag
     * @var array
     */
    public $options = [];

    /**
     * Separator of the values
     * @var string|null
     */
    public $delimiter = ',';

    /**
     * @return string Peity chart type
     */
    abstract protected function chartType();

    /**
     * @return array Peity options; null values are left to the Peity defaults
     */
    abstract protected function chartOptions();

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        PeityAsset::register($this->getView());
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $chart = $this->chartOptions();
        if (is_array($this->values)) {
            if ($this->delimiter === null || $this->delimiter === '') {
                $chart['delimiter'] = ',';
            }
            $text = implode($chart['delimiter'], $this->values);
        } else {
            $text = (string)$this->values;
        }

        $options = $this->options;
        if (!isset($options['id'])) {
            $options['id'] = $this->getId();
        }
        $options['data-peity'] = array_filter($chart, function ($value) {
            return $value !== null;
        });
        if (!isset($options['style'])) {
            // hidden until Peity replaces the text with the chart
            $options['style'] = 'display:none';
        }

        $this->getView()->registerJs('jQuery(document.getElementById(' . Json::htmlEncode((string)$options['id']) . '))'
            . '.peity(' . Json::htmlEncode($this->chartType()) . ');');

        return Html::tag('span', Html::encode($text), $options);
    }
}
