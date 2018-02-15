<!DOCTYPE html>
<html>
<head>
	<title>Rss Reader</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>RSS Reader</h2>
	<p>Songs from yutube chanell</p>
	<div class="container">
<?php

$fajl = file_get_contents('https://www.youtube.com/feeds/videos.xml?playlist_id=PLUg_N7ZopzUUhadbN2YE-c9Yxa4pBx_gS');

$xml = new SimpleXMLElement($fajl);

?>
<div id="naslov"><strong class="naslov1">Play lista : </strong> <?= $xml->title;?> </div><br><hr>

<form method="POST">
<select name="pjesma">
<option value="default">Choose song...</option>;

<?php
		foreach ($xml->entry as $naziv) {
				 	 $vid =$naziv->link['href'];
		    		$p = str_replace("https://www.youtube.com/watch?v=","","$vid");
		    		echo "<option value='{$p}'>".$naziv->title."</option>";
		    		};
?>

</select>
<input type="submit" id="btn" name="sub_btn" value="Play song"><br><hr>
</form>
<div style="text-align: center;">


<?php
 if (isset($_POST['pjesma']) && $_POST['sub_btn'] !== 'default') {
 	echo "<iframe 
	width='400'
	height='250'
	src='https://www.youtube.com/embed/".$_POST['pjesma']."'
	frameborder='0'
	allowfullscreen></iframe>";
};
?>
</div>
</div>
</body>
</html>



