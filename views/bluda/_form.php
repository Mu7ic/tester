<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bluda */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="<?= Yii::$app->request->baseUrl; ?>/js/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl; ?>/select2/select2.min.css">
<script src="<?= Yii::$app->request->baseUrl; ?>/select2/select2.min.js"></script>
<div class="bluda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingredient')->dropdownlist($model->getStyleList(),['multiple'=>'multiple','class'=>'select2 form-control-lg form-control',"data-placeholder"=>"Choose the style from below"]) ?>

    <?php echo $model->isNewRecord ?  "" : $form->field($model, 'status')->dropDownList([0=>'Деактив',1=>'Актив']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
