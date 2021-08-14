<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Rio's Collection - fri珍 and Rio</title>
<style type="text/css">
body {
font-size: 1em;
font-family: 'SimSun', monospace;
}

#about {
    position: fixed;
    z-index: 1;
    top: 20%;
    left: 10%;
}
#about a {
color: #000;
-moz-text-decoration-style: wavy;    /* for Firefox */
-webkit-text-decoration-style: wavy; /* for Chrome,Safari,Opera */
-ms-text-decoration-style: wavy;     /* for IE */
text-decoration-style: wavy;         /* CSS3 */
}
A:hover {
background-color: #FFFF00;
}
#get a {color: #000; text-decoration: none;}

#content {
  position: relative;
  text-align : right;
    padding: 10%;
}
#posting {
  text-align : center;
  position: relative;
    z-index: 10;
    padding: 5%;
   background-color: #fff;
}
table {
width: 100%;
table-layout: fixed;
}
td, th {
text-align : left;
padding: 5%;
vertical-align: top;
}
#message {
font-size: 2em;
  text-align : right;
  position: relative;
    z-index: 10;
    padding: 5% 10%;
   background-color: #fff;
}

</style>
</head>
<body>
<div id="about">
<p>りおのコレクション - fri珍 and りお</p>
<p>PDF and AUDIO<br />single from "&#12394;&#12395;&#12395;&#12415;&#12360;&#12427;"</p>
<h1 id="get"><a href="https://verygois.bandcamp.com/album/rios-collection" target="_blank">&#128229;</a></h1>
<iframe style="border: 0; width: 100%; height: 42px;" src="https://bandcamp.com/EmbeddedPlayer/album=1092536877/size=small/bgcol=ffffff/linkcol=0687f5/transparent=true/" seamless><a href="http://verygois.bandcamp.com/album/rios-collection">Rio&#39;s Collection by fri珍 and りお</a></iframe>
</div>

<div id="content"><img src="rio1.jpg" width="70%" height="auto" /></div>
<div id="content"><img src="rio2.jpg" width="100%" height="auto" /></div>
<div id="content"><img src="rio3.jpg" width="100%" height="auto" /></div>
<div id="content"><img src="rio4.jpg" width="100%" height="auto" /></div>
<div id="content"><img src="rio7.jpg" width="100%" height="auto" /></div>
<div id="posting">
<h1>なんか書いてください<br />かんそうをおねがいします</h1>
<table>
<tbody>
<tr>
<td>
<form method="post" action="rio01.php">
<input type="hidden" name="mode" value="write">
<div><input type="radio" name="sex" value="わたし は " /> わたし <input type="radio" name="sex" value="ぼく は " /> ぼく は <br /><input type="text" name="very" size=10> がよかったけど</div>
<div>でもやっぱり <input type="text" name="and" size=10> より <input type="text" name="gois" size=10> がよかったよ</div>
<p><input type="submit" value="送信する"></p>
</form>
</td>
<td>
<form method="post" action="rio02.php">
<input type="hidden" name="mode" value="write">
<input type="text" name="name" size=10> から<br />りおさんへ<br />
<input type="text" name="good" size=10> がおもしろかったな<br />でも <input type="text" name="bad" size=10> がちょっとなー
<p><input type="submit" value="送信する"></p>
</form>
</td>
<td>
<form method="post" action="rio03.php">
<input type="hidden" name="mode" value="write">
<input type="text" name="Because" size=10> だったから<br /><input type="text" name="Good" size=10> がおもしろい<br /><input type="text" name="But" size=10> がちょっとなー<br /><input type="text" name="Bad" size=10> がわるい<br />
<p><input type="submit" value="送信する"></p>
</form>
</td>
</tr>
</tbody>
</table>
<form method="post" action="rio00.php">
<input type="hidden" name="mode" value="write">
<p>きにいったとこをかいてね <input type="text" name="rio" size=20> <input type="submit" value="送信する"></p>
</form>
</div>
<div id="message">
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}

readData();

function readData(){
    $rio_file = 'rio.txt';

    $fp = fopen($rio_file, 'rb');

    if ($fp){
        if (flock($fp, LOCK_SH)){
            while (!feof($fp)) {
                $buffer = fgets($fp);
                print($buffer);
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

?>
</div>
</body>
</html>