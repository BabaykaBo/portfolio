<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\widgets\ActiveForm $form */
?>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_stack')->widget(Summernote::class, [
        'useKrajeePresets' => true,
    ]); ?>

    <?= $form->field($model, 'description')->widget(Summernote::class, [
        'useKrajeePresets' => true,
    ]); ?>

    <br>
    <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
        'options' => ['readonly' => true],
    ]) ?>
    <br>
    <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
        'options' => ['readonly' => true],
    ]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>