<?php

namespace app\models;

use yii\db\ActiveRecord;

class Todo extends ActiveRecord
{
    public static function tableName()
    {
        return 'todos';
    }
}