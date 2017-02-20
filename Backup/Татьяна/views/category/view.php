<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>


<section id="advertisement">
		<div class="container">
			<img src="/images/shop/baner1.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории</h2>
						<ul class="catalog category-products">
                                                    <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                                                </ul>
					
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_articles-->
						<h2 class="title text-center"><?= $category->name ; ?></h2>
                                                <?php if(!empty($articles)): ?>
                                                <?php foreach($articles as $article):?>
						<div class="col-sm-12">
                                                    <div class="articles">
                                                        
                                                            <div class="articles-gen-img">
                                                                        <a href="<?= \yii\helpers\Url::to(['article/view', 'id' =>$article->id])?>"><?= Html::img("@web/images/article/{$article->img}", ['alt' => $article->title, 'title' => $article->title])?></a>
                                                            </div>
                                                        
                                                           
                                                            <div class="articles-head">
                                                                <span class="articles-date"><?= Html::img("@web/images/article/articles-autor.jpg", ['alt' => 'Admin'])?> <span>Admin</span> - <?= $article->date;?></span>
                                                                <span class="articles-comments"><?= Html::img("@web/images/article/articles-comment.jpg", ['alt' => 'Comment'])?> <a href="#">10 Comments</a></span>
                                                            </div>
                                                            <h1><a href="<?= \yii\helpers\Url::to(['article/view', 'id' =>$article->id])?>"><?= $article->title;?></a></h1>
                                                            <p><?= $article->text;?></p>
                                                            <p><a href="#">Read More</a></p>
                                                        
                                                    </div>
						</div>
                                                <?php endforeach; ?>
                                                <?php echo LinkPager::widget([
                                                    'pagination' => $pages,
                                                 ]);?>
                                                <?php else:?>
                                                <h1>статьи данной категории на редактировании</h1>
                                                <?php endif;?>
						
					</div><!--features_articles-->
				</div>
			</div>
		</div>
	</section>