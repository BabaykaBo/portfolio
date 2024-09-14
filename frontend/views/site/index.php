<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = Yii::$app->name . ' - My Portfolio';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <?= Html::img('@web/images/photo.png', [
                'alt' => Yii::t('app','My profile photo'),
                'class' => 'site-index__photo',
            ]) ?>
            <h1 class="display-4"><?= Yii::t('app', 'My name is Oleh.') ?></h1>
            <p class="fs-5 fw-light"><?= Yii::t('app', 'Go for Web Development.') ?></p>
            <p><?= Html::a(Yii::t('app', 'See My Works'), '@web/project/index', $options = [
                'class'=> 'btn btn-primary'
            ]) ?></p>
        </div>
    </div>
</div>
