<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Sale Quotes')),
        'content' => $this->render('_dataBlSaleQuoteLine', [
            'model' => $model,
            'row' => $model->blSaleQuoteLines,
        ]),
    ],
    /*  [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'BlSaleQuote')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
      [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Bl Sale Order By Quote')),
        'content' => $this->render('_dataBlSaleOrderByQuote', [
            'model' => $model,
            'row' => $model->blSaleOrderByQuotes,
        ]),
    ],*/
   
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
