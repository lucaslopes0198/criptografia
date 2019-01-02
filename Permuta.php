<html>
<head>
	<title>Permuta</title>
</head>
<body>
	<form method = "POST" action = "#">
		Texto: <input type = "text" name = "text" id = "text">
		<input type = "submit" value = "submit"><br>
		<input type="radio" name="crip" value="crip">C
		<input type="radio" name="crip" value="decrip">D<br><br>
	</form>
</body>
</html>

<?php
if (!empty($_POST["text"]) && !empty($_POST["crip"])) {
	$texto = $_POST["text"];
	$crip = $_POST["crip"];
	$texto = str_replace(" ","",$texto);
	$array = str_split($texto, 4);

	echo "<br>";
	$stringArrayF = "";
	$stringArrayF2 = "";
	$i=0;

	while ($i < count($array)) {

		$partString = $array[$i];
		$partArray = str_split($partString);

		if ($crip == "decrip") {
			$chave = [2,0,3,1];
		}
		if ($crip == "crip" || count($partArray) < 4) {
			$chave = [1,3,0,2];
		}
		if (count($partArray) == 4) {
			$cripto = [$chave[0] => $partArray[$chave[0]], $chave[1] => $partArray[$chave[1]], $chave[2] => $partArray[$chave[2]], $chave[3] => $partArray[$chave[3]]];
		}
		if (count($partArray) == 3) {
			unset($chave[1]);
			$str = implode("", $chave);
			$chave = str_split($str);
			$cripto = [$chave[0] => $partArray[$chave[0]], $chave[1] => $partArray[$chave[1]], $chave[2] => $partArray[$chave[2]]];
		}
		if (count($partArray) == 2) {
			unset($chave[1]);
			unset($chave[3]);
			$str = implode("", $chave);
			$chave = str_split($str);
			$cripto = [$chave[0] => $partArray[$chave[0]], $chave[1] => $partArray[$chave[1]]];
		}
		if (count($partArray) == 1) {
			$chave = [0];
			$cripto = [$chave[0] => $partArray[$chave[0]]];
		}
		foreach ($cripto as $stringArray) {
			$stringArrayF = $stringArrayF.$stringArray;
		}
		$i++;
	}
	echo "<br>";
	echo "$stringArrayF";
}
?>