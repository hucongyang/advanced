<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['home']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <div class="row">

        <div class="col-md-9">

            <div class="post">
                <div class="title">

                    <h2><a href="/post/detail?id=<?= Html::encode($model->id) ?>"><?= Html::encode($model->title);?></a></h2>

                    <div class="author">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <em><?= date('Y-m-d H:i',$model->created_at)."&nbsp;&nbsp;&nbsp;&nbsp;" ; ?></em>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <em><?= Html::encode($model->author_name) ; ?></em>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <em><?= Html::encode($model->post_Users) ; ?></em>
                    </div>
                </div>
                <br>
                <div class="content">

                    <?= HtmlPurifier::process($model->content) ?>
                </div>


                <br>

            </div>

        </div>

    </div>
</div>
