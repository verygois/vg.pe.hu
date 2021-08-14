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

$name = $_POST["name"];
$good = $_POST["good"];
$bad = $_POST["bad"];

$data = $data."<p>" . $_POST["name"] ."&#12363;&#12425; &#12426;&#12362;&#12373;&#12435;&#12408;<br />";
$data = $data.$_POST["good"] ." &#12364;&#12362;&#12418;&#12375;&#12429;&#12363;&#12387;&#12383;&#12394;<br />";
$data = $data."&#12391;&#12418; ". $_POST["bad"] ." &#12364;&#12385;&#12423;&#12387;&#12392;&#12394;&#12540;</p>";

echo $_POST["name"] ."&#12363;&#12425; &#12426;&#12362;&#12373;&#12435;&#12408;<br />". $_POST["good"] ." &#12364;&#12362;&#12418;&#12375;&#12429;&#12363;&#12387;&#12383;&#12394;<br />&#12391;&#12418; ". $_POST["bad"] ." &#12364;&#12385;&#12423;&#12387;&#12392;&#12394;&#12540;";

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