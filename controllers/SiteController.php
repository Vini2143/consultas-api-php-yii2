<?php

namespace projeto1\controllers;

use yii\web\Controller;
use projeto1\models\InputForm;
use projeto1\models\ItemList;
use Yii;

class SiteController extends Controller
{

    public function actionIndex()
    {   
        $inputForm = new InputForm;

        $inputForm->city = 0;
        
        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {

            $respostas = ItemList::getItemsByName($inputForm['item']);

            return $this->render('results',[
                'dados' => $respostas,
                'model' => $inputForm
            ]);

        }

        return $this->render('index', [
            'model' => $inputForm
        ]);
    
    }

    public function actionUpgradeList()
    {
        $inputForm = new InputForm;

        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {

            $respostas = ItemList::getItemsData($inputForm['item'], $inputForm['city']);

            return $this->renderAjax('_results',[
                'dados' => $respostas,
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
