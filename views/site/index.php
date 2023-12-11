<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$form = ActiveForm::begin();
?>
<div class="site-index">
    <?php echo $form->field($model, 'item')->textInput() ?>
    <?php echo $form->field($model, 'city')->textInput() ?>
    <div class="form-group">
        <?php echo Html::submitButton('Consulta', ['class' => 'btn btn-primary']) ?>
    </div>
    <pre>

    <?php ActiveForm::end();
    foreach ($dados as $dado){
        echo $dado['city'] . ' ' . $dado['sell_price_max'] . ' ' . $dado['buy_price_max'] . '<br>';
    }    
    ?>
    </pre>
    

    

    <div class="body-content">


    </div>
</div>
