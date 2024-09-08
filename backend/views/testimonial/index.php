<?php

use common\models\Testimonial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\TestimonialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $projects */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Testimonial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            [
                'attribute' => 'project_id',
                'format' => 'raw',
                'filter' => $projects,
                'value'=> function ($model) {
                    return Html::a($model->project->name, ['project/view', 'id' => $model->project_id]);
                }
            ],
            [
                'attribute'=> 'customer_image_id',
                'format' => 'raw',
                'value'=> function ($model) {
                    if (!$model->customerImage){
                        return null;
                    }

                    return Html::img($model->customerImage->absoluteUrl(),[
                        'alt' => $model->customer_name,
                        'height' => 75,
                    ]);
                }
            ],
            'title',
            'customer_name',
            //'review:ntext',
            'rating',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Testimonial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
