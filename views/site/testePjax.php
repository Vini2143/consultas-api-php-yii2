<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\widgets\Pjax;

$form = ActiveForm::begin(['action' => ['site/teste-pjax'], 'options' => ['data' => ['pjax' => 1]]]);
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
        <?php Pjax::begin(); ?>


        <pre>
        <?php print_r($dados); ?>
        </pre>
        
        <?php Pjax::end(); ?>

    </div>

    

</div>

