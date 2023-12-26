<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$form = ActiveForm::begin(['id' => 'consulta', 'action' => ['site/upgrade-list'], 'options' => ['data-pjax' => true]]);
?>
<div class="site-index">
    <?php echo $form->field($model, 'search')->textInput() ?>
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
    <?php echo $form->field($model, 'items')->checkboxList($itemList)?>

    <div class="form-group">
        <?php echo Html::submitButton('Consulta', ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="body-content border rounded p-1 mt-3">
        <pre>
        <?php print_r($dados); ?>

    </div>

    <?php ActiveForm::end(); ?>


<?php /* foreach ($dados as $nome => $item): ?>
    <div class="border rounded p-1 m-1">
        <?php echo Html::tag('b', $nome); ?>
        <br>

        <?php foreach ($item as $registro): ?>
            
            <?php echo $registro['city']; ?> -> 
            <?php echo Html::tag('small', $registro['sell_price_min']); ?>
            <?php echo Html::tag('small', $registro['sell_price_max']); ?>
            <br>
            
        <?php endforeach; ?>
    
    </div>
<?php endforeach; */ ?>