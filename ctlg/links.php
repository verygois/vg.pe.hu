<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$id = (string)filter_input(INPUT_POST, 'id');
$name = (string)filter_input(INPUT_POST, 'name');
$profile = (string)filter_input(INPUT_POST, 'profile');
$language = (string)filter_input(INPUT_POST, 'language');
$status = (string)filter_input(INPUT_POST, 'status');
$questions = (string)filter_input(INPUT_POST, 'questions');

$fp = fopen('index.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$id, $name, $profile, $language, $status, $questions,]);
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
<title>VG CTLG</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/coding/js/org.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<link rel="stylesheet" href="/css/ctlg.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<style type="text/css">
</style>
</head>
<body>
<form id="org">
<div class="search-box language">
<ul>
<li>
<input type="radio" name="language" value="art" id="art">
<label for="art" class="label">Art</label></li>
<li>
<input type="radio" name="language" value="music" id="music">
<label for="music" class="label">Music</label></li>
<li>
<input type="radio" name="language" value="other" id="other">
<label for="other" class="label">Etc,</label></li>
</ul>
</div>
<div class="search-box status">
<ul>
<li>
<input type="radio" name="status" value="people" id="people">
<label for="people" class="label">People</label></li>
<li>
<input type="radio" name="status" value="group" id="group">
<label for="group" class="label">Group</label></li>
<li>
<input type="radio" name="status" value="publisher" id="publisher">
<label for="publisher" class="label">Label / Publisher</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="RESET" class="reset-button">
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-language="<?=h($row[3])?>" data-status="<?=h($row[4])?>" onclick="obj=document.getElementById('<?=h($row[0])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<span><?=h($row[1])?></span>
<span id="<?=h($row[0])?>" class="text" style="display:none; clear:both;">
<i id="profile"><?=h($row[2])?></i>
<p class="buy">
<a style="display:<?=h($row[5])?>;" href="http://ichoose.pe.hu/<?=h($row[5])?>" target="_blank" rel="noopener noreferrer">10Q</a>
<a href="http://newlifecollection.com/?word=<?=h($row[0])?>" target="_blank" rel="noopener noreferrer">collection</a>
</p>
</span>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-language="<?=h($row[3])?>" data-status="<?=h($row[4])?>" onclick="obj=document.getElementById('<?=h($row[0])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<span>Name</span>
<span id="<?=h($row[0])?>" class="text" style="display:none; clear:both;">
<i id="profile">Profile</i>
<p class="<?=h($row[5])?>"><a href="http://ichoose.pe.hu/<?=h($row[5])?>" target="_blank" rel="noopener noreferrer">10Q</a></p>
<p class="buy"><a href="http://newlifecollection.com/?word=<?=h($row[0])?>" target="_blank" rel="noopener noreferrer">see more</a></p>
</span>
</li>
<?php endif; ?>
</ul>
</body>
</html>