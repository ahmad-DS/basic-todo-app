<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

use yii\filters\VerbFilter;
use app\models\Todo;

class TodoController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'create' => ['POST'],
                    'update' => ['PUT', 'PATCH'],
                    'delete' => ['DELETE'],
                ],
            ],
        ];
    }
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

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $request = \Yii::$app->request;

        $todo = Todo::findOne($id);

        if (!$todo) {
            \Yii::$app->response->statusCode = 404;

            return [
                'error' => 'Todo not found'
            ];
        }

        $data = $request->bodyParams;

        if (isset($data['title'])) {
            $todo->title = $data['title'];
        }

        if (isset($data['completed'])) {
            $todo->completed = $data['completed'];
        }

        if ($todo->save()) {
            return $todo;
        }

        \Yii::$app->response->statusCode = 422;

        return [
            'errors' => $todo->errors
        ];
    }

    public function actionDelete($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $todo = Todo::findOne($id);

        if (!$todo) {
            \Yii::$app->response->statusCode = 404;

            return [
                'error' => 'Todo not found'
            ];
        }

        if ($todo->delete()) {
            return [
                'message' => 'Todo deleted successfully'
            ];
        }

        \Yii::$app->response->statusCode = 500;

        return [
            'error' => 'Failed to delete todo'
        ];
    }

    public function actionUi()
    {
        return $this->render('index');
    }

    public function actionError()
    {
        return $this->render('error');
    }
}