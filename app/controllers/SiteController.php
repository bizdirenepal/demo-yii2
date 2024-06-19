<?php

namespace app\controllers;

use Yii;
use app\services\BusinessService;
use app\services\ProductService;
use app\services\ReviewService;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $model = $bservice->findOne(getenv('API_BID'));

        $pservice = new ProductService();
        $items = $pservice->findAll(['business_id' => getenv('API_BID')]);

        return $this->render('index', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $service = new BusinessService();
        $model = $service->findOne(getenv('API_BID'));

        return $this->render('about', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $service = new BusinessService();
        $model = $service->findOne(getenv('API_BID'));
        if (Yii::$app->request->post('Contact')) {
            $response = $service->saveContact(Yii::$app->request->post('Contact'));
            if ($response->status) {
                return $this->redirect('contact')->with('success', 'Message has been sent successfully');
            }
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionReviews()
    {
        $service = new BusinessService();
        $model = $service->findOne(getenv('API_BID'));

        $rservice = new ReviewService();
        $items = $rservice->findAll(['business_id' => getenv('API_BID')]);

        return $this->render('reviews', [
            'model' => $model,
            'items' => $items,
        ]);
    }
}
