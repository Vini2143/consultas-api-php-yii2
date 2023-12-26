<?php
namespace projeto1\models;

use yii\base\Model;

class ItemDataForm extends Model
{   
    public $search;
    public $city = 0;
    public $items;

    public function rules()
    {
        return [
            [['search', 'city', 'items'], 'required']
        ];
    }

    public function atributeLabels()
    {
        return [
            'search' => 'Nome do item',
            'city' => 'Cidade',
            'items' => 'Lista de itens'
        ];
    }
}
