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
         if(isset($_POST['add'])) {
            $dbhost = "localhost";
            $dbuser = "rose";
            $dbpass = "qFPENU";
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $english_word = addslashes ($_POST['English_word']);
               $word_type = addslashes ($_POST['Word_type']);
               $word_category = addslashes ($_POST['Category']);
               $link_definition = addslashes ($_POST['link_definition']);
            }else {
              $english_word = $_POST['English_word'];
              $word_type = $_POST['Word_type'];
              $word_category = $_POST['Category'];
              $link_definition = $_POST['link_definition'];
            }

            $english_ID = $_POST['English_ID'];


            $sql = "INSERT INTO Translations" . "(English_ID, English_word, Word_type, Category, link_definition)" .
            "VALUES($english_ID, '$english_word', '$word_type', '$word_category', '$link_definition' )"; #NOW()

            $dbname = "rose_db";
           	mysql_select_db($dbname) or die(mysql_error());

            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            echo "Entered data successfully\n";

            mysql_close($conn);

         }else {
            ?>

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1"
                     cellpadding = "2">

                     <tr>
                        <td width = "100">English ID</td>
                        <td><input name = "English_ID" type = "text"
                           id = "English_ID"></td>
                     </tr>

                     <tr>
                        <td width = "100">English Word</td>
                        <td><input name = "english" type = "text"
                           id = "english"></td>
                     </tr>

                     <tr>
                        <td width = "100">Word Type</td>
                        <td><input name = "Word_type" type = "text"
                           id = "Word_type"></td>
                     </tr>

                     <tr>
                        <td width = "100">Word Category</td>
                        <td><input name = "Category" type = "text"
                           id = "Category"></td>
                     </tr>

                     <tr>
                        <td width = "100">Link Description</td>
                        <td><input name = "link_definition" type = "text"
                           id = "link_definition"></td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add"
                              value = "Add English word">
                        </td>
                     </tr>

                  </table>
               </form>

            <?php
         }
      ?>

   </body>
</html>
