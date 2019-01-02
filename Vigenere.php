<html>
<head>
	<title>Vigenere</title>
</head>
<body>
	<form method = "POST" action = "#">
		Texto: <input type = "text" name = "text" id = "text"><br><br>
		Chave: <input type = "text" name = "chave" id = "chave"><br><br>
		<input type="radio" name="crip" value="crip">C
		<input type="radio" name="crip" value="decrip">D<br><br>
		<input type = "submit" value = "submit"><br>
	</form>
</body>
</html>

<?php
if (!empty($_POST["text"]) && !empty($_POST["chave"]) && !empty($_POST["crip"])) {

	$lp = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
	$fliped = array_flip($lp);

	$texto = $_POST["text"];
	$chave = $_POST["chave"];
	$crip = $_POST["crip"];

	$ch = str_split($chave);
	$texto = strtolower($texto);
	$texto = str_replace(" ","",$texto);
	$array = str_split($texto, count($ch));
	$lc = [];
	$result = [];
	$stringArrayF = "";
	$c = 0;

	for ($i = 0; $i < count($array); $i++) { 
		$string = $array[$i];
		$arr = str_split($string);

		if ($crip == "crip") {
			for ($a=0; $a < count($arr); $a++) { 
				$lc = ($fliped[$arr[$a]] + $fliped[$chave[$a]]) % 26;
				$result[] .= $lc;
			}
		}
		if ($crip == "decrip") {
			for ($a=0; $a < count($arr); $a++) { 
				$lc = ($fliped[$arr[$a]] - $fliped[$chave[$a]]) % 26;
				$result[] .= $lc;

				if ($result[$c] < 0) {
					$result[$c] = $result[$c] + 26;
				}
				$c++;
			}
		}
	}
	for ($b = 0; $b < count($result); $b++) { 
		$x = $result[$b];
		$result[$b] = $lp[$x];
	}
	foreach ($result as $stringArray)
	{
		$stringArrayF = $stringArrayF.$stringArray;
	}
	echo "$stringArrayF";
}
?>