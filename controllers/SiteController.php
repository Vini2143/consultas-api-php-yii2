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

            $resposta = ItemList::find()
                ->where('name LIKE "%'. $inputForm['item'] .'%"')
                ->all();
            
            //$requisição = new AlbionApiRequest($inputForm['item'], $inputForm['city'], 30);
            //$resposta = $requisição->executar();
        }
       
        return $this->render('index',[
            'dados' => $resposta,
            'model' => $inputForm
        ]);
    }

    public function actionCriarItemList()
    {
        $json = file_get_contents('../itemsReworked.json');
        $dados = json_decode($json);

        foreach ($dados as $dado) {
            $item = new ItemList;
            $item->name = $dado->Nome;
            $item->item_code = $dado->Código;
            $item->save();

        }

        echo 'fim ;)';
    
        

    }

}
