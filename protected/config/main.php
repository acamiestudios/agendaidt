<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Agenda IDT',
        'theme' => 'tp_acami_b3',
        'language' => 'es',
        'charset' => 'utf-8',
        'timeZone'=>'GMT',
        'defaultController'=>'site',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.cruge.components.*',
                'application.modules.cruge.extensions.crugemailer.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'cruge'=>array(
				'tableprefix'=>'cruge_',

				// para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
				//
				// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
				// para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
				//
				'availableAuthMethods'=>array('default'),

				'availableAuthModes'=>array('username'),

                                // url base para los links de activacion de cuenta de usuario
				'baseUrl'=>'http://acamiestudios.com/agendaidt',

				 // NO OLVIDES PONER EN FALSE TRAS INSTALAR
				 'debug'=>true,
				 'rbacSetupEnabled'=>true,
				 'allowUserAlways'=>false,

				// MIENTRAS INSTALAS..PONLO EN: false
				// lee mas abajo respecto a 'Encriptando las claves'
				//
				'useEncryptedPassword' => true,

				// Algoritmo de la función hash que deseas usar
				// Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
				'hash' => 'sha1',

				// Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
				// hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
				//  lee en la wiki acerca de:
                                //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
                                //
				// ejemplo:
				//		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
				//		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
				//
				'afterLoginUrl'=>null,
				'afterLogoutUrl'=>null,
				'afterSessionExpiredUrl'=>null,

				// manejo del layout con cruge.
				//
				'loginLayout'=>'//layouts/column1',
				'registrationLayout'=>'//layouts/column1',
				'activateAccountLayout'=>'//layouts/column1',
				'editProfileLayout'=>'//layouts/column1',
				// en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
				// de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
				// requerirá de un portlet para desplegar un menu con las opciones de administrador.
				//
				'generalUserManagementLayout'=>'ui',

				// permite indicar un array con los nombres de campos personalizados, 
				// incluyendo username y/o email para personalizar la respuesta de una consulta a: 
				// $usuario->getUserDescription(); 
				'userDescriptionFieldsArray'=>array('email'), 

			),
		
	),

	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName' => false,
                        'caseSensitive' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=bd_agendaidt',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
                
                //  IMPORTANTE:  asegurate de que la entrada 'user' (y format) que por defecto trae Yii
                //               sea sustituida por estas a continuación:
                //
                'user'=>array(
                        'allowAutoLogin'=>true,
                        'class' => 'application.modules.cruge.components.CrugeWebUser',
                        'loginUrl' => array('/cruge/ui/login'),
                ),
                'authManager' => array(
                        'class' => 'application.modules.cruge.components.CrugeAuthManager',
                ),
                'crugemailer'=>array(
                        'class' => 'application.modules.cruge.components.CrugeMailer',
                        'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
                        'subjectprefix' => 'Tu Encabezado del asunto - ',
                        'debug' => true,
                ),
                'format' => array(
                        'datetimeFormat'=>"d M, Y h:m:s a",
                ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'andres@acamiestudios.com',
	),
);