<?php
use yii\helpers\Html;
use yii\helpers\Url;
/** @var $model \common\models\Project */
?>

<a href="<?= Url::to(['project/view', 'id' => $model->id]) ?>" class="project__link">

    <?php
    $images = $model->imageAbsoluteUrls();
    if (count($images) > 0) {
        echo Html::img($images[0], ['alt' => Yii::t('app', 'image'), 'class' => 'project__image']);
    }
    ?>

    <div class="project__title">
        <?= $model->name; ?>
    </div>
</a>