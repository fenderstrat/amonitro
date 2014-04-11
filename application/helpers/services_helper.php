<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function redata()
{
	foreach($_POST as $Key => $Value)
	{
		$instance = & get_instance();
		$instance->session->set_flashdata($Key, $Value);
	}
}

function getFirstParagraph($string)
{
	return strip_tags(substr($string,0, strpos($string, "</p>")+4));
}