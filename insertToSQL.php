<?php

function insertHappyTextToSql($text)
{

    if(isset($_SERVER['HTTP_APPNAME'])){        //SAE
        $mysql_host = SAE_MYSQL_HOST_M;
        $mysql_host_s = SAE_MYSQL_HOST_S;
        $mysql_port = SAE_MYSQL_PORT;
        $mysql_user = SAE_MYSQL_USER;
        $mysql_password = SAE_MYSQL_PASS;
        $mysql_database = "app_happypush";
    }else{
        $mysql_host = "127.0.0.1";
        $mysql_host_s = "127.0.0.1";
        $mysql_port = "3306";
        $mysql_user = "root";
        $mysql_password = "root";
        $mysql_database = "weixin";
    }

$con = mysql_connect($mysql_host.':'.$mysql_port,$mysql_user,$mysql_password);

if (!$con)
  {
   return mysql_error()."1";
  }

   mysql_query("SET NAMES 'UTF8'");
  mysql_select_db($mysql_database, $con);
 
 $time = date('Y-m-d H:i:s',time());
  $sql = "INSERT INTO happyShow (from_user, happyshow,unpdate_time) VALUES ('','','$text','$time')";
  
  if(!mysql_query($sql,$con))
      { 
		  return mysql_error()."---2";
  } 
  
  mysql_close($con);
  
   return $text."已加入数据库";	
}
?>