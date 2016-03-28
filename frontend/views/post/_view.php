<?php
use yii\helpers\Html;
?>

<div class="post">
    <div class="title">

        <h2><a href="/post/detail?id=<?= Html::encode($model->id) ?>"><?= Html::encode($model->title);?></a></h2>

        <?php //<?= Html::a($model->title, $model->url) ?>

        <div class="author">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <em><?= date('Y-m-d H:i',$model->created_at)."&nbsp;&nbsp;&nbsp;&nbsp;" ; ?></em>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <em><?= Html::encode($model->author_name) ; ?></em>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <em><?= Html::encode($model->post_Users) ; ?></em>
        </div>
    </div>
    <br>
    <div class="content">
        <?= mb_substr(strip_tags($model->content),0,288,'utf-8'); ?>
        <?= mb_strlen(strip_tags($model->content))>288?'......':'';?>
    </div>

    <br>

</div>

<hr>

