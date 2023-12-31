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

            ], '', $item->name);

            $items[$item->item_code] = ['name' => $name, 'tier' => $tier, 'enchant' => $enchant];
        }

        return $items;
    }

    public static function getItemData($item, $city)
    {

        $requisição = new AlbionApiRequest($item, $city);
        $retorno = $requisição->executar();

        return $retorno;
    }
}