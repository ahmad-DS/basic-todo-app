<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

class TodoController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $todos = [
            [
                'id' => 1,
                'title' => 'Learn Yii2',
                'completed' => false
            ],
            [
                'id' => 2,
                'title' => 'Build Todo App',
                'completed' => false
            ]
        ];

        return $todos;
    }
}