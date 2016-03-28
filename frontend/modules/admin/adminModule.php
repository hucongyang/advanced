<?php

namespace frontend\modules\admin;

use Yii;
use yii\base\Module;

class adminModule extends Module
{
    public $controllerNamespace = 'frontend\modules\admin\controllers';

    public $defaultRoute = 'manager/login';

    public $layout = 'main.php';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
