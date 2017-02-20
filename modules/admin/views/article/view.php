<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name,                
            ],
            'title',
            'text:html',
            'text_preview:html',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('300x')}'>",
                'format' => 'html',
            ],
            'keywords',
            'description',
            'date',
            'view',
            'comment',
            'hide',
        ],
    ]) ?>

</div>
