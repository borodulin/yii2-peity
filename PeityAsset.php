<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

class PeityAsset extends \yii\web\AssetBundle
{
	// The files are not web directory accessible, therefore we need
	// to specify the sourcePath property. Notice the @bower alias used.
	public $sourcePath = '@bower/peity';
	
	public $js = [
		'jquery.peity.min.js',
	];
	
	public $depends = [
		'yii\web\JqueryAsset',
		'conquer\excanvas\ExcanvasAsset',
	];
}