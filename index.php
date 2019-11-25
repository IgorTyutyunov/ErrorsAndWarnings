<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
echo "A) 1 Warning >> 2 Warnings <br>";
echo "B) 2 Warnings >> 1 Error<br>";
echo "C) 2 Errors >> ничего нового не получаем<br>";

?>
<h3>Узнай, какое количество шагов придётся сделать, чтобы Петя смог избавиться от ошибок и предупреждений.</h3>
<form name"formFixed" action="index.php" method="post">
<br>Количество фатальных ошибок:<br>
<input name="textError" type="text" size="5">
<br>Количество предупреждений:<br>
<input name="textWarning" type="text" size="5">
<br>
<input name="submitDiscover" type="submit" value="Узнать !">
</form>
<?php 
include_once "functionFixErrorAndWarning.php";
if(isset($_POST['submitDiscover'])){
	$er=$_POST[textError];
	$war=$_POST[textWarning];
	if((is_numeric($er)&&is_numeric($war))&&($er>=0 && $war>=0)){
		$arr=fixErrorAndWarning($er,$war);
		if($arr!=-1){
			echo "Ошибок: ".$er."<br>";
			echo "Предупреждений: ".$war."<br>";
			echo "Количество шагов, за которое можно исправить ошибки и предупреждения: ".$arr[0]."<br>";
			echo "A*$arr[4]>>B*$arr[1]>>С*$arr[2]>>$arr[3]"."<br>";
		}
		else 
			echo "Пете невозможно избавиться от ошибок и предупреждений: ".$arr;
	}
	else
		echo "Введены некорректные данные";
}
?>
</body>
</html>