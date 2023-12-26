<?php
namespace projeto1\models;

use yii\base\Model;

class ItemNameForm extends Model
{
    public $search;

    public function rules()
    {
        return [
            ['search', 'required']
        ];
    }

    public function atributeLabels()
    {
        return [
            'search' => 'Nome do item',
        ];
    }
}