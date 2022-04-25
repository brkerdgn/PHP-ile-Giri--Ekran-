<?php
include "baglan.php";
### mysql_query();
### mysql_fetch_array();
### while () {}

$kayit     = mysql_query("SELECT * FROM users");
             while($row = mysql_fetch_array($kayit)){
                 $user_name     = $row['user_name'];
                 $user_password = $row['user_password'];
                 

                 echo"<h3>$user_name</h3>";
                 echo"<br>";
                 echo"<h3>$user_password</h3>";
                 echo"<br>";
                 echo"<h3>$user_mail</h3>";
             }
?>