<?php
namespace projeto1\models;

use yii\db\ActiveRecord;

class ItemList extends ActiveRecord
{
    public static function tableName() {
        return 'item_list';
    }
}