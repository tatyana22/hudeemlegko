<?php

namespace app\modules\admin\models;

use Yii;

class Article extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName()
    {
        return 'article';
    }
    
    public function getCategory(){
        
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'date', 'view'], 'required'],
            [['category_id', 'view', 'comment', 'hide'], 'integer'],
            [['text'], 'string'],
            [['text_preview'], 'string'],
            [['date'], 'safe'],
            [['title', 'img', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'text_preview' => 'Анонс новости',
            'image' => 'Фото',
            'gallery' => 'Галерея',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'date' => 'Дата',
            'view' => 'Просмотры',
            'comment' => 'Вкл. комменты',
            'hide' => 'Скрыть',
        ];
    }
    
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
    
    public function uploadGallery(){
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            
            return true;
        }else{
            return false;
        }
    }
    
    public function anons($string, $limit=150)
    {
        $string = strip_tags($string);
        
        if (strlen($string) >= $limit )
        {
            $substring_limited = substr($string,0, $limit);
            return substr($substring_limited, 0, strrpos($substring_limited, ' ' )).' ...';
        }
        else
        {
            //Если количество символов строки меньше чем задано,
            //то просто возвращаем оригинал
            return $string;
        }
    }
}
