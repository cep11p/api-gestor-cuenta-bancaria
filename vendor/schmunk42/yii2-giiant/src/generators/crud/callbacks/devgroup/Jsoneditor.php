<?php
/**
 * Created by PhpStorm.
 * User: tobias
 * Date: 09.06.15
 * Time: 22:40.
 */
namespace schmunk42\giiant\generators\crud\callbacks\devgroup;

use dmstr\modules\widgets\helpers\StringFormatter;
use yii\bootstrap\Collapse;

class Jsoneditor
{
    public static function field()
    {
        return function ($attribute) {
            $collapse = Collapse::className();
            $editor = \devgroup\jsoneditor\Jsoneditor::className();

            return <<<FORMAT
'<div class="field-widget-{$attribute}">'.
{$editor}::widget(
    [
        'editorOptions' => [
            'modes' => ['code', 'form', 'text', 'tree', 'view'], // available modes
            'mode'  => 'tree', // current mode
        ],
        'model'         => \$model,
        'attribute'     => '{$attribute}',
        'options'       => [
            'id'    => 'widget-{$attribute}',
            'class' => 'form-control',
        ],
    ]
).
'</div>'
FORMAT;
        };
    }

    public static function attribute()
    {
        return function ($attribute, $generator) {
            $formattter = StringFormatter::className();
            $method = __METHOD__;

            return <<<FORMAT
// generated by {$method}
[
    'format' => 'html',
    'attribute' => '{$attribute}',
    'value'=> {$formattter}::contentJsonToHtml(\$model->{$attribute})

]
FORMAT;
        };
    }
}
