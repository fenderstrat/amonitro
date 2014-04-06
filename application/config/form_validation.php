<?php
$config = array(
	'login' => array(
		array(
			'field' => 'username', 'label' => 'Username', 'rules' => 'required'
		),
		array(
			'field' => 'password', 'label' => 'Password', 'rules' => 'required'
		)
	),
	'artikel' => array(
		array(
			'field' => 'jd', 'label' => 'Judul', 'rules' => 'required'
		),
		array(
			'field' => 'isi', 'label' => 'Isi', 'rules' => 'required'
		),
	)                          
);