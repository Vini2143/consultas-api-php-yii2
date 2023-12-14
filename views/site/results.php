<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\console\widgets\Table;


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

    <pre>
    <?php ActiveForm::end(); ?>
    </pre>
    

    <div class="body-content">
        <pre>
        <?php
        echo Table::widget([
            'headers' => ['test1', 'test2', 'test3'],
            'rows' => [
                ['col1', 'col2', 'col3'],
                ['col1', 'col2', 'col3'],
            ],
        ]);

        print_r($dados);/* foreach ($dados as $item) { ?>
            <div>
                <?php echo $item['Nome']?>
                <br>
                
                <?php foreach ($item['Registros'] as $registro) { ?>
                    
                    <?php echo $registro['city'] ?>
                    <?php echo $registro['sell_price_min'] ?>
                    <?php echo $registro['sell_price_max'] ?>
                    <br>
                <?php } ?>
            
            </div>
            <br>
        <?php } */ ?>
        </pre>

    </div>
</div>
