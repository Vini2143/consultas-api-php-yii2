<select id="city-select" class="form-select">
  <option value="0">Todas</option>
  <option value="Thetford">Thetford</option>
  <option value="Bridgewatch">Bridgewatch</option>
  <option value="Lymhurst">Lymhurst</option>
  <option value="Marlock">Marlock</option>
  <option value="Fort Sterling">Fort Sterling</option>
  <option value="Caerleon">Caerleon</option>
  <option value="Black Market">Black Market</option>
</select>
<br>

<?php foreach ($dados as $code => $item): ?>
    <?php 
    $id = str_replace(' ', '', lcfirst($item['name'].$item['tier'].$item['enchant']));
    $nome = $item['name']. ' ' .$item['tier']. '.' . $item['enchant'];
    ?>
    <div id="<?php echo $id ?>" class="border rounded">
        <b><?php echo $nome ?></b>
        <button class="btn btn-success" onclick="getData('<?php echo $code ?>' ,'<?php echo $id?>')">Mostrar</button>
        <div></div>
    </div>

<?php endforeach ?>


<script>
    function getData(itemId, divId){

        $.post('/site/item-data', { 
            'AlbionApiRequest' : {
            'itemCode' : itemId, 
            'city' : $('#city-select').val()
            }
        }, (data) => {
            $('#' + divId + ' div').html(data)
            //console.log(data)
        })

    }

</script>