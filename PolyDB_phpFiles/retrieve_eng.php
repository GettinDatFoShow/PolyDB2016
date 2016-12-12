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

   $sql = 'SELECT English_ID, English_word, Word_type, Category FROM Translations';
   mysql_select_db('rose_db');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_assoc($retval)) {
      echo "English_ID :{$row['English_ID']}  <br> ".
         "English_word : {$row['English_word']} <br> ".
         "Word_type : {$row['Word_type']} <br> ".
				 "Word Category : {$row['Category']} <br> ".
         "--------------------------------<br>";
   }

   mysql_close($conn);
?>
