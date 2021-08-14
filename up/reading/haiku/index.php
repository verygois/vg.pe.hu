<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>俳句 | haiku</title>
<style type="text/css">
html, body, #menu {
    height: 100%;
}

body {
  height: 100%;
  overflow-x: hidden;
font-size: 90%;
font-family: 'Verdana';
}

#about {
    position: absolute;
    z-index: 10;
    top: 2%;
    left: 5%;
}

#get {
    position: relative;
    top: 0%;
    left: 0%;
    z-index: 0;
}

#content {
  font-size: 3vw;
    position: relative;
    height: 80%;
    width: 80%;
    top: 0%;
    left: 0%;
padding: 10%;
}
input {font-size: 2vw;}
hr {border-bottom: 1px; padding-top:3em;}
</style>
</head>
<body>
<p id="about">俳句 | haiku<br/>The theme is "Today".</p>
<div id="content">
  <br />
<form action="thankyou.php" method="post">
  <input type="text" name="message" size="50" value="" /><br />
  <br />
  <input type="submit" value="投句 | POST" />
</form>
  <br />
<?php

$fp = fopen('haiku.txt', 'r');
while ($line = fgets($fp)) {
  echo '<p>' . htmlspecialchars($line, ENT_QUOTES) . "</p>\n";
}
fclose($fp);

?>
  <br />
  </div>
  </body>
</html>
