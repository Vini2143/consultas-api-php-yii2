<?php

namespace projeto1\controllers;

use yii\web\Controller;
use projeto1\models\AlbionApiRequest;
use projeto1\models\InputForm;
use projeto1\models\ItemList;
use Yii;


class SiteController extends Controller
{

    public function actionIndex()
    {   
        $inputForm = new InputForm;

        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {
            $resposta = [];

            $itens = ItemList::find()
                ->where('name LIKE "%'. $inputForm['item'] .'%"')
                ->all();
            
            
            foreach ($itens as $item) {
                $requisição = new AlbionApiRequest($item->item_code, $inputForm['city'], 30);
                $retorno = $requisição->executar();
        
                array_push($resposta, $retorno);
    
            }

            return $this->render('resultados',[
                'dados' => $resposta,
                'model' => $inputForm
            ]);

        } else {

            return $this->render('index', [
                'model' => $inputForm
            ]);
        }   
            
        
    }


    /* public function actionCriarItemList()
    {   
        set_time_limit(600);

        $json = file_get_contents('../itemsReworked.json');
        $dados = json_decode($json);

        foreach ($dados as $dado) {
            $item = new ItemList;
            $item->name = $dado->Nome;
            $item->item_code = $dado->Código;
            $item->insert();

        }

        set_time_limit(120);
    
        echo 'fim ;)';
    
    } */

}
