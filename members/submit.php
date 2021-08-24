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
<!DOCTYPE html>
<html lang="ja">
<head>
<title>VG Catalog | Distribution</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="">
<link rel="stylesheet" href="/css/ctlg.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="http://creative-community.pe.hu/coding/js/org.js"></script>
<script type="text/javascript">
$(function(){
})
</script>
<style>
#index {overflow:auto;}
</style>
</head>
<body>
<form action="complete.php" id="org" method="post" target="_parent">
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
<label for="publisher" class="label">Label | Publisher</label></li>
</ul>
</div>


<input type="text" name="id" placeholder="id" required>
<input type="text" name="name" placeholder="name" required>
<textarea name="profile" placeholder="profile" required></textarea>
<input type="text" name="questions" placeholder="ichoose.pe.hu/" required>
<div class="reset">
<button type="submit">Submit | 投稿する</button>
</div>
</form>
</body>
</html>
