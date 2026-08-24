<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use app\models\Todo;

class TodoController extends Controller
{
    public function actionIndex()
{
    \Yii::$app->response->format = Response::FORMAT_JSON;

    $todo = new Todo();

    $todo->title = 'Learn Yii2';
    $todo->completed = false;

    $todo->save();

    return $todo;
}
}