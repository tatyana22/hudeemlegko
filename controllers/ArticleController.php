<?php



namespace app\controllers;

use app\models\Category;
use app\models\Article;
use Yii;

class ArticleController extends AppController {
        
    public function actionView(){
        $id = Yii::$app->request->get('id');
        
        $article = Article::findOne($id);
        if(empty($article))
            throw new \yii\web\HttpException(404, 'такой статьи нет');
        $this->setMeta('Худеем-легко | ' . $article->title, $article->keywords, $article->description);
        return $this->render('view', compact('article'));
    }
        
}
