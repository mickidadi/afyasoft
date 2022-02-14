<div class="x_content">
<?php

use yii\helpers\Url;
use kartik\tabs\TabsX;
$content="Hello";
    $items = [
        [
            'label'=>'<i class="fas fa-home"></i> Home',
            'content'=>$content,
            'active'=>true
        ],
        [
            'label'=>'<i class="fas fa-user"></i> Profile',
            'content'=>$content,
            'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/clinical/clinical/patient-dashboard'])]
        ],
        [
            'label'=>'<i class="fas fa-list-alt"></i> Menu',
            'items'=>[
                 [
                     'label'=>'<i class="fas fa-ice-cream"></i> Option 1',
                     'encode'=>false,
                     'content'=>$content,
                 ],
                 [
                     'label'=>'<i class="fas fa-pizza-slice"></i> Option 2',
                     'encode'=>false,
                     'content'=>$content,
                 ],
            ],
        ],
        [
            'label'=>'<i class="fas fa-king"></i> Disabled',
            'linkOptions' => ['class'=>'disabled']
        ],
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_LEFT,
        'encodeLabels'=>false
    ]);

?>
 

<div class="clearfix"></div>

</div>
</div>
</div>
