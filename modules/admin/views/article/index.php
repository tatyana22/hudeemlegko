<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                },
            ],
            'title',
//            'text:ntext',
            'img',
            // 'keywords',
            // 'description',
            'date',
            'view',
            // 'comment',
            [
                'attribute' => 'comment',
                'value' => function($data){
                    return !$data->comment ? '<span class="text-danger">нет</span>' : '<span class="text-success">да</span>';
                },
                'format' => 'html',
            ],
            // 'hide',
            [
                'attribute' => 'hide',
                'value' => function($data){
                    return $data->hide ? '<span class="text-danger">скрыть</span>' : '<span class="text-success">показать</span>';
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
