<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

class TodoController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'message' => 'Hello from Todo API'
        ];
    }
}