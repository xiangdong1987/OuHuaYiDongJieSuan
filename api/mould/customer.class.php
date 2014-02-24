<?php
class Customer{
	//产品字段
	public $id;
	public $W_id_no;
	public $W_Type;		
	public $W_NameIt;
	public $W_NameCn;
	public $W_Region;
	public $W_City;
	public $W_Zip;
	public $W_Address;
	public $W_Tele;
	public $W_Piva;
	public $W_CodiceFiscale;
	public $W_Email;
	public $W_Web;
	public $W_BackName;
	public $W_BackCode;
	public $W_Name;
	public $W_Fax;
	public $W_Note;
	public $W_CardNumber;
	public $W_Integral;
	public $W_Salesman;
	public $W_IntDate;
	public $W_AmountOwed;
	public $W_IsQuiry;
	public $W_PassWord;
	public $W_ActivityDate;
	//数据库连接
	public $conn;
	public $rs;
	function __construct() {
		$connect=new DB();
		$this->conn=$connect->conn;
		$this->rs=$connect->rs1;
	}
	function islogin($W_Piva){
		$tablenum=1;
		$sql="select count(id) as num from wlks".$tablenum." where W_Piva like '%".$W_Piva."%'";
		$sql.=" or W_NameIt  like '%".$W_Piva."%'";
		$sql.=" or W_Tele  like '%".$W_Piva."%'";
		$sql.=" or W_Email  like '%".$W_Piva."%'";
		//echo $sql;
		$this->rs->open($sql,$this->conn,1,1);
		$n=$this->rs->fields["num"]->value;
		$this->rs->close;
		return $n;
	}
	function getOne($W_Piva){
		$tablenum=1;
		//$sql="select * from wlks".$tablenum." where W_Piva='".$W_Piva."'";
		$sql="select * from wlks".$tablenum." where W_Piva like '%".$W_Piva."%'";
		$sql.=" or W_NameIt  like '%".$W_Piva."%'";
		$sql.=" or W_Tele  like '%".$W_Piva."%'";
		$sql.=" or W_Email  like '%".$W_Piva."%'";
		$this->rs->open($sql,$this->conn,1,1);
		$new_c= new Customer();
		$new_c->id=$this->rs->fields["id"]->value;
		$new_c->W_id_no=iconv('gb2312','utf-8',$this->rs->fields["W_id_no"]->value);
		$new_c->W_Type=iconv('gb2312','utf-8',$this->rs->fields["W_Type"]->value);
		$new_c->W_NameIt=iconv('gb2312','utf-8',$this->rs->fields["W_NameIt"]->value);
		$new_c->W_NameCn=iconv('gb2312','utf-8',$this->rs->fields["W_NameCn"]->value);
		$new_c->W_Region=iconv('gb2312','utf-8',$this->rs->fields["W_Region"]->value);
		$new_c->W_City=iconv('gb2312','utf-8',$this->rs->fields["W_City"]->value);
		$new_c->W_Zip=iconv('gb2312','utf-8',$this->rs->fields["W_Zip"]->value);
		$new_c->W_Address=iconv('gb2312','utf-8',$this->rs->fields["W_Address"]->value);
		$new_c->W_Tele=iconv('gb2312','utf-8',$this->rs->fields["W_Tele"]->value);
		$new_c->W_Piva=iconv('gb2312','utf-8',$this->rs->fields["W_Piva"]->value);
		$new_c->W_CodiceFiscale=iconv('gb2312','utf-8',$this->rs->fields["W_CodiceFiscale"]->value);
		$new_c->W_Email=iconv('gb2312','utf-8',$this->rs->fields["W_Email"]->value);
		$new_c->W_Web=iconv('gb2312','utf-8',$this->rs->fields["W_Web"]->value);
		$new_c->W_BackName=iconv('gb2312','utf-8',$this->rs->fields["W_BackName"]->value);
		$new_c->W_BackCode=iconv('gb2312','utf-8',$this->rs->fields["W_BackCode"]->value);
		$new_c->W_Fax=iconv('gb2312','utf-8',$this->rs->fields["W_Fax"]->value);
		$this->rs->close;
		return $new_c;
	}
	function getByid($id){
		$tablenum=1;
		//$sql="select * from wlks".$tablenum." where W_Piva='".$W_Piva."'";
		$sql="select * from wlks".$tablenum." where id='".$id."'";
		$this->rs->open($sql,$this->conn,1,1);
		$new_c= new Customer();
		$new_c->id=$this->rs->fields["id"]->value;
		$new_c->W_id_no=iconv('gb2312','utf-8',$this->rs->fields["W_id_no"]->value);
		$new_c->W_Type=iconv('gb2312','utf-8',$this->rs->fields["W_Type"]->value);
		$new_c->W_NameIt=iconv('gb2312','utf-8',$this->rs->fields["W_NameIt"]->value);
		$new_c->W_NameCn=iconv('gb2312','utf-8',$this->rs->fields["W_NameCn"]->value);
		$new_c->W_Region=iconv('gb2312','utf-8',$this->rs->fields["W_Region"]->value);
		$new_c->W_City=iconv('gb2312','utf-8',$this->rs->fields["W_City"]->value);
		$new_c->W_Zip=iconv('gb2312','utf-8',$this->rs->fields["W_Zip"]->value);
		$new_c->W_Address=iconv('gb2312','utf-8',$this->rs->fields["W_Address"]->value);
		$new_c->W_Tele=iconv('gb2312','utf-8',$this->rs->fields["W_Tele"]->value);
		$new_c->W_Piva=iconv('gb2312','utf-8',$this->rs->fields["W_Piva"]->value);
		$new_c->W_CodiceFiscale=iconv('gb2312','utf-8',$this->rs->fields["W_CodiceFiscale"]->value);
		$new_c->W_Email=iconv('gb2312','utf-8',$this->rs->fields["W_Email"]->value);
		$new_c->W_Web=iconv('gb2312','utf-8',$this->rs->fields["W_Web"]->value);
		$new_c->W_BackName=iconv('gb2312','utf-8',$this->rs->fields["W_BackName"]->value);
		$new_c->W_BackCode=iconv('gb2312','utf-8',$this->rs->fields["W_BackCode"]->value);
		$new_c->W_Fax=iconv('gb2312','utf-8',$this->rs->fields["W_Fax"]->value);
		$this->rs->close;
		return $new_c;
	}
	function getAll($W_Piva){
		$tablenum=1;
		$sql="select * from wlks".$tablenum." where W_Piva like '%".$W_Piva."%'";
		$sql.=" or W_NameIt  like '%".$W_Piva."%'";
		$sql.=" or W_Tele  like '%".$W_Piva."%'";
		$sql.=" or W_Email  like '%".$W_Piva."%'";
		//echo $sql;
		$this->rs->open($sql,$this->conn,1,1);
		while(!$this->rs->eof){
			$new_c= new Customer();
			$new_c->id=$this->rs->fields["id"]->value;
			$new_c->W_id_no=iconv('gb2312','utf-8',$this->rs->fields["W_id_no"]->value);
			$new_c->W_Type=iconv('gb2312','utf-8',$this->rs->fields["W_Type"]->value);
			$new_c->W_NameIt=iconv('gb2312','utf-8',$this->rs->fields["W_NameIt"]->value);
			$new_c->W_NameCn=iconv('gb2312','utf-8',$this->rs->fields["W_NameCn"]->value);
			$new_c->W_Region=iconv('gb2312','utf-8',$this->rs->fields["W_Region"]->value);
			$new_c->W_City=iconv('gb2312','utf-8',$this->rs->fields["W_City"]->value);
			$new_c->W_Zip=iconv('gb2312','utf-8',$this->rs->fields["W_Zip"]->value);
			$new_c->W_Address=iconv('gb2312','utf-8',$this->rs->fields["W_Address"]->value);
			$new_c->W_Tele=iconv('gb2312','utf-8',$this->rs->fields["W_Tele"]->value);
			$new_c->W_Piva=iconv('gb2312','utf-8',$this->rs->fields["W_Piva"]->value);
			$new_c->W_CodiceFiscale=iconv('gb2312','utf-8',$this->rs->fields["W_CodiceFiscale"]->value);
			$new_c->W_Email=iconv('gb2312','utf-8',$this->rs->fields["W_Email"]->value);
			$new_c->W_Web=iconv('gb2312','utf-8',$this->rs->fields["W_Web"]->value);
			$new_c->W_BackName=iconv('gb2312','utf-8',$this->rs->fields["W_BackName"]->value);
			$new_c->W_BackCode=iconv('gb2312','utf-8',$this->rs->fields["W_BackCode"]->value);
			$new_c->W_Fax=iconv('gb2312','utf-8',$this->rs->fields["W_Fax"]->value);
			$c_list[]=$new_c;
			$this->rs->movenext();
		}
		$this->rs->close;
		return $c_list;
	}
	function updateOne($slq){
		try{
			$this->rs->open($slq,$this->conn,1,1);
			$flag=true;
		}catch(exception $e){
			$flag=false;
		}
		return $flag;
	}
}