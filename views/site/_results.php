<?php 
use yii\helpers\Html;

foreach ($dados as $nome => $item): ?>
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
<?php endforeach; ?>