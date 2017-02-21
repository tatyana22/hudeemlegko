<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Article;

//$this->title = 'Худеем легко | Главная';
?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Худеем</span>-легко</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"><!--vidget_menu-->
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                    </ul>

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div><!--vidget_menu-->

            <div class="col-sm-9 padding-right">
                <?php if (!empty($articles)): ?>
                    <div class="features_items"><!--features_articles-->
                        <?php /* debug($articles); */ ?>

                        <h2 class="title text-center">Новые статьи</h2>
                        <?php foreach ($articles as $article): ?>
                            <?php
                            $mainImg = $article->getImage();
                            $gallery = $article->getImages();
                            $catImg = $article->category->getImage();
                            ?>
                            <div class="col-sm-6">
                                <div class="articles">
                                    <div class="articles-gen-img">
                                        <a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= Html::img($mainImg->getUrl(), ['alt' => $article->title, 'title' => $article->title]) ?>
                                            <img class="mask" src="/images/article/topic-image-2.png" alt="" title=""></a>
                                    </div>
                                    <div class="articles-head">
                                        <h1><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= $article[title]; ?></a></h1>                                                                
                                    </div>
                                    <div class="content">
                                        <p><?= $article[text_preview]; ?></p>
                                        <p><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>">Читать</a></p>															
                                    </div>
                                    <hr noshade>
                                    <ul class="info">
                                        <li class="avatar">

                                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $article->category->id]); ?>"><?= Html::img($catImg->getUrl(), ['class' => "topic-avatar", 'alt' => $article->title, 'title' => $article->title]); ?></a>
                                        </li>

                                        <li class="blog">
                                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $article->category->id]); ?>"><?= $article->category['name']; ?></a>
                                            <br>
                                            <?php echo $article->date ?>
                                        </li>																
                                    </ul>
                                    <span class="articles-comments"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= $article->view; ?></a></span>

                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div><!--features_articles-->
                <?php endif; ?>
                <?php if (!empty($articlesHit)): ?>
                    <div class="features_items"><!--features_articles-->
                        <?php /* debug($articles); */ ?>
                        <h2 class="title text-center">Популярные статьи</h2>
                        <?php foreach ($articlesHit as $article): ?>
                            <?php
                            $mainImg = $article->getImage();
                            $gallery = $article->getImages();
                            $catImg = $article->category->getImage();
                            ?>
                            <div class="col-sm-6">
                                <div class="articles">
                                    <div class="articles-gen-img">
                                        <a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= Html::img($mainImg->getUrl(), ['alt' => $article->title, 'title' => $article->title]) ?>
                                            <img class="mask" src="/images/article/topic-image-2.png" alt="" title=""></a>
                                    </div>
                                    <div class="articles-head">
                                        <h1><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= $article[title]; ?></a></h1>                                                                
                                    </div>
                                    <div class="content">
                                        <p><?= $article->text_preview; ?></p>
                                        <p><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>">Читать</a></p>															
                                    </div>
                                    <hr noshade>
                                    <ul class="info">
                                        <li class="avatar">
                                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $article->category->id]); ?>"><?= Html::img($catImg->getUrl(), ['class' => "topic-avatar", 'alt' => $article->title, 'title' => $article->title]); ?></a>
                                        </li>
                                        <li class="blog">
                                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $article->category->id]); ?>"><?= $article->category['name']; ?></a>
                                            <br>
                                            <?php echo $article->date ?>
                                        </li>																
                                    </ul>
                                    <span class="articles-comments"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::to(['article/view', 'id' => $article->id]) ?>"><?= $article->view; ?></a></span>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div><!--features_articles-->
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>