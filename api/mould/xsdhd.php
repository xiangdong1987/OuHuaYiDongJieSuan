<?php
class xsdhd{
	//产品字段
	public $XsdhdId;
	public $D_IntDate;		
	public $Status;
	public $Mark;
	public $Salesman;
	public $Client;
	public $Client_Id;
	public $Expires;
	public $Operator;
	public $D_Note;
	public $OperatingDate;
	//数据库连接
	public $conn;
	public $rs;
	function __construct() {
		$connect=new DB();
		$this->conn=$connect->conn;
		$this->rs=$connect->rs1;
	}
	function getNewid($sql,$name){
		$this->rs->open($sql,$this->conn,1,1);
		$result=$this->rs->fields[$name]->value;
		$this->rs->close;
		return $result;
	}
	function save_dj($table,$user,$djh){
		try{
			$riqi=date("Ymd",time());
			$Status=iconv("utf-8","gb2312","未审核");
			$Mark=iconv("utf-8","gb2312","未发货");
			$Operator=iconv("utf-8","gb2312","移动结算端");
			$Salesman="";
			$Client=iconv("utf-8","gb2312",$user["W_NameCn"]."[".$user["W_id_no"]."]");
			$Client_Id=$user["W_id_no"];
			$OperatingDate=date("Y-m-d H:i:s");
			$sql=("insert into ".$table." (XsdhdId,D_IntDate,Status,Mark,Salesman,Client,Client_Id,Expires,Operator,D_Note,OperatingDate) values (
			'".$djh."',
			'".$riqi."',
			'".$Status."',
			'".$Mark."',
			'".$Salesman."',
			'".$Client."',
			'".$Client_Id."',
			'',
			'".$Operator."',
			'',
			'".$OperatingDate."'
			)");
			$this->rs->open($sql,$this->conn,1,1);
			$error=1;
		}catch(exception $e){
			//插入销售订货单单据表失败
			$error=2;
			//$this->rs->close;
		}
		return $error;
	}
	function save_good($table,$goods,$djh){
		try{
			$i=0;
			foreach($goods as $good){
			
				$id_no=$good["id_no"];
				$Barcode=$good["Barcode"];
				$CpflCode=$good["CpflCode"];
				$SuppliersCode=$good["SuppliersCode"];
				$NameIt=$good["NameIt"];
				$NameCn=iconv("utf-8","gb2312",$good["NameCn"]);
				$Code=$good["Code"];
				$P_Price=$good["P_Price"];
				$S_Price=$good["S_Price"];		
				$BoxQuantity=$good["BoxQuantity"];		
				$S_Discount=$good["S_Discount"];	
				$Iva=$good["Iva"];	
				$Quantity1=$good["numero"];	
				$S_Commission=$good["S_Commission"];	
				$New=iconv("utf-8","gb2312",$good["New_1"]);;				
				$IntDate=date("Y-m-d");
				$sql=("insert into ".$table." (dj_id_no,Sort,id_no,Barcode,CpflCode,SuppliersCode,NameIt,NameCn,Code,P_Price,S_Price,BoxQuantity,S_Discount,Iva,Quantity1,S_Commission,New,IntDate) values (
				'".$djh."',
				'".$i."',
				'".$id_no."',
				'".$Barcode."',
				'".$CpflCode."',
				'".$SuppliersCode."',
				'".$NameIt."',
				'".$NameCn."',
				'".$Code."',
				'".$P_Price."',
				'".$S_Price."',
				'".$BoxQuantity."',
				'".$S_Discount."',
				'".$Iva."',
				'".$Quantity1."',
				'".$S_Commission."'	,
				'".$New."'	,
				'".$IntDate."'	
				)");
				//echo $sql;
				//exit;
				$this->rs->open($sql,$this->conn,1,1);
				$i++;
			}
			$error=1;
		}catch(exception $e){
			//插入销售订货单产品列表失败
			$error=3;
			//$this->rs->close;
		}
		//$this->rs->close;
		return $error;
	}
}
