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

            $respostas = ItemList::getData($inputForm['item'], $inputForm['city']);

            return $this->render('results',[
                'dados' => $respostas,
                'model' => $inputForm
            ]);

        }

        return $this->render('index', [
            'model' => $inputForm
        ]);
    
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
