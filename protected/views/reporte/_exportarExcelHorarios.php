<style>
    .b{
        background-color: #c2c2c2;
    }
    td{
        border: 1px solid #000;
    }
    
</style>

<table>
    <thead>
    <th class="b">Idt</th>
        <th class="b">Ficha</th>
        <th class="b">D&iacute;a</th>
        <th class="b">Hora</th>
        
    </thead>
    <tbody>
        <?php 
        if( count($model) ){
            foreach($model as $i => $value){
                ?>
                <tr>
                    <?php echo "<td>" . Yii::app()->user->um->getFieldValue($value->idIdt,"nombres") . " " . Yii::app()->user->um->getFieldValue($value->idIdt,"apellidos") . "</td>";?>
                    <?php echo "<td>" . $value->idFicha0->nombre . '(' . $value->idFicha0->codigo . ")</td>";?>
                    <?php echo "<td>" . Util::getDia($value->dia) . "</td>";?>
                    <?php echo "<td>" . $value->idHora0->valor. "</td>";?>
                </tr>
                <?php
            }
        }
        ?>
</table>