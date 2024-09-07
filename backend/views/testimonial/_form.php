<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\FileInput;

use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $projects */
?>

<div class="testimonial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList($projects, ['prompt'=> '']) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'initialPreview' => $model->imageAbsoluteUrl(),
        'initialPreviewAsData' => true,
        'showUpload' => false,
        'deleteUrl' => Url::to('delete-customer-image'),
        'initialPreviewConfig' => $model->imageConfig(),
    ]
]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
