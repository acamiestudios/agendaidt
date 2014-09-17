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
    <th class="b">C&eacute;dula</th>
        <th class="b">Nombre</th>
        <th class="b">Apellidos</th>
        <th class="b">Ficha</th>
        
    </thead>
    <tbody>
        <?php 
        if( count($model) ){
            foreach($model as $i => $value){
                ?>
                <tr>
                    <?php echo "<td>" . $value->cedula . "</td>";?>
                    <?php echo "<td>" . $value->primer_nombre . ' ' . $value->segundo_nombre . "</td>";?>
                    <?php echo "<td>" . $value->primer_apellido . ' ' . $value->segundo_apellido . "</td>";?>
                    <?php echo "<td>" . $value->idFicha0->nombre. "</td>";?>
                </tr>
                <?php
            }
        }
        ?>
</table>