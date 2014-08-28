<?php /* @var $this Controller */ ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="language" content="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <!-- se pone después del título ya que yii agrega los asset(css,js) antes de la etiqueta <title>
    <!-- bootstrap CSS framework -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
    
    <!-- hoja de estilo personalizada -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/estilos.css" />
</head>

<body>
    <header>
        <div class="navbar navbar-default navbar-fixed-top text-center" role="navigation">
            <div class="container">
                <div class="nav-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('/site/index');?>"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <nav>
                        <?php 
                            $this->widget('zii.widgets.CMenu',array(
                                        'encodeLabel' => false,
                                        'items'=>array(
                                                array('label'=>'<i class="glyphicon glyphicon-home"></i> Inicio', 'url'=>array('/site/index')),
                                                /*array('label'=>'CRUD <span class="caret">','url'=>'#','items' => array(
                                                                                
                                                                            ),
                                                                            'itemOptions' => array('class' => 'dropdown'),
                                                                            'linkOptions' => array('class' => 'dropdown-toggle', ' data-toggle' => 'dropdown'),
                                                                            'submenuOptions' => array( 'class' => 'dropdown-menu', 'role' => 'menu'),
                                                                            'visible'=>Yii::app()->user->checkAccess('Coordinador'),
                                                    ),*/
                                                array('label' => "<i class='glyphicon glyphicon-user'></i>&nbsp;IDT'S", 'url'=>array('/idt/admin'),'visible'=>Yii::app()->user->checkAccess('role_Coordinador'), ),
                                                array('label' => '<i class="glyphicon glyphicon-folder-open"></i>&nbsp;Fichas', 'url'=>array('/ficha/admin'),'visible'=>Yii::app()->user->checkAccess('role_Coordinador'), ),
                                                array('label' => '<i class="glyphicon glyphicon-th-large"></i>&nbsp;Aprendices', 'url'=>array('/aprendiz/admin'),'visible'=>Yii::app()->user->checkAccess('role_Coordinador'), ),
                                                array('label' => '<i class="glyphicon glyphicon-time"></i>&nbsp;Horarios', 'url'=>array('/horario/admin'),'visible'=>Yii::app()->user->checkAccess('Instructor'), ),
                                                array('label' => '<i class="glyphicon glyphicon-calendar"></i>&nbsp;Reuniones', 'url'=>array('/reunion/admin'),'visible'=>Yii::app()->user->checkAccess('Instructor'), ),
                                                array('label' => 'Admin','url'=>array('/cruge/ui/usermanagementadmin'),'visible'=>Yii::app()->user->isSuperAdmin),
                                                array('label'=>'<i class="glyphicon glyphicon-ok"></i>&nbsp;Login', 'url'=>Yii::app()->user->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                                                array('label'=>'<i class="glyphicon glyphicon-off"></i>&nbsp;Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                        ),
                                        'htmlOptions'=>array('class'=>'nav navbar-nav'),

                                ));
                        /*}elseif( Yii::app()->user->isGuest ){
                            $this->widget('zii.widgets.CMenu',array(
                                        'encodeLabel' => false,
                                        'items'=>array(
                                                array('label'=>'Inicio', 'url'=>array('/site/index')),
                                                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),                                        
                                                array('label'=>'Contact', 'url'=>array('/site/contact')),
                                                array('label'=>'Login', 'url'=>Yii::app()->user->ui->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                                                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                        ),
                                        'htmlOptions'=>array('class'=>'nav navbar-nav'),
                                )); 
                        }*/
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="container">
        <article>
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
        </article>
        <?php echo $content; ?>
    </section>
    <footer class="text-center footer">
        Copyright &copy; <?php echo date('Y'); ?> by Andres Jaramillo - <?php echo CHtml::link('www.acamiestudios.com','http://www.acamiestudios.com', array('target'=>'_blank'));?><br/>
    </footer><!-- footer -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
</body>
</html>
