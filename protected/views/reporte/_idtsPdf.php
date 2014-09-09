<?php
$pdf = Yii::createComponent('application.extensions.MPDF57.mpdf');
$html='
<link rel="stylesheet" href="' . Yii::app()->theme->baseUrl . '/css/progbar.css" />
<h2 class="text-center">Instructores,Docentes y Tutores</h2>
<div class="CSSTableGenerator" >
                <table >
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fichas</th>
                    </tr>
                    <tr>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                    </tr>
                </table>
</div>
            
';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'User-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
                array('name'=>'nombreCompleto','value'=>'User::getNombresApellidos($data->iduser)'),
                'email',
            array('name'=>'idFicha','value'=>'User::getFichas($data->iduser)'),
                
	),
)); 
//$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
//$mpdf->WriteHTML($html);
//$mpdf->Output('Ficha-Contrato-.pdf','D');
//exit;
?>
