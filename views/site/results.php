<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\grid\GridView;


$this->params['breadcrumbs'][] = 'Resultados';

$form = ActiveForm::begin();
?>
<div class="site-index">
    <?php echo $form->field($model, 'item')->textInput() ?>
    <?php echo $form->field($model, 'city')->dropDownList([
            false => 'Todas',
            'Thetford' => 'Thetford',
            'Bridgewatch' => 'Bridgewatch',
            'Lymhurst' => 'Lymhurst',
            'Fort Sterling' => 'Fort Sterling',
            'Martlock' => 'Martlock',
            'Caerleon' => 'Caerleon',
            'Black Market' => 'Black Market'
        ])
    ?>

    <div class="form-group">
        <?php echo Html::submitButton('Consulta', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <div class="body-content">
        
        <?php
        //print_r($dados);
        foreach ($dados as $nome => $item) { ?>
            <div>
                <b><?php echo $nome?></b><br>
                
                <?php foreach ($item as $registro) { ?>
                    
                    <?php echo $registro['city'] ?> ->
                    <small><?php echo $registro['sell_price_min'] ?></small> -
                    <small><?php echo $registro['sell_price_max'] ?></small>
                    <br>
                <?php } ?>
            
            </div>
            <br>
        <?php } ?>
        

    </div>
</div>
