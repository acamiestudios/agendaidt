<?php
if( count($model) ){
    echo CHtml::beginForm('guardarAsistencias','post',array('name'=>'listaAprendices','id'=>'listaAprendices_form'));
        echo CHtml::hiddenField('listaAprendices[nAprendices]',count($model));
        echo CHtml::hiddenField('listaAprendices[fechaAsistencia]',$fechaAsistencia);
        echo CHtml::hiddenField('listaAprendices[idHorario]');
        ?>
        <table class="table table-hover">
            <thead>
                <th>Num.</th>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Asistio</th>
                <th>Falto</th>
            </thead>
            <tbody>
                <?php 

                    foreach($model as $num => $aprendiz){

                        $asistenciaAprendiz=Asistencia::model()->findByAttributes(array('fechaAsistencia'=>$fechaAsistencia, 'idHorario'=>$idHorario, 'idAprendiz'=>$aprendiz->idAprendiz));
                        if( $asistenciaAprendiz != null){
                            if( $asistenciaAprendiz->asistio == 1 ){
                                $siAsistio = 1;
                                $noAsistio = 0;
                            }else{
                                $siAsistio = 0;
                                $noAsistio = 1;
                            }
                        }else{
                            $siAsistio = 0;
                            $noAsistio = 0;
                        }

                        ?>
                        <tr>
                            <td><?php echo $num + 1;?></td>
                            <td><?php echo $aprendiz->cedula;?></td>
                            <td><?php echo $aprendiz->primer_nombre . ' ' . $aprendiz->segundo_nombre ;?></td>
                            <td><?php echo $aprendiz->primer_apellido . ' ' . $aprendiz->segundo_apellido;?></td>
                            <td><?php echo CHtml::radioButton('listaAprendices[asistio]['. $aprendiz->idAprendiz . ']',$siAsistio,array('value'=>'1','uncheckValue'=>null));?></td>
                            <td><?php echo CHtml::radioButton('listaAprendices[asistio]['. $aprendiz->idAprendiz . ']',$noAsistio,array('value'=>'0','uncheckValue'=>null));?></td>
                        </tr>
                        <?php
                    }


                    ?>

            </tbody>
        </table>
        <?php
        echo CHtml::Button('Guardar',array('id'=>'btn-enviar-asistencias','onclick'=>'antesDeEnviar()', 'class'=>'btn btn-success') );

    echo CHtml::endForm();
}else{
    echo '<h3>No se encontraron aprendices.</h3>';
}

?>