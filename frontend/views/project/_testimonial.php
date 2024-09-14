
<?php

use yii\helpers\Html;
use kartik\widgets\StarRating;

/** @var yii\web\View $this */
/** @var common\models\Testimonial $model */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>

<div class="project-view__testimonial">
    <?php
    if ($model->customerImage) {
        echo Html::img(
            $model->customerImage->absoluteUrl(),
            [
                'class' => 'project-view__testimonial-image'
            ]
        );
    }
    ?>
    <?= $model->customer_name ?>

    <?= StarRating::widget([
        'value' => $model->rating,
        'name' => 'rating',
        'pluginOptions' => [
            'theme' => 'krajee-uni',
            'filledStar' => '★',
            'emptyStar' => '☆',
            'displayOnly' => true,
            'size' => 'sm',
        ]
    ]); ?>

    <div class="font-weight-bold">
        <?= $model->title ?>
    </div>

    <div>
        <?= $model->review ?>
    </div>
</div>