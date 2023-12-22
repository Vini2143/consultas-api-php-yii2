<?php
namespace projeto1\models;

use yii\db\ActiveRecord;

class ItemList extends ActiveRecord
{
    public static function tableName() {
        return 'item_list';
    }

    public static function getItemsInfo($name) {
        return static::find()
            ->where('name LIKE "%'. $name .'%"')
            ->all();
    }

    public static function getItemsByName($name) {
        $itemsInfo = self::getItemsInfo($name);
        $items = [];

        foreach ($itemsInfo as $item) {
            $tier = substr($item->item_code, 0, 2);
            $enchant = is_numeric(substr($item->item_code, -1)) ? substr($item->item_code, -1) : '0';
            $name = str_replace([
                'do Iniciante',
                'do Adepto',
                'do Perito',
                'do Mestre',
                'do Grão-mestre',
                'do Ancião'

            ], $tier .'.'. $enchant, $item->name);

            array_push($items, ['name' => $name, 'item_code' => $item->item_code]);
        }

        return $items;
    }

    public static function getData($name, $city = false)
    {
        $itens = self::getItemsByName($name);
        $resultados = [];

        foreach ($itens as $item) {
            
            $requisição = new AlbionApiRequest($item->item_code, $city);
            $retorno = $requisição->executar();
    
            $resultados[$item['name']] = $retorno;

        }

        return $resultados;
    }
}