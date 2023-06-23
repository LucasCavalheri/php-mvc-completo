<?php

namespace app\models;

use app\models\activerecord\ActiveRecord;

class User extends ActiveRecord
{
    protected $table = 'users';
}
