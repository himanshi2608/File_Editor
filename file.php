<?php 
	if(isset($_POST['submit'])){
		$f = $_POST['file1'];
		$str = $_POST['search'];
		$handle = file_get_contents($f,NULL); 
$a=$str; 
$a=str_replace(",","",$a); 
$a=explode(" ",$a); 
$c=0; 
foreach($a as $y){ 
if (stristr($handle,"$a[$c]")) $b[]= 'yes'; 
else $b[]='no'; 
$c++; 
} 
// echo $c; 
if (in_array("no",$b)) echo 'did not match'; 
else echo 'we have a match';
	}
 ?>
 <!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post">
			file:<input type="file" name="file1">
			search:<input type="text" name="search">
			replace:<input type="text" name="">
			<input type="submit" name="submit">
		</form>
	</body>
	</html>