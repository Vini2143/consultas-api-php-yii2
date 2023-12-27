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
        $searchForm = new ItemSearchForm;

        return $this->render('index', [
            'searchModel' => $searchForm
        ]);
    
    }


    public function actionSearchItem()
    {   
        $searchForm = new ItemSearchForm;

        if ($searchForm->load(Yii::$app->request->post()) && $searchForm->validate()) {

            $itemList = ItemList::getItemsByName($searchForm['search']);

            return $this->renderAjax('_index',[
                'itemList' => $itemList,
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
