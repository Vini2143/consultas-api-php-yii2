<?php foreach ($dados as $registro) :?>
    <?php echo $registro['cidade'] ?> ->
    <?php echo $registro['val_min'] ?>
    <?php echo $registro['val_max'] ?>
    <br>

<?php endforeach ?>