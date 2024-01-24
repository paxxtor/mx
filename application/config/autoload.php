<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('pagination', 'xmlrpc' , 'form_validation', 'email','upload');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','file','form','security','string','inflector','directory','download', 'multi_language');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('crud_model','account_model', 'google', 'emails', 'alert', 'binnacle_model', 'table_model', 'order_model', 'security_model');