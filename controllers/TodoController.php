<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use app\models\Todo;

class TodoController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return Todo::find()->all();
    }


   public function actionCreate()
{
    \Yii::$app->response->format = Response::FORMAT_JSON;

    $request = \Yii::$app->request;

    $todo = new Todo();

    $todo->title = $request->post('title');
    $todo->completed = false;

    if ($todo->save()) {
        return $todo;
    }

    return [
        'errors' => $todo->errors
    ];
}
}