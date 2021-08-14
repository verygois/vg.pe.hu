<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$sub = (string)filter_input(INPUT_POST, 'sub'); // $_POST['sub']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$info = (string)filter_input(INPUT_POST, 'info'); // $_POST['info']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']
$href = (string)filter_input(INPUT_POST, 'href'); // $_POST['href']

$fp = fopen('update.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$sub, $title, $info, $link, $category, $href]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/css/welcome.css"/>
<link rel="stylesheet" type="text/css" href="/css/onmouse.css"/>
<link rel="icon" href="/cv/logo.png">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/cv/menu.html");
})
</script>
<style type="text/css">
#calendar h1 {
  color: #fff;
  text-shadow: 0 0 0.1vh #000;
  font-size:10vh;
  letter-spacing:4.5vw;
  font-weight:500;
  font-family:'Great Vibes', cursive;
  text-align:center;
  position:fixed;
  z-index:-1;
  width:100%;
  margin:0; padding:0;
  top: 60%; left: 50%;
  transform:translate(-50%,-50%);
  -webkit-transform:translate(-50%,-50%);
  pointer-events:none;
  transition:1s all;
}
#calendar h1 span {
  display:block;
  transform:scale(1,10);
}
.news {
  font-size:125%;
  line-height: 200%;
  padding-bottom:1rem;
}
.news a {
  text-decoration: none;
  border:solid 1px;
  padding:0.5rem;
  color:#000;
}
.news a:hover {
  color:#fff;
  background: blue;
}
@media screen and (max-width: 720px){
  #calendar h1 {
    font-size:15vw;
    letter-spacing:0;
  }
.refine-teims .date {background:transparent;}
}
</style>
<title>VG + | Update</title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<h1><span>VG +</span></h1>
<div class="refine">
  <input id="refine-0" type="radio" name="category" checked><span class="refine-0"><b>✔</b></span>
  <label class="refine-btn all" for="refine-0">ALL</label>
  <input id="refine-2" type="radio" name="category" value="b"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Reading</label>
  <input id="refine-3" type="radio" name="category" value="c"><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn c" for="refine-3">Listening</label>
  <input id="refine-4" type="radio" name="category" value="d"><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn d" for="refine-4">Watching</label>
  <input id="refine-5" type="radio" name="category" value="e"><span class="refine-5"><b>✔</b></span>
  <label class="refine-btn e" for="refine-5">Let's Do</label>
<hr/>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="<?=h($row[5])?>" class="refine-teims <?=h($row[4])?>">
<p class="date"><?=h($row[0])?></p>
<p class="title"><u><?=h($row[1])?></u></p>
<marquee class="info" scrollamount="15"><?=h($row[2])?></marquee>
<a class="link" href="<?=h($row[3])?>"></a>
</div>
<?php endforeach; ?>
<?php else: ?>
<div id="" class="refine-teims">
<p class="date">Sub</p>
<p class="title"><u>Title</u></p>
<marquee class="info" scrollamount="15">information</marquee>
<a class="link"></a>
</div>
<?php endif; ?>
</div>
<div id="poem"></div>
</div>
<a id="onmouse_button" target="_parent">?</a>
<div id="onmouse">
<div id="onmouse_open">
  <p class='news'><a href="http://creative-community.pe.hu/coding/">How to Coding | creative-community.pe.hu</a><br/>
  ウェブサイトの作り方を紹介するウェブサイトを開設しました。</p>
</div>
</div>
</body>
</html>
