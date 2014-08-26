<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	"IDT'S"=>array('admin'),
	$model->iduser,
);
?>
<h2 class="text-center">Ver IDT id #<?php echo $model->iduser; ?></h2>

<table class="table table-hover">
    <tbody>
        <?php
            if( count($model) ){
                echo '<tr><th>Usuario</th><td>' . $model->username . '</td></tr>';
                echo '<tr><th>Email</th><td>' . $model->email . '</td></tr>';
            }
            if(count($model->getFields()) > 0){
                    foreach($model->getFields() as $f){
                        echo '<tr><th>' . $f->longname . '</th><td>' . $f->getFieldValue() . '</td></tr>';
                    }
                }
        ?>
    </tbody>
</table>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?>
</div>
