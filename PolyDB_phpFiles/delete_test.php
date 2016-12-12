<!DOCTYPE HTML>
<html>
  <head>
    <title>PolyDB | Modify Records</title>

		<nav>
		  <a href="http://192.168.142.254/dbs2016/rose/home.html">Return to home page</a>
		</nav>
  </head>

   <body>
      <?php
         if(isset($_POST['delete'])) {
            $dbhost = "localhost";
            $dbuser = "rose";
            $dbpass = "qFPENU";
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            $eng_word = $_POST['English_word'];

            $sql = "DELETE FROM Translations WHERE English_word = '$eng_word' ";

            $dbname = "rose_db";
        		mysql_select_db($dbname) or die(mysql_error());

            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }

            echo "Deleted data successfully\n";

            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1"
                     cellpadding = "2">

                     <tr>
                        <td width = "100"> English Word </td>
                        <td><input name = "English_word" type = "text"
                           id = "English_word"></td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit"
                              id = "delete" value = "Delete">
                        </td>
                     </tr>

                  </table>
               </form>
            <?php
         }
      ?>

   </body>
</html>

<style>

</style>
