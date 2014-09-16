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
        <th class="b">Nombre</th>
        <th class="b">Email</th>
        <th class="b">Fichas</th>
    </thead>
    <tbody>
        <?php 
        if( count($model) ){
            foreach($model as $i => $value){
                ?>
                <tr>
                    <?php echo "<td>".User::getNombresApellidos($value->iduser) ."</td>";?>
                    <?php echo "<td>$value->email</td>";?>
                    <?php echo "<td>" . User::getFichas($value->iduser) . "</td>";?>
                </tr>
                <?php
            }
        }
        ?>
</table>