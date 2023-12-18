<?php
namespace projeto1\models;

use yii\db\ActiveRecord;

class ItemList extends ActiveRecord
{
    public static function tableName() {
        return 'item_list';
    }

    public static function getItemByName($name) {
        return static::find()
            ->where('name LIKE "%'. $name . '%"')
            ->all();
    }

    public static function getData($name, $city = false)
    {
        $itens = self::getItemByName($name);
        $resultados = [];

        foreach ($itens as $item) {
            
            $requisição = new AlbionApiRequest($item->item_code, $city);
            $retorno = $requisição->executar();
    
            $resultados[$item['name']] = $retorno;

        }

        return $resultados;
    }
}