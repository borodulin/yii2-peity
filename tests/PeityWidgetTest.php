<?php

namespace conquer\peity\tests;

use conquer\peity\PeityBarWidget;
use conquer\peity\PeityDonutWidget;
use conquer\peity\PeityLineWidget;
use conquer\peity\PeityPieWidget;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Application;
use yii\web\View;

class PeityWidgetTest extends TestCase
{
    private $assetPath;

    protected function setUp(): void
    {
        $this->assetPath = sys_get_temp_dir() . '/peity-test-' . uniqid();
        mkdir($this->assetPath);
        new Application([
            'id' => 'test',
            'basePath' => __DIR__,
            'vendorPath' => dirname(__DIR__) . '/vendor',
            'aliases' => ['@bower' => '@vendor/bower-asset', '@npm' => '@vendor/npm-asset'],
            'components' => [
                'request' => ['cookieValidationKey' => 'test', 'scriptFile' => __DIR__ . '/index.php', 'scriptUrl' => '/index.php'],
                'assetManager' => ['basePath' => $this->assetPath, 'baseUrl' => '/assets'],
            ],
        ]);
    }

    protected function tearDown(): void
    {
        FileHelper::removeDirectory($this->assetPath);
        Yii::$app = null;
    }

    private function render($class, array $config)
    {
        $view = new View();
        Yii::$app->set('view', $view);
        $widget = $class::widget($config);
        $html = $view->renderFile(__DIR__ . '/views/page.php');
        return [$widget, $html];
    }

    private function peityData($widget)
    {
        $this->assertSame(1, preg_match("/data-peity='([^']*)'/", $widget, $m));
        return json_decode(html_entity_decode($m[1], ENT_QUOTES), true);
    }

    public function testBar()
    {
        list($widget, $html) = $this->render(PeityBarWidget::class, ['values' => [5, 3, 9]]);
        $this->assertStringContainsString('>5,3,9</span>', $widget);
        $this->assertStringContainsString('id="w0"', $widget);
        $this->assertStringContainsString('style="display:none"', $widget);
        $this->assertSame(
            ['delimiter' => ',', 'fill' => ['#4d89f9'], 'height' => 16, 'min' => 0, 'padding' => 0.1, 'width' => 32],
            $this->peityData($widget)
        );
        $this->assertStringContainsString('jQuery(document.getElementById("w0")).peity("bar");', $html);
        $this->assertMatchesRegularExpression('#src="/assets/\w+/jquery\.peity\.min\.js"#', $html);
        $this->assertStringNotContainsString('excanvas', $html);
    }

    public function testLine()
    {
        list($widget, $html) = $this->render(PeityLineWidget::class, ['values' => [1, 2], 'stroke' => '#f00']);
        $this->assertSame('#f00', $this->peityData($widget)['stroke']);
        $this->assertStringContainsString('.peity("line");', $html);
    }

    public function testDelimiterIsUsedToJoinValues()
    {
        list($widget) = $this->render(PeityLineWidget::class, ['values' => [5, 3, 9], 'delimiter' => ';']);
        $this->assertStringContainsString('>5;3;9</span>', $widget);
        $this->assertSame(';', $this->peityData($widget)['delimiter']);
    }

    public function testPieFraction()
    {
        list($widget, $html) = $this->render(PeityPieWidget::class, ['values' => '3/7']);
        $this->assertStringContainsString('>3/7</span>', $widget);
        // Peity detects "/" itself
        $this->assertArrayNotHasKey('delimiter', $this->peityData($widget));
        $this->assertStringContainsString('.peity("pie");', $html);
    }

    public function testPieArrayUsesComma()
    {
        list($widget) = $this->render(PeityPieWidget::class, ['values' => [-1, 4]]);
        $this->assertStringContainsString('>-1,4</span>', $widget);
        $this->assertSame(',', $this->peityData($widget)['delimiter']);
    }

    public function testDonut()
    {
        list($widget, $html) = $this->render(PeityDonutWidget::class, ['values' => [1, 2], 'innerRadius' => 4]);
        $this->assertSame(4, $this->peityData($widget)['innerRadius']);
        $this->assertStringContainsString('.peity("donut");', $html);
    }

    public function testOptionsAndEncoding()
    {
        list($widget, $html) = $this->render(PeityBarWidget::class, [
            'values' => ['<img src=x onerror=alert(1)>', 2],
            'options' => ['id' => "we'ird.id:x", 'class' => 'spark'],
        ]);
        $this->assertStringNotContainsString('<img', $widget);
        $this->assertStringContainsString('&lt;img src=x onerror=alert(1)&gt;,2', $widget);
        $this->assertStringContainsString('class="spark"', $widget);
        $this->assertStringContainsString('document.getElementById("we\\' . 'u0027ird.id:x")', $html);
    }
}
