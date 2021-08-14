<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$info = (string)filter_input(INPUT_POST, 'info'); // $_POST['info']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']
$href = (string)filter_input(INPUT_POST, 'href'); // $_POST['href']

$fp = fopen('calendar.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$date, $title, $info, $link, $category, $href]);
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
<title>Direct | Very Gois</title>
<style type="text/css">
</style>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<div class="refine">
  <input id="refine-0" type="radio" name="category" checked><span class="refine-0"><b>✔</b></span>
  <label class="refine-btn all" for="refine-0">ALL</label>
  <input  id="refine-1" type="radio" name="category"><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn a" for="refine-1">Upcoming</label>
  <input id="refine-7" type="radio" name="category"><span class="refine-7"><b>✔</b></span>
  <label class="refine-btn g" for="refine-7">Work in Progress</label>
  <input id="refine-2" type="radio" name="category"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Art</label>
  <input id="refine-3" type="radio" name="category"><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn c" for="refine-3">Music</label>
  <input id="refine-4" type="radio" name="category"><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn d" for="refine-4"># series</label>
  <input id="refine-5" type="radio" name="category"><span class="refine-5"><b>✔</b></span>
  <label class="refine-btn e" for="refine-5">1F</label>
  <input id="refine-6" type="radio" name="category"><span class="refine-6"><b>✔</b></span>
  <label class="refine-btn f" for="refine-6">2F</label>
  <input id="refine-8" type="radio" name="category"><span class="refine-8"><b>✔</b></span>
  <label class="refine-btn h" for="refine-8">Completed</label>
<hr/>

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="<?=h($row[5])?>" class="refine-teims <?=h($row[4])?>">
<p class="date"><?=h($row[0])?></p>
<p class="title"><u><?=h($row[1])?></u></p>
<marquee scrollamount="15" class="info"><?=h($row[2])?></marquee>
<a class="link" href="<?=h($row[3])?>"></a>
</div>
<?php endforeach; ?>
<?php else: ?>
<div id="" class="refine-teims">
<p class="date">0000.00.00 - 00.00</p>
<p class="title"><u>Title</u></p>
<marquee scrollamount="15" class="info">infomation of this event</marquee>
<a class="link"></a>
</div>
<?php endif; ?>
</div>
</div>

<a id="onmouse_button" target="_parent">?</a>
<div id="onmouse">
<div id="onmouse_open">
このページに、ディレクションを行った展覧会や音楽会を掲載します。<br/>
<p>2015年から2019年までは主に実際に場を開き、会場に人を集める形式の催しを企画していましたが、2019年以降はインターネットをベースにどこからでも参加することができる催しも企画しています。</p>
</div>
</div>
</body>
</html>
