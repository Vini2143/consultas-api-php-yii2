<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

?>
<div class="site-index">
    <?php $formSearch = ActiveForm::begin(['id' => 'form-pjax', 'action' => ['site/search-item'], 'options' => ['data-pjax' => true]]) ?>
    <?php echo $formSearch->field($searchModel, 'search')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton('Buscar item', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="body-content">
        
        <?php Pjax::begin(['id' => 'dados-pjax', 'formSelector' => '#form-pjax']) ?>

        <?php Pjax::end() ?>
        
        
    </div>
</div>
