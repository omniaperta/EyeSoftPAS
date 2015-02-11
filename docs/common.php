<?php
return array(
		'modules' => array(
			'EyeSoftPAS' => array(
				'class' => '\OEModule\EyeSoftPAS\EyeSoftPASModule',
			),
		),
		'components' => array(
				'db_pas' => array(
						'connectionString' => 'mysql:host=localhost;dbname=eyesoft',
						'username' => 'root',
						'password' => '',
				),
		),
		'params'=>array(
				'eyesoftpas_enabled' => true,
				//'eyesoftpas_cache_time' => 300,
		),
);
