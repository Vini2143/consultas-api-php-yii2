<?php
namespace projeto1\models;

use yii\base\Model;

class InputForm extends Model
{
    public $item;
    public $city;

    public function rules()
    {
        return [
            [['item', 'city'], 'required']
        ];
    }

    public function atributeLabels()
    {
        return [
            'item' => 'Código do item',
            'city' => 'Cidade'
        ];
    }
}