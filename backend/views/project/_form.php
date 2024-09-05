<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\editors\Summernote;

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

<?php foreach ($model->projectImages as $image): ?>
    <div class="project-form__image-container" id="project-form__image-container-<?= $image->id ?>">
        <?= Html::img(
            $image->file->absoluteUrl(),
            [
                'alt' => 'Image',
                'height' => '100px',
                'class' => 'project-form__image',
            ]
        ); ?>

        <?= Html::button(Yii::t('app', 'Delete'), ['
            class' => 'btn btn-danger btn-delete-image',
            'data-project-image-id' => $image->id,
        ]) ?>

        <div id="project-form__image-error-message-<?= $image->id ?>" class="text-danger"></div>
    </div>
    
<?php endforeach; ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>