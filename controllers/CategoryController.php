<?php



namespace app\controllers;

use app\models\Category;
use app\models\Article;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController {
    
    public function actionIndex(){
        $articles = Article::find()->orderBy('id')->limit(4)->where(['hide' => 0])->all();
        $this->setMeta('Худеем-легко', 'похудение, диета, рецпты, спорт, фитнес, для похудения, похудеть, скинуть вес,', 'Все о похудении и здоровом образе жизни, диеты, рецепты советы для вас');        
        return $this->render('index', compact('articles'));
    }
    
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'такой категории нет');
        $query = Article::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        $this->setMeta('Худеем-легко | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('articles', 'pages', 'category'));
    }
    
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if(!$q)
            return $this->render('search');
        $query = Article::find()->where(['like', 'title', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Худеем-легко | ' . $q);
        return $this->render('search', compact('articles', 'pages', 'q'));
    }
        
}
