<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<title>Massage to Rio</title>
<style type="text/css">
body { font-size: 500%; font-family: 'SimSun', monospace; padding: 5% 1%;}
p {text-align : right;}
a {
color: #000;
-moz-text-decoration-style: wavy;    /* for Firefox */
-webkit-text-decoration-style: wavy; /* for Chrome,Safari,Opera */
-ms-text-decoration-style: wavy;     /* for IE */
text-decoration-style: wavy;         /* CSS3 */
}
</style>
<body>
<?php

$Because = $_POST["Because"];
$Good = $_POST["Good"];
$But = $_POST["But"];
$Bad = $_POST["Bad"];

$rio_file = 'rio.txt';
$fp = fopen($rio_file, 'ab');
fclose($fp);

$data = $data."<p>" . $_POST["Because"] ." &#12384;&#12387;&#12383;&#12363;&#12425;<br />";
$data = $data.$_POST["Good"] ." &#12364;&#12362;&#12418;&#12375;&#12429;&#12356;<br />";
$data = $data.$_POST["But"] ." &#12364;&#12385;&#12423;&#12387;&#12392;&#12394;&#12540;<br />";
$data = $data.$_POST["Bad"] ." &#12364;&#12431;&#12427;&#12356;</p>";

echo $_POST["Because"] ." &#12384;&#12387;&#12383;&#12363;&#12425;<br />". $_POST["Good"] ." &#12364;&#12362;&#12418;&#12375;&#12429;&#12356;<br />". $_POST["But"] ." &#12364;&#12385;&#12423;&#12387;&#12392;&#12394;&#12540;<br />". $_POST["Bad"] ." &#12364;&#12431;&#12427;&#12356;";

$rio_file = 'rio.txt';
$fp = fopen($rio_file, 'ab');

if ($fp){
    if (flock($fp, LOCK_EX)){
        if (fwrite($fp,  $data) === FALSE){
            print('&#12501;&#12449;&#12452;&#12523;&#26360;&#12365;&#36796;&#12415;&#12395;&#22833;&#25943;&#12375;&#12414;&#12375;&#12383;');
        }

        flock($fp, LOCK_UN);
    }else{
        print('&#12501;&#12449;&#12452;&#12523;&#12525;&#12483;&#12463;&#12395;&#22833;&#25943;&#12375;&#12414;&#12375;&#12383;');
    }
}
for ($i=0;$i<count($lines);$i++) {
fputs($fp,$lines[$i]);
}
fclose($fp);

?>
<p><a href="index.php">Thank you</a></p>
</body>
</html>