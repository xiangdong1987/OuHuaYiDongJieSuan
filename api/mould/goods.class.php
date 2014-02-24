<?php
class Goods{
	//产品字段
	public $id_no;
	public $CpflCode;		
	public $SuppliersCode;
	public $Barcode;
	public $NameIt;
	public $NameCn;
	public $Code;
	public $P_Price;
	public $S_Price;
	public $BoxQuantity;
	public $S_Discount;
	public $Iva;
	public $S_Commission;
	public $Note;
	public $ImgPath;
	public $New_1;
	public $Recommend;
	public $IsIndex;
	public $IntDate;
	public $Text1;
	public $Text2;
	public $Int1;
	public $Int2;
	public $Numeric1;
	public $Numeric2;
	public $S_final;
	public $numero;
	public $img;
	//数据库连接
	public $conn;
	public $rs;
	function __construct() {
		$connect=new DB();
		$this->conn=$connect->conn;
		$this->rs=$connect->rs1;
	}
	function getAlldata($sql,$ajax= null){
		$this->rs->open($sql,$this->conn,1,1);
		while(!$this->rs->eof){
			$new_p= new Goods();
			$new_p->id_no=$this->rs->fields["id_no"]->value;
			$new_p->CpflCode=$this->rs->fields["CpflCode"]->value;
			$new_p->SuppliersCode=$this->rs->fields["SuppliersCode"]->value;
			$new_p->Barcode=$this->rs->fields["Barcode"]->value;
			$new_p->NameIt=$this->rs->fields["NameIt"]->value;
			$new_p->NameCn=$this->rs->fields["NameCn"]->value;
			if($ajax==1){
				$new_p->NameCn=iconv('gb2312','utf-8',$new_p->NameCn);
				$new_p->Code=iconv('gb2312','utf-8',$new_p->Code);
			}
			$new_p->Code=$this->rs->fields["Code"]->value;
			$new_p->P_Price=(float)$this->rs->fields["P_Price"]->value;
			$new_p->S_Price=(float)$this->rs->fields["S_Price"]->value;
			$new_p->BoxQuantity=$this->rs->fields["BoxQuantity"]->value;
			$new_p->S_Discount=(float)$this->rs->fields["S_Discount"]->value;
			$new_p->Iva=(float)$this->rs->fields["Iva"]->value;
			$new_p->S_Commission=(float)$this->rs->fields["S_Commission"]->value;
			$new_p->Note=$this->rs->fields["Note"]->value;
			$new_p->ImgPath=$this->rs->fields["ImgPath"]->value;
			$new_p->New_1=$this->rs->fields["New"]->value;
			$new_p->Recommend=$this->rs->fields["Recommend"]->value;
			$new_p->IntDate=$this->rs->fields["IntDate"]->value;
			if($new_p->S_Discount>0){
				$new_p->S_final=$new_p->S_Price*(100-$new_p->S_Discount)/100;
			}
			else{
				$new_p->S_final=$new_p->S_Price;
			}
			$new_p->S_final=number_format($new_p->S_final,2);
			$new_p->P_Price=number_format($new_p->P_Price,2);
			$new_p->S_Price=number_format($new_p->S_Price,2);
			$imgurl1="http://w.ouhuasoft.com/User/".DBNAME_AND_USER."/thumb/".$new_p->id_no.".jpg";
			$imgurl2="http://w.ouhuasoft.com/User/".DBNAME_AND_USER."/thumb/".$new_p->Code.".jpg";
			$imgurl3="http://w.ouhuasoft.com/User/".DBNAME_AND_USER."/thumb/".$new_p->Barcode.".jpg";
			$imgurl4="http://w.ouhuasoft.com/User/".DBNAME_AND_USER."/thumb/noimg.png";
			if(remote_file_exists($imgurl1)==1){
				$new_p->img=$imgurl1;
			}
			else if(remote_file_exists($imgurl2)==1){
				$new_p->img=$imgurl2;
			}
			else if(remote_file_exists($imgurl3)==1){
				$new_p->img=$imgurl3;
			}else{
				$new_p->img=$imgurl4;
			}
			//echo $new_p->img;
			$totle_data[]=$new_p;
			$this->rs->movenext();
		}
		$this->rs->close;
		return $totle_data;
	}
	function getOne($sql){
		$this->rs->open($sql,$this->conn,1,1);
		$new_p= new Goods();
		$new_p->id_no=$this->rs->fields["id_no"]->value;
		$new_p->CpflCode=$this->rs->fields["CpflCode"]->value;
		$new_p->SuppliersCode=$this->rs->fields["SuppliersCode"]->value;
		$new_p->Barcode=$this->rs->fields["Barcode"]->value;
		$new_p->NameIt=$this->rs->fields["NameIt"]->value;
		$new_p->NameCn=iconv('gb2312','utf-8',$this->rs->fields["NameCn"]->value);
		$new_p->Code=$this->rs->fields["Code"]->value;
		$new_p->P_Price=(float)$this->rs->fields["P_Price"]->value;
		$new_p->S_Price=(float)$this->rs->fields["S_Price"]->value;
		$new_p->BoxQuantity=$this->rs->fields["BoxQuantity"]->value;
		$new_p->S_Discount=(float)$this->rs->fields["S_Discount"]->value;
		$new_p->Iva=(float)$this->rs->fields["Iva"]->value;
		$new_p->S_Commission=(float)$this->rs->fields["S_Commission"]->value;
		$new_p->Note=iconv('gb2312','utf-8',$this->rs->fields["Note"]->value);
		$new_p->ImgPath=$this->rs->fields["ImgPath"]->value;
		$new_p->New_1=iconv('gb2312','utf-8',$this->rs->fields["New"]->value);
		$new_p->Recommend=iconv('gb2312','utf-8',$this->rs->fields["Recommend"]->value);
		$new_p->IntDate=$this->rs->fields["IntDate"]->value;
		if($new_p->S_Discount>0){
			$new_p->S_final=$new_p->S_Price*(100-$new_p->S_Discount)/100;
		}
		else{
			$new_p->S_final=$new_p->S_Price;
		}
		$new_p->S_final=number_format($new_p->S_final,2);
		$this->rs->close;
		return $new_p;
	}
	function getNum($sql,$name){
		$this->rs->open($sql,$this->conn,1,1);
		$result=$this->rs->fields[$name]->value;
		$this->rs->close;
		return $result;
	}
}
