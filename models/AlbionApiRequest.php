<?php
namespace projeto1\models;

use yii\base\Model;
use yii\httpclient\Client;

class AlbionApiRequest extends Model
{   
    public $itemCode;
    public $city;
    public $url;

    public function rules()
    {
        return [
            [['itemCode', 'city'], 'required']
        ];
    }

    public function executar()
    {
        $client = new Client;
        $retorno = [];

        $url = $this->city ? 'https://west.albion-online-data.com/api/v2/stats/Prices/'. $this->itemCode .'.json?locations=' . str_replace(' ', '%20', $this->city) : 
        'https://west.albion-online-data.com/api/v2/stats/Prices/'. $this->itemCode .'.json';
        
        $resposta = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($url)
            ->send();

        foreach($resposta->data as $registro) {
            $dados = [
                'cidade' => $registro['city'],
                'qualidade' => $registro['quality'],
                'val_min' => $registro['sell_price_min'],
                'val_max' => $registro['sell_price_max'],
                
            ];
            
            array_push($retorno, $dados);
        }

        return $retorno;
    }

}
