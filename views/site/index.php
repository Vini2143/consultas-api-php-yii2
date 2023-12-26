<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$form = ActiveForm::begin();
?>
<div class="site-index">
    <?php echo $form->field($model, 'search')->textInput(); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Consulta', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="body-content">
        
    </div>
</div>
