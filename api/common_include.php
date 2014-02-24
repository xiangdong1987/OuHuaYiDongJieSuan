<?php
//引用数据库连接类
error_reporting(0);
include_once "./mould/db.class.php";
//连接数据源
$config=json_decode($_POST["config"]);
$source="192.168.1.8";
$db_id=$config[1];
$db_Password=$config[2];
$db_name=$config[3];
define("SOURCE",$source);
define("DB_ID",$db_id);
define("DB_PASSWORD",$db_Password);
define("DB_NAME",$db_name);
//print_r($config);
try{
	$dbConn= new COM("ADODB.Connection") or die("创建COM失败");
	$rs=new COM("ADODB.RecordSet") or die("创建RS失败");
	$ADO_START="Provider=sqloledb;Data Source=".SOURCE.";Initial Catalog=".DB_NAME.";User Id=".DB_ID.";Password=".DB_PASSWORD.";";
	//echo $ADO_START;
	$dbConn->open($ADO_START);
	$flag_conect="1";
}catch(exception $e){
	$flag_conect="0";
}
$data["flag_conect"]=$flag_conect;
