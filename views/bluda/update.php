<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bluda */

$this->title = 'Update Bluda: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bludas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bluda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
