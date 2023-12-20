<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\bootstrap5\ButtonDropdown;


$form = ActiveForm::begin();
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
        <br>

        <?php
        echo ButtonDropdown::widget([
            'label' => 'Botão dropdown yii',
            'buttonOptions' => ['class' => 'btn btn-secondary text-white'],
            'dropdown' => [
                'items' => [
                    ['label' => 'DropdownA', 'url' => '#'],
                    ['label' => 'DropdownB', 'url' => '#'],
                    ['label' => 'DropdownC', 'url' => '#']
                ],
            ],
            
        ]);
        ?>
        
        <br>
        <br>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Botão dropdown bootstrap
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">DropdownA</a>
                <a class="dropdown-item" href="#">DropdownB</a>
                <a class="dropdown-item" href="#">DropdownC</a>
            </div>
        </div>

            

            


    </div>
</div>
