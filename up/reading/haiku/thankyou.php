<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
p {
text-align : left;
padding: 10% 5%;
}
a {
color: #000;
-moz-text-decoration-style: wavy;    /* for Firefox */
-webkit-text-decoration-style: wavy; /* for Chrome,Safari,Opera */
-ms-text-decoration-style: wavy;     /* for IE */
text-decoration-style: wavy;         /* CSS3 */
}
</style>

</head>
<body>
<?php

if ($_POST['message'] == '') {
  exit('error');
}

$message = $_POST['message'];
$now     = date('Y/m/d H:i');

$post_data = "$message ($now)\n";
$read_data = file_get_contents('haiku.txt');

file_put_contents('haiku.txt', $post_data . $read_data);

?>
<p><a href="index.php">Thank you</a></p>
</body>
</html>