<?php class DB{
	public $rs1; //���ݿ�����
	public $rs2; //���ݿ�����
	public $rs3; //���ݿ�����
	public $rs4; //���ݿ�����
	public $conn;
	public $source;
	public $db_name;
	public $db_id;
	public $db_Password;
    /**
     * ����:�û����ݿ��� ����
     * @param $table
     * @param string $db_config_arr_path
     */
    function __construct()
    {
		//���Ŀǰ��ַ
		$this->source=SOURCE;
		$this->db_name=DB_NAME;
		$this->db_id=DB_ID;
		$this->db_Password=DB_PASSWORD;
		$Conn= new COM("ADODB.Connection")or die("error first connection");
		$this->rs1=new COM("ADODB.RecordSet") or die("error create first rs ");
		$this->rs2=new COM("ADODB.RecordSet") or die("error create first rs ");
		$this->rs3=new COM("ADODB.RecordSet") or die("error create first rs ");
		$this->rs4=new COM("ADODB.RecordSet") or die("error create first rs ");
		//$ADO="Provider=sqloledb;Data Source=app.ouhuasoft.com,12433;Initial Catalog=".DBNAME_AND_USER.";User Id=".DBNAME_AND_USER.";Password=".DBPASS.";";
		$ADO="Provider=sqloledb;Data Source=".$this->source.";Initial Catalog=".$this->db_name.";User Id=".$this->db_id.";Password=".$this->db_Password.";";
		//echo $ADO;
		$Conn->open($ADO);
		$this->conn=$Conn;
		return $this->conn;
	}
}