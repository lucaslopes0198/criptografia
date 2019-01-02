<html>
<head>
	<title>Cifra de Cezar</title>
</head>
<body>
	<form name ="cript" action="#" method="POST">
		Texto: <input type="text" name="texto" id="texto">
		<input type="submit" value="Submit">
		<br><br>
		Chave: 
		<select name="ch">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
		</select>
		<br><br>
		<input type="radio" name="crip" value="crip">Criptografar<br>
		<input type="radio" name="crip" value="decrip">Descriptografar<br>
		<br>
	</form>
</body>
</html>

<?php
if (!empty($_POST["texto"]) && !empty($_POST["crip"])) {

	$lp = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$fliped = array_flip ($lp);
	$texto = $_POST["texto"];
	$texto = strtolower($texto);
	$texto = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $texto));
	$texto2 = str_split($texto);
	$crip = $_POST["crip"];
	$result = array();
	$ch = $_POST["ch"];
	$lc = array();

	$a = 0;
	if ($crip == "crip") {
		while ($a < count($texto2)) {
			if ($texto2[$a] == " ") {
				$result[] = " ";
				$a++;
			}
			$lc = ($fliped[$texto2[$a]] + $ch) % 26;
			$result[] .= $lc;
			$a++;
		}
	}

	if ($crip == "decrip") {
		while ($a < count($texto2)) {
			if ($texto2[$a] == " ") {
				$result[] = " ";
				$a++;
			}
			$lc = ($fliped[$texto2[$a]] - $ch) % 26;
			$result[] .= $lc;

			if ($result[$a] < 0) {
				$result[$a] = $result[$a]+26;
			}
			$a++;
		}
	}
	$b = 0;
	while ($b < count($result)) {
		if ($result[$b] == " ") {
			$result[$b] = " ";
			$b++;
		}
		else{
			$x = $result[$b];
			$result[$b] = $lp[$x];
			$b++;
		}
	}

	$stringArrayF = "";
	foreach ($result as $stringArray)
	{
		$stringArrayF = $stringArrayF.$stringArray;
	}
	echo "$stringArrayF";
}
?>