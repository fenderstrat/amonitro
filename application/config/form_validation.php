<?php
$config = array(
	'login' => array(
		array(
			'field' => 'username', 'label' => 'Username', 'rules' => 'required'
		),
		array(
			'field' => 'password', 'label' => 'Password', 'rules' => 'required'
		),
		array(
			'field' => 'passconf', 'label' => 'PasswordConfirmation', 'rules' => 'required'
		),
		array(
			'field' => 'email', 'label' => 'Email', 'rules' => 'required'
		)
	),
	'artikel' => array(
		array(
			'field' => 'judul', 'label' => 'Judul', 'rules' => 'required'
		),
		array(
			'field' => 'isi', 'label' => 'Isi', 'rules' => 'required'
		),
		array(
			'field' => 'deskripsi', 'label' => 'Deskripsi', 'rules' => 'required'
		),
		array(
			'field' => 'keyword', 'label' => 'Keyword', 'rules' => 'required'
		),
		array(
			'field' => 'tag', 'label' => 'Tag', 'rules' => 'required'
		)
	)                          
);