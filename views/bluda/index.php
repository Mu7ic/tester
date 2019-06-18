<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bludas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bluda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bluda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'datecreate',
            'lastupdate',
            [
                'attribute' => 'ingredient',
                'format' => 'raw',
                'value' => function ($model) {
                    $str="";
                    foreach ($model->tableBluds as $ingred){
                        $str.="<a href='".\yii\helpers\Url::to(['ingredient/view','id'=>$ingred->dishes->id])."'>".$ingred->dishes->ingredient.'</a> ';
                    }
                    return $str;
                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status){
                        case 0:
                            return '<span class="badge badge-">Невиден</span>';
                        case 1:
                            return '<span class="badge badge-secondary">Виден</span>';
                            break;
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
