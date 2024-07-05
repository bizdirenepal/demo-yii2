<?php

namespace app\controllers;

use Yii;
use app\services\BusinessService;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index', 'about'],
                'etagSeed' => function ($action, $params) {
                    return serialize([Yii::$app->session->getId()]);
                },
            ],
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['error'],
                'duration' => 3600,
            ],
        ];
    }

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
        $model = $bservice->findOne(Yii::$app->id, ['expand' => 'items']);
        $items = $model['data']['items'] ?? [];

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
        $model = $service->findOne(Yii::$app->id);

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
        $model = $service->findOne(Yii::$app->id);
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
        $model = $service->findOne(Yii::$app->id, ['expand' => 'reviews']);
        $items = $model['data']['reviews'] ?? [];

        return $this->render('reviews', [
            'model' => $model,
            'items' => $items,
        ]);
    }
}
