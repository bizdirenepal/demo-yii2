<?php

namespace app\controllers;

use Yii;

class AjaxController extends \yii\web\Controller
{
    public function actionClearCache()
    {
        Yii::$app->cache->flush();
        if (Yii::$app->request->isAjax) {
            return $this->asJson(['status' => true, 'code' => 200, 'message' => 'Cache cleared successfully.']);
        } else {
            return $this->goBack();
        }
    }
}
