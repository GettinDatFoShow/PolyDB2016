<?php
	mb_internal_encoding("UTF-8");

   $dbhost = 'localhost';
   $dbuser = 'rose';
   $dbpass = 'qFPENU';

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	 mysql_query("SET NAMES UTF8");


   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT Chinese_ID, Chinese_Char, Pinyin FROM Chinese';
   mysql_select_db('rose_db');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_assoc($retval)) {
      echo "Chinese_ID :{$row['Chinese_ID']}  <br> ".
         "Chinese_Char : {$row['Chinese_Char']} <br> ".
         "Pinyin : {$row['Pinyin']} <br> ".
         "--------------------------------<br>";
   }

   mysql_close($conn);
?>
