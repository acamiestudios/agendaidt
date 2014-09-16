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
        <th class="b">Cédula</th>
        <th class="b">Nombre</th>
        <th class="b">Apellidos</th>
        
    </thead>
    <tbody>
        <?php 
        if( count($model) ){
            foreach($model as $i => $value){
                ?>
                <tr>
                    <?php echo "<td>".$value->cedula ."</td>";?>
                    <?php echo "<td>" .$value->primer_nombre . ' ' .$value->segundo_nombre ."</td>";?>
                </tr>
                <?php
            }
        }
        ?>
</table>