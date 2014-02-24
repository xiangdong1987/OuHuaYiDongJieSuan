<?php 
include_once "common_include.php";
include "./mould/customer.class.php";
$W_Piva=isset($_POST["username"])? $_POST["username"] : "";
//$password=isset($_POST["password"])? $_POST["password"] : "";
$source="192.168.1.8";
$db_id="sa";
$db_Password="abc";
$db_name="wl2";
$flag=0;
$msg="";
if(isset($_POST["id"])){
	$flag=1;
	$Custom =new Customer();
	$Custom_one=$Custom->getByid($_POST["id"]);
	$data["custom"]=$Custom_one;
}
if($W_Piva==""){
	$msg="客户资料不能为空。";
}else{
	$Custom =new Customer();
	$islogin=$Custom->islogin($W_Piva);
	//echo $islogin;
	if($islogin=="0"){
		$msg="客户不存在，请重新输入客户资料。提示：客户资料可以是PIVA，电话，邮箱，意大利名等信息。";
	}else if($islogin==1){
		$flag=$islogin;
		$Custom_one=$Custom->getOne($W_Piva);
		$data["custom"]=$Custom_one;
		//print_r($Custom_one);
	}else{
		$flag=$islogin;
		$Custom_all=$Custom->getAll($W_Piva);
		$data["custom"]=$Custom_all;	
		//print_r($Custom_all);
	}
}
$data["msg"]=$msg;
$data["flag"]=$flag;
echo json_encode($data);