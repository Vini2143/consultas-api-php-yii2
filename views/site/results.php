<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = 'Resultados';

Pjax::begin(['id' => 'dados-pjax', 'formSelector' => '#consulta']);

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
        
        Nada

    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>


    
</div>
