<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $mobile;
    public $code;
    public $password;

    /**
     * 当发送成功时，会保存两个session，login_sms_code和login_sms_time，分别记录了验证码内容和生成时间。
     * 当发送成功后，用户会收到验证码，然后输入后进行提交，此时我们会进行验证码的校验，
     * 这里我们是采用yii2 rules来完成此项任务。在 LoginForm 表的里面的 rules 里面添加下面校验规则，
     * 大家可以看到这里写了关于手机和验证码的诸多验证规则，其实最后一个验证规则即为 验证短信码是否正确，
     * 这里我们通过requiredValue验证用户输入的值是否等于 getSmsCode 的值即可。
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mobile', 'required','on' => ['default','login_sms_code'], 'message' => '手机号码不能为空'],
            ['mobile', 'integer','on' => ['login_sms_code']],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','on' => ['default','login_sms_code'],'message'=>'手机号必须为1开头的11位纯数字'],
            ['mobile', 'string', 'min'=>11,'max' => 11,'on' => ['default','login_sms_code']],

            ['code', 'required','on' => ['default','login_sms_code'], 'message' => '验证码不能为空'],
            ['code', 'integer','on' => ['default','login_sms_code'], 'message' => '验证码必须为整数'],
            ['code', 'string', 'min'=>6,'max' => 6,'on' => ['default','login_sms_code'], 'message' => '验证码为6为整数'],
            ['code', 'required','requiredValue'=>$this->getSmsCode(),'on' => ['default','login_sms_code'],'message'=>'手机验证码输入错误'],

            ['password', 'required', 'message' => '密码不能为空'],
            ['password', 'string', 'min' => 6, 'max' => 12, 'message' => '密码长度6到12位字符'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->mobile = $this->mobile;
            $user->username = 'DC_' . $this->mobile;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    /**
     * 上面的getSmsCode()代码如下，这里通过session获取了验证码和生成时间，如果在10分钟内，
     * 则返回验证码session的值。
     * @return int
     */
    public function getSmsCode()
    {
        //检查session是否打开
        if(!Yii::$app->session->isActive){
            Yii::$app->session->open();
        }
        //取得验证码和短信发送时间session
        $register_sms_code = intval(Yii::$app->session->get('login_sms_code'));
        $register_sms_time = Yii::$app->session->get('login_sms_time');
        if(time()- $register_sms_time < 600){
            return $register_sms_code;
        }else{
            // 生成验证码的函数
            // 存储在表中,并且发送成功后才return
            return 888888;
        }
    }
}
