<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	/*'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'bni_life',
	'dbdriver' => 'mysqli',
	'hostname' => 'MZHELPERS\MSSQLSERVER02',
	'username' => 'sa',
	'password' => 'Server123!',*/
	'hostname' => '10.22.12.34',
	'username' => 'apps_websitedb',
	'password' => 'apps_websitedb',
	'database' => 'WebsiteDB',
	'dbdriver' => 'sqlsrv',
	'dbprefix' => 'kg_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['sql_server'] = array(
	'dsn'	=> '',
	/*'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'bni_life',
	'dbdriver' => 'mysqli',
	'hostname' => 'MZHELPERS\MSSQLSERVER02',
	'username' => 'sa',
	'password' => 'Server123!',*/
	'hostname' => '10.22.12.34',
	'username' => 'apps_websitedb',
	'password' => 'apps_websitedb',
	'database' => 'WebsiteDB_20221104',
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);