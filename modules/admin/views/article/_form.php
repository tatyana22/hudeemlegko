<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">
    
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php //  $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group field-article-category_id has-success">
        <label class="control-label" for="article-category_id">Category ID</label>
        <select id="article-category_id" class="form-control" name="Article[category_id]">
            
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_article', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php

    ?>
    
    <?php
        echo $form->field($model, 'text')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder', [/* Some CKEditor Options */]),
        ]);
    ?>
    
    <?php // $model->text_preview = $article->anons($model->text) ;?>
    <?php 
//        echo $form->field($model, 'text_preview')->widget(CKEditor::className(), [
//            'editorOptions' => ElFinder::ckeditorOptions('elfinder', [/* Some CKEditor Options */]),
//        ]);
    ?>
    
    <?= $form->field($model, 'text_preview')->textInput(['maxlength' => true]) ?>
    
    

    <?= $form->field($model, 'image')->fileInput() ?>
    
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd',]) ?>
    
    <?= $form->field($model, 'view')->textInput() ?>

    <?= $form->field($model, 'comment')->checkbox([ '0', '1', ]) ?>
            
    <?= $form->field($model, 'hide')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
