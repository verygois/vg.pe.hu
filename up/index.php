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
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>VG + | Update</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/jp/cm/show/org.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/cv/menu.html");
})
</script>
<script type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="/jp/cm/show/book.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/cv/greating.css"/>
<style type="text/css">
.list .date,
.list .title {
    font-family:'Great Vibes', cursive;
 }
#org,
#org .reset-button,
.list p {
    font-family: 'Lucida Console', Courier, monospace;
 }
#org h1,
.list .date {
  font-weight:500;
  transform:scale(1,2);
  font-size:100%;
  padding:2.5% 2.5% 0 0;
  width:20%;
  display:inline-block;
  float:left;
  pointer-events: none;
}
.list .title {
  font-size:125%;
  width:75%;
  right:0;
  display:inline-block;
  white-space:nowrap;
  text-decoration:none;
  pointer-events: none;
}
.list li:hover {
  transform:scale(1 1.25)
}
</style>
</head>
<body>
<div id="menu"></div>

<div id="greating">
<form id="org">
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="b" id="b">
<label for="b" class="label">Reading</label></li>
<li>
<input type="radio" name="tag" value="c" id="c">
<label for="c" class="label">Listening</label></li>
<li>
<input type="radio" name="tag" value="d" id="d">
<label for="d" class="label">Watching</label></li>
<li>
<input type="radio" name="tag" value="e" id="e">
<label for="e" class="label">Let's Do</label></li>
<li>
<input type="reset" name="reset" value="View All" class="reset-button"></li>
</ul>
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-tag="<?=h($row[4])?>">
<span>
  <b class="date"><?=h($row[0])?></b>
  <u class="title"><?=h($row[1])?></u>
</span>
<p><?=h($row[2])?></p>
<a style="display:<?=h($row[5])?>;" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle">
<span>
  <b class="date">Title</b>
  <u class="title">contents</u>
</span>
<p>Information</p>
<a style="display:none;" class="link" href="" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endif; ?>
</ul>
</div>
</body>
</html>
