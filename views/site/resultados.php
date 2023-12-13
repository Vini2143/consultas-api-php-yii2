<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->params['breadcrumbs'][] = 'Resultados';

$form = ActiveForm::begin();
?>
<div class="site-index">
    <?php echo $form->field($model, 'item')->textInput(); ?>
    <?php echo $form->field($model, 'city')->dropDownList([
            false => 'Todas',
            'Thetford' => 'Thetford',
            'Bridgewatch' => 'Bridgewatch',
            'Lymhurst' => 'Lymhurst',
            'Fort Sterling' => 'Fort Sterling',
            'Martlock' => 'Martlock',
            'Caerleon' => 'Caerleon',
            'Black Market' => 'Black Market'
        ]);
    ?>

    <div class="form-group">
        <?php echo Html::submitButton('Consulta', ['class' => 'btn btn-primary']) ?>
    </div>

    <pre>
    <?php ActiveForm::end();
    foreach ($dados as $dado){
        print_r($dado); 
    }   
    ?>
    </pre>
    

    <div class="body-content">


    </div>
</div>
