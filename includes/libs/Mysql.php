<?php
class Mysql{
	private static $instance=null;
	
	function __construct(){
		$db=@mysql_connect(DBSERVER.':'.DBPORT,DBUSER,DBPASS);
		if($db){
			$this->db=$db;
			@mysql_select_db(DBNAME,$this->db) or die('您的数据库没有安装或数据库连接错误 http://您的域名/');
			@mysql_query("SET NAMES utf8");
		}else{
			echo "<table width='&#x31;&#x30;&#x30;&#x25;' height='&#x31;&#x30;&#x30;&#x25;' border='0'><tr><td align='&#x63;&#x65;&#x6E;&#x74;&#x65;&#x72;' valign=middle'>&#x8B66;&#x544A;&#x63D0;&#x793A;&#x6570;&#x636E;&#x5E93;&#x8FDE;&#x63A5;&#x9519;&#x8BEF;&#xFF1A;&#x31;&#x2E;&#x6CA1;&#x6709;&#x5B89;&#x88C5;&#x6570;&#x636E;&#x5E93;&#xFF0C;&#x32;&#x2E;&#x53EF;&#x80FD;&#x88AB;&#x653B;&#x51FB;&#x6570;&#x636E;&#x5E93;&#x5BFC;&#x81F4;&#xFF0C;&#x33;&#x2E;&#x6570;&#x636E;&#x5E93;&#x505C;&#x6B62;&#x8FD0;&#x884C;&#xFF0C;&#x34;&#x2E;&#x6570;&#x636E;&#x5E93;&#x88AB;&#x5220;&#x9664;</span><br>  <br><br><br><br>&#x5982;&#x679C;&#x60A8;&#x662F;&#x672C;&#x7AD9;&#x552E;&#x5361;&#x4EBA;&#x5458;&#x53D1;&#x73B0;&#x6B64;&#x60C5;&#x51B5;&#x8BF7;&#x7B2C;&#x4E00;&#x65F6;&#x95F4;&#x8054;&#x7CFB;&#x7AD9;&#x5185;&#x6280;&#x672F;&#x5458;&#x8FDB;&#x884C;&#x5904;&#x7406;&#xFF0C;&#x4E3A;&#x4E86;&#x907F;&#x514D;&#x5F71;&#x54CD;&#x60A8;&#x6B63;&#x5E38;&#x53D1;&#x5361;&#x3002;<br><br><br><br>&#x5E7F;&#x544A;&#xFF1A;&#x7231;&#x53D1;&#x81EA;&#x52A8;&#x53D1;&#x5361;&#x5E73;&#x53F0;&#x8425;&#x9500;&#x5B98;&#x7F51; <a href='&#x68;&#x74;&#x74;&#x70;&#x3A;&#x2F;&#x2F;&#x77;&#x77;&#x77;&#x2E;&#x61;&#x38;&#x74;&#x67;&#x2E;&#x63;&#x6F;&#x6D;&#x2F;' target='&#x5F;&#x62;&#x6C;&#x61;&#x6E;&#x6B;'>&#x68;&#x74;&#x74;&#x70;&#x3B;&#x2F;&#x2F;&#x77;&#x77;&#x77;&#x2E;&#x61;&#x38;&#x74;&#x67;&#x2E;&#x63;&#x6F;&#x6D;&#x2F;</a>&#x9500;&#x552E;&#x50;&#x48;&#x50;&#x81EA;&#x52A8;&#x53D1;&#x5361;&#x5E73;&#x53F0;&#x6E90;&#x7801;&#xFF0C;&#x9700;&#x8981;&#x8D2D;&#x4E70;&#x53EF;&#x5230;&#x5B98;&#x65B9;&#x8FDB;&#x884C;&#x8D2D;&#x4E70;&#xFF0C;&#x5177;&#x4F53;&#x54A8;&#x8BE2;&#x5B98;&#x65B9;&#x6280;&#x672F;&#x5458;&#x3002;&#x5BA2;&#x670D;&#x51;&#x51;&#xFF1A;&#x33;&#x35;&#x31;&#x30;&#x37;&#x35;&#x30;&#x38;&#x38;</td></tr></table>";
			exit;
		}
    }
		
	static function getInstance(){
		if(self::$instance==null){
		    self::$instance=new Mysql();
		}
		return self::$instance;
    }
		
	function close(){
		return mysql_close($this->db);
    }
		
	function query($sql){
		if(WY_SQL_LOG) $this->write_log($sql);
		$result=@mysql_query($sql,$this->db);
		if(!$result){
		    //echo 'ErrSql：'.mysql_error().'<br />ErrNo：'.mysql_errno();
		}else{
		    return $result;
		}
    }
		
	function fetch_array($query){
		return mysql_fetch_array($query);
	}
		
	function fetch_row($query){
		return mysql_fetch_row($query);
	}
	
	function num_rows($query){
		return mysql_num_rows($query);
	}
		
	function insert_id(){
		return mysql_insert_id();
	}

	function affected_rows(){
	    return mysql_affected_rows();
	}
		
	function write_log($sql){
		$content=_S('PHP_SELF')."\n".$sql."\n".date('Y-m-d H:i:s')."\n"._S('REMOTE_ADDR')."\n\n";
		$dir_log=WY_ROOT.'/log/';
		if(!file_exists($dir_log)) @mkdir($dir_log , 0777 , true);
		$date=getdate(date('U'));
		$filename="log_".$date['year'].$date['mon'].$date['mday'].".txt";
		$fp=@fopen($dir_log.$filename , 'ab');
		@fwrite($fp,$content);
		@fclose($fp);
    }
}