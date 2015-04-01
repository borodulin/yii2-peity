<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */
namespace conquer\peity;

use yii\helpers\Html;
use conquer\peity\PeityAsset;

class PeityLineWidget extends \yii\base\Widget
{
	
	public $values;
	
	public $delimiter = ",";
	public $fill = "#c6d9fd";
	public $height = 16;
	public $max = null;
	public $min = 0;
	public $stroke ="#4d89f9";
	public $strokeWidth= 1;
	public $width= 32;
	
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
			'max'=>$this->max,
			'min'=>$this->min,
			'stroke'=>$this->stroke,
			'strokeWidth'=>$this->strokeWidth,
			'width'=>$this->width
		];
		$view->registerJs("jQuery('#$id').peity('line');");
		
		return Html::tag('span',implode(',', $this->values),['data-peity'=>$options, 'id'=>$id, 'style'=>'display:none']);
	}
}