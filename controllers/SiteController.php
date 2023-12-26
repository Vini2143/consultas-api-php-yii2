<?php

namespace projeto1\controllers;

use yii\web\Controller;
use projeto1\models\ItemSearchForm;
use projeto1\models\ItemDataForm;
use projeto1\models\ItemList;
use Yii;

class SiteController extends Controller
{

    public function actionIndex()
    {   
        $inputForm = new ItemDataForm;
        $inputForm['city'] = 0;
        $inputForm['items'] = [' '];
        
        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {

            $ListaDeItens = ItemList::getItemsByName($inputForm['search']);

            return $this->render('results',[
                'itemList' => $ListaDeItens,
                'model' => $inputForm
            ]);

        }

        return $this->render('index', [
            'model' => $inputForm
        ]);
    
    }

    public function actionUpgradeList()
    {
        $inputForm = new ItemDataForm;

        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {

            $listaDeItens = ItemList::getItemsByName($inputForm['search']);

            $respostas =ItemList::getItemsData($inputForm['items'], $inputForm['city']);

            return $this->renderAjax('_results',[
                'dados' => $respostas,
                'itemList' => $listaDeItens,
                'model' => $inputForm
            ]);

        }

        //return $this->renderAjax('_results');




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
