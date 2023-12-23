<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = 'Resultados';


$form = ActiveForm::begin(['id' => 'consulta', 'action' => ['site/upgrade-list'], 'options' => ['data-pjax' => true]]);
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
        <?php echo Html::submitButton('Consulta Completa', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <div class="body-content border rounded p-1 mt-3">
        
        <?php Pjax::begin(['id' => 'dados-pjax', 'formSelector' => '#consulta']) ?>

            <?php foreach ($dados as $item):
                echo $item['name']. '<br>';
            endforeach; ?>

        <?php Pjax::end(); ?>

    </div>
</div>
