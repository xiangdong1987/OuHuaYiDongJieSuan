<?php 
include_once "common_include.php";
include "./mould/xsdhd.php";
include "./mould/customer.class.php";
$user=isset($_POST["user"])? $_POST["user"] : "";
$goods=isset($_POST["goods"])? $_POST["goods"] : "";
$flag=0;
$msg="";
if($user!=""&&$goods!=""){
	//获取单据号
	$tablenum=1;
	$riqi=date("Ymd",time());
	$sql="select count(XsdhdId) as num from xsdhd_djb".$tablenum."  where D_IntDate='".$riqi."'";
	//echo $sql;
	$danju=new xsdhd();
	$num=$danju->getNewid($sql,"num");
	$num=$num+1;
	$bh="PSDHD".$riqi.str_pad($num,5,"0",STR_PAD_LEFT);
	$table="xsdhd_djb".$tablenum;
	//echo $bh;
	//保存单号
	$flag=$danju->save_dj($table,$user,$bh);
	//echo $flag;
	//保存商品
	if($flag==1){
		$table="xsdhd_cplb".$tablenum;
		$flag=$danju->save_good($table,$goods,$bh);
	}
	if($flag==1){
		$msg="恭喜您，单据提交成功，可以到前台进行结算。";
	}else if($flag==2){
		$msg="对不起，单据生成失败。";
		
	}else{
		$msg="对不起，商品信息出现问题。！";
	}
}else{
	$msg="数据有误请重新发送。";
}
$data["msg"]=$msg;
$data["flag"]=$flag;
echo json_encode($data);