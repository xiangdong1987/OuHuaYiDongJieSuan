<?php
class Categories{
	//产品字段
	public $id;
	public $fl_name;
	public $fl_code;		
	//数据库连接
	public $conn;
	public $rs;
	function __construct() {
		$connect=new DB();
		$this->conn=$connect->conn;
		$this->rs=$connect->rs1;
	}
	function getAllcategories($sql,$ajax= null){
		$this->rs->open($sql,$this->conn,1,1);
		while(!$this->rs->eof){
			$new_c= new Categories();
			$new_c->id=$this->rs->fields["id"]->value;
			$new_c->fl_name=$this->rs->fields["fl_name"]->value;
			$new_c->fl_code=$this->rs->fields["fl_code"]->value;
			$fl_class=strlen($new_c->fl_code)/2;
			$totle_data[$fl_class][]=$new_c;
			$this->rs->movenext();
		}
		$this->rs->close;
		return $totle_data;
	}
}
