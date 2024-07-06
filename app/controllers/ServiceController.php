<?php

namespace app\controllers;

use Yii;
use app\services\BusinessService;
use app\services\ProductService;

class ServiceController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
            ],
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['view'],
                'duration' => 60,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'home';

        $bservice = new BusinessService();
        $response = $bservice->findOne(Yii::$app->id);
        $model = $response['data'];

        $pservice = new ProductService();
        $response = $pservice->findAll(['business_id' => Yii::$app->id]);
        $items = $response['data'];

        $this->view->params['model'] = $model;
        return $this->render('index', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    /**
     * View action.
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionView($id)
    {
        $pservice = new ProductService();
        $response = $pservice->findOne($id, ['expand' => 'business,business.reviews']);
        $product = $response['data'];
        $model = $response['data']['business'] ?? [];
        $reviews = $response['data']['business']['reviews'] ?? [];

        $this->view->params['model'] = $model;
        return $this->render('view', [
            'model' => $model,
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}
