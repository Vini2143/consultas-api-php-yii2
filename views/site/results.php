<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\widgets\Pjax;

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
    
    <div class="body-content border rounded p-1 mt-3">

        <?php Pjax::begin([
            'id' => 'idpjax1'
        ] 
        ); ?>
        
        <?php Pjax::end(); ?>


        <?php foreach ($dados as $item) {
            echo $item['name']. '<br>';
        }
        
        /* foreach ($dados as $nome => $item) { ?>
            <div class="border rounded p-1 m-1">
                <?php echo Html::tag('b', $nome); ?>

                <?php echo Html::button('Mostrar', [
                    'class' => 'btn btn-success',
                    'data-toggle' => 'collapse',
                    'data-target' => '#' . str_replace(' ', '', lcfirst($nome)),  
                ]); ?>


                <br>
                <div class="collapse" id="<?php echo str_replace(' ', '', lcfirst($nome));?>">
                
                <?php foreach ($item as $registro) { ?>
                    
                    <?php echo $registro['city']; ?> -> 
                    <?php echo Html::tag('small', $registro['sell_price_min']); ?>  
                    <?php echo Html::tag('small', $registro['sell_price_max']); ?>
                    <br>
                    
                <?php } ?>
                </div>
            
            </div>
        <?php } */ ?>

        <?php
        //print_r($dados);
        /* foreach ($dados as $nome => $item) { ?>
            <div>
                <b><?php echo $nome?></b>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#<?php echo str_replace(' ', '', lcfirst($nome)); ?>">Mostrar</button>
                <br>
                <div class="collapse" id="<?php echo str_replace(' ', '', lcfirst($nome));?>">
                
                <?php foreach ($item as $registro) { ?>
                    
                    <?php echo $registro['city'] ?> -> 
                    <small><?php echo $registro['sell_price_min'] ?></small> -
                    <small><?php echo $registro['sell_price_max'] ?></small>
                    <br>
                <?php } ?>
                </div>
            
            </div>
            <br>
        <?php } */ ?>
        

    </div>
</div>
