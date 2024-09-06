<?php

use yii\helpers\Html;
use yii\helpers\Url;

use kartik\form\ActiveForm;
use kartik\editors\Summernote;
use kartik\widgets\FileInput;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile(
    "@web/js/projectForm.js", 
    ["depends"=> [\yii\web\JqueryAsset::class]]
);
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

<?= $form->field($model, 'imageFiles[]')->widget(FileInput::class, [
    'options' => ['accept' => 'image/*', 'multiple' => true],
    'pluginOptions' => [
        'initialPreview' => $model->imageAbsoluteUrls(),
        'initialPreviewAsData' => true,
        'showUpload' => false,
        'deleteUrl' => Url::to('delete-project-image'),
        'initialPreviewConfig' => $model->imageConfigs(),
    ]
]); ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>