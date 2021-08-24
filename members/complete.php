<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$id = (string)filter_input(INPUT_POST, 'id');
$name = (string)filter_input(INPUT_POST, 'name');
$profile = (string)filter_input(INPUT_POST, 'profile');
$language = (string)filter_input(INPUT_POST, 'language');
$status = (string)filter_input(INPUT_POST, 'status');

$fp = fopen('index.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$id, $name, $profile, $language, $status,]);
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
<meta http-equiv="refresh" content="3;URL=submit.php">
<link rel="icon" href="">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<style type="text/css">
html, body {padding:0; margin:0;}
#foot {
  display:block;
  position:relative;
  top:0; left:0;
  width:100%;
  height:100vh;
}
#foot .inside h1 {
  font-size:10vw;
  font-weight:500;
  text-align:center;
  font-family:'Great Vibes', cursive;
  width:100%;
  position:absolute;
  top:55%; left:50%;
  padding:0; margin:0;
  transform: translate(-50%, -50%);
}
#foot .inside h1 span {
  display:block;
  transform:scale(1,7);
}
#foot .inside p {
  font-size:2.5vw;
  width:100%;
  text-align:center;
  position:absolute;
  top:90%; left:50%;
  transform: translate(-50%, -50%);
  font-family: "SF Compact", sans-serif;
}
#foot .inside b {
  border:0.25vw solid;
  background:#fff;
  padding:0.5vw 2.5vw;
  border-radius:2rem;
}

</style>
</head>
<body>
<div id="foot">
<div class="inside">
<h1><span id="rename">Thank</span></h1>
<p class="notice"><b>ご投稿ありがとうございました</b></p>
</div>
</div>
<script>
var text = ["Thank You","for", "Submit" ];
var counter = 0;
var elem = document.getElementById("rename");
var inst = setInterval(change, 750);

elem.innerHTML = text[counter];

function change() {
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
  }
};
</script>
</body>
</html>
