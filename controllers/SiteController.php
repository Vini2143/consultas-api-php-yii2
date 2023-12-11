<?php

namespace projeto1\controllers;

use yii\web\Controller;
use projeto1\models\AlbionApiRequest;
use projeto1\models\InputForm;
use Yii;


class SiteController extends Controller
{

    public function actionIndex()
    {   
        $inputForm = new InputForm;
        if ($inputForm->load(Yii::$app->request->post()) && $inputForm->validate()) {
            
            $requisição = new AlbionApiRequest($inputForm['item'], $inputForm['city'], 30);
            $resposta = $requisição->executar();
        }
       
        return $this->render('index',[
            'dados' => $resposta,
            'model' => $inputForm
        ]);
    }

}
