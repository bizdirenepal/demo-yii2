<?php

namespace app\controllers;

use Yii;
use app\models\forms\ContactForm;
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
                // 'etagSeed' => function ($action, $params) {
                //     return serialize([Yii::$app->session->getId()]);
                // },
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
        $response = $bservice->findOne(Yii::$app->id, ['expand' => 'items']);
        $model = $response['data'];
        $items = $response['data']['items'] ?? [];


        $contact = new ContactForm();
        if ($contact->load(Yii::$app->request->post()) && $contact->validate()) {
            if ($contact->saveContact()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }
            return $this->refresh();
        }

        $this->view->params['model'] = $model;
        return $this->render('index', [
            'model' => $model,
            'items' => $items,
            'contact' => $contact,
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
        $response = $service->findOne(Yii::$app->id);
        $model = $response['data'];

        $this->view->params['model'] = $model;
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
        $response = $service->findOne(Yii::$app->id);
        $model = $response['data'];

        $contact = new ContactForm();
        if ($contact->load(Yii::$app->request->post()) && $contact->validate()) {
            if ($contact->saveContact()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }
            return $this->refresh();
        }

        $this->view->params['model'] = $model;
        return $this->render('contact', [
            'model' => $model,
            'contact' => $contact,
        ]);
    }

    public function actionReviews()
    {
        $service = new BusinessService();
        $response = $service->findOne(Yii::$app->id, ['expand' => 'reviews']);
        $model = $response['data'];
        $items = $response['data']['reviews'] ?? [];

        $this->view->params['model'] = $model;
        return $this->render('reviews', [
            'model' => $model,
            'items' => $items,
        ]);
    }
}
