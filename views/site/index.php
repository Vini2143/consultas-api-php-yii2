<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\widgets\Pjax;

Pjax::begin();

$form = ActiveForm::begin(['options' => ['data' => ['pjax' => 1]]]);
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
    <?php ActiveForm::end(); ?>

    <div class="body-content">
        <?php foreach ($dados as $nome => $item) { ?>
            <div class="border rounded d-inline-block p-1 m-1">

                <?php echo Html::button($nome, [
                    'class' => 'btn btn-secondary',
                    'data-toggle' => 'collapse',
                    'data-target' => '#' . str_replace(' ', '', lcfirst($nome)),  
                ]); ?>

                <div class="collapse" id="<?php echo str_replace(' ', '', lcfirst($nome));?>">
                
                <?php foreach ($item as $registro) { ?>
                    <br>
                    
                    <?php echo $registro['city']; ?> -> 
                    <?php echo Html::tag('small', $registro['sell_price_min']); ?>  
                    <?php echo Html::tag('small', $registro['sell_price_max']); ?>
                    
                <?php } ?>
                </div>
            
            </div>
        <?php } ?>
            


    </div>
</div>
<?php Pjax::end(); ?>