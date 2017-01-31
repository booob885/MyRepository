<?php

mysql_connect("localhost", "sergeybobrov", "zrrJ8zNEdpuTwuty")
or die("<p>error" . mysql_error(). "</p>");
 mysql_select_db ("db")
 or die("<p>Ошибка выбора базы данных!" . mysql_error(). "</p>");
?>