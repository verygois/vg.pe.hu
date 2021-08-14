<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']

$fp = fopen('i_notice.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$title, $category]);
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>i notice</title>
<style type="text/css">
.refine input {display: none;}
.refine {margin:1rem; clear:both;}
.refine-btn {
  font-size: 1rem;
  border:solid 0.01rem;
  display:inline-block;
  margin: 0.1rem;
  padding: 0.25rem 0.5rem;
  cursor:pointer;
}
.refine-btn:hover {font-style:oblique;}
#refine-1:checked ~ .refine-teims:not(.a),
#refine-2:checked ~ .refine-teims:not(.b),
#refine-3:checked ~ .refine-teims:not(.c),
#refine-4:checked ~ .refine-teims:not(.d),
#refine-5:checked ~ .refine-teims:not(.e),
#refine-6:checked ~ .refine-teims:not(.f) {
  display: none;
}

a {color:red; text-decoration:none; margin-left:1vw; padding:0.25vw 0.5vw; border: 1px solid;}
b, u {font-weight: normal; font-size:125%;}
hr {clear:both; border:none;}

.title {padding:1rem 0; text-align:center; font-family: 'Yu Gothic' , YuGothic, sans-serif ;}

#contents {
  float: left;
  font-size: 2.5rem;
  line-height: 1rem;
  width: auto;
  height: auto;
  padding: 1rem;
  font-family: 'Times New Roman';
}
</style>
</head>
<body>

<div class="refine">
  <input  id="refine-1" type="radio" name="refine-btn">
  <label class="refine-btn a" for="refine-1">A</label>
  <input id="refine-2" type="radio" name="refine-btn">
  <label class="refine-btn b" for="refine-2">B</label>
  <input id="refine-3" type="radio" name="refine-btn">
  <label class="refine-btn c" for="refine-3">C</label>
  <input id="refine-4" type="radio" name="refine-btn">
  <label class="refine-btn d" for="refine-4">D</label>
  <input id="refine-5" type="radio" name="refine-btn">
  <label class="refine-btn e" for="refine-5">E</label>
  <input id="refine-6" type="radio" name="refine-btn">
  <label class="refine-btn f" for="refine-6">F</label>
  <input id="refine-0" type="radio" name="refine-btn" checked>
  <label class="refine-btn all" for="refine-0">ALL</label>
<hr/>

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="contents" class="refine-teims <?=h($row[1])?>">
<p><b><?=h($row[0])?></b></p>
</div>
<?php endforeach; ?>
<?php else: ?>
<hr/>
<p class="title"><u>empty</u></p>
<?php endif; ?>
<hr/>
<p class="title">今なんで本当のことを言えなかったのかって考えてる。繰り返し、同じことを言い続けてる。全部おれが知ってた知ってること。知ってるし。</p>
</div>
</body>
</html>
