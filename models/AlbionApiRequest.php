<?php
namespace projeto1\models;

use yii\base\Model;
use yii\httpclient\Client;

class AlbionApiRequest extends Model
{   
    public $item;
    public $city;
    public $interval;
    public $url;

    public function __construct($item, $city = false, $interval = 60)
    {   
        $this->item = $item;
        $this->city = $city;
        $this->interval = $interval;
        $this->url = $city ? 'https://west.albion-online-data.com/api/v2/stats/Prices/'. $item .'.json?locations=' . str_replace('%20', ' ', $city) : 
        'https://west.albion-online-data.com/api/v2/stats/Prices/'. $item .'.json';

    }

    public function executar()
    {
        $client = new Client;

        $resposta = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->url)
            ->send();

        return $resposta->data;

        

    }

}
