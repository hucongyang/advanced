<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php //$this->beginBlock('test') ?>
<!--    $(document).ready(function() {-->
<!--        $('#mybutton').click(function() {-->
<!--            alert('你好');-->
<!--        });-->
<!--    });-->
<?php //$this->endBlock() ?>
<?php //$this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写以下内容来注册:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'loginMode')->hiddenInput(['value' => 'login_sms_code'])->label(false); ?>

                <?= $form->field($model, 'mobile')->textInput(['placeholder' => $model->getAttributeLabel('手机号码')])->label(false) ?>

                <div class="row">
                    <div class="col-lg-8">
                        <?= $form->field($model, 'code')->textInput(['placeholder' => $model->getAttributeLabel('短信验证码')])->label(false) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= Html::buttonInput(Yii::t('app', '获取验证码'), ['class' => 'btn btn-success ', 'name' => 'signup-button', 'id' => 'second']) ?>
                    </div>
                </div>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('密码长度6到12位字符')])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    <div>
                        <span>已有帐号?<a href="/site/login">请登录</a></span>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
