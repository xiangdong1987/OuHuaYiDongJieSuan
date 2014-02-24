<?php 
include_once "common_include.php";
include "./mould/goods.class.php";
$Barcode=isset($_POST["Barcode"])? $_POST["Barcode"] : "";
//$password=isset($_POST["password"])? $_POST["password"] : "";
$flag=0;
$msg="";
if($Barcode==""){
	$msg="条码不能为空。";
}else{
	$good =new Goods();
	$table_num=1;
	//select count(id) as num from cpda1 where Barcode='aaa'
	$sql="select count(id) as num from cpda".$table_num." where Barcode='".$Barcode."'";
	//echo $sql;
	$num=$good->getNum($sql,"num");
	//echo $islogin;
	if($num=="0"){
		$msg="产品不存在，请重新扫描。";
	}else{
		$flag=$num;
		$sql="select * from cpda".$table_num." where Barcode='".$Barcode."'";
		$good_one=$good->getOne($sql);
		$data["good"]=$good_one;
		//print_r($good_one);
	}
}
$data["msg"]=$msg;
$data["flag"]=$flag;
echo json_encode($data);