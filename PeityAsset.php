<?php
/**
 * @link https://github.com/borodulin/yii2-peity
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-peity/blob/master/LICENSE.md
 */

namespace conquer\peity;

use yii\web\AssetBundle;

/**
 * Peity jQuery plugin (SVG charts)
 * @link https://github.com/benpickles/peity
 * @author Andrey Borodulin
 */
class PeityAsset extends AssetBundle
{
    public $sourcePath = '@bower/peity';

    public $js = [
        'jquery.peity.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
