<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */
namespace conquer\peity;

use yii\helpers\Html;
use conquer\peity\PeityAsset;
/**
 * @link http://benpickles.github.io/peity/#donut-charts 
 */
class PeityDonutWidget extends \yii\base\Widget
{
	
	public $values;
	
	public $delimiter = null;
	public $fill = ["#ff9900", "#fff4dd", "#ffd592"];
	public $height = null;
	public $innerRadius = null;
	public $radius = 8;
	public $width = null;
	
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
		PeityAsset::register($this->view);
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$view = $this->getView();
		$id = $this->getId();
		$options = [
			'delimiter'=>$this->delimiter,
			'fill'=>$this->fill,
			'height'=>$this->height,
			'innerRadius'=>$this->innerRadius,
			'radius'=> $this->radius,
			'width'=>$this->width,
		];
		$view->registerJs("jQuery('#$id').peity('donut');");
		
		return Html::tag('span',implode(',', $this->values),['data-peity'=>$options, 'id'=>$id, 'style'=>'display:none']);
	}
}