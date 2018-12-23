<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trabalho de LP2</title>
<style type="text/css">
body {
background-color: #363E4A;
font-family: Helvetica, Arial, sans-serif;
font-size: 16px;
color: #ffffff;
line-height: 1.5;
}

h1 {
  font-weight: 400;
  font-size: 24px;
  color: rgba(255, 255, 255, 0.4);
  text-align: center;
}

form {float:left;}
form input[type=number]{border: 6px solid #000; border-radius: 6px;}
form input[type=submit]{border: 6px solid green; border-radius: 6px; background: green; color: #fff; cursor: pointer; }

table {padding: 3em; border-spacing: 0.9em;}

table td {font-weight: bold;  padding: 20px; border: 2px solid #000; border-radius: 0.5em;}

em {text-decoration: underline;}

fieldset {
  width: 300px;
  font-size: 1em;
  border: 2px solid #000;
  padding: 2em;
  border-radius: 0.5em;
}

legend {
  color: #fff;
  background: #000;
  padding: 0.25em 1em;
  border-radius: 1em;
}

</style>
</head>
<body>
  <h1>Gerar Tabela em PHP</h1>
  <form class="form" action="#">
    <fieldset>
    <legend>Elaboração de Tabelas</legend>
    <label>Linhas: </label><input type="number" name="linha">
    <br><br>
    <label>Colunas: </label><input type="number" name="coluna">
    <br><br>
    <input type="submit" name="btn" value="Mostrar">
    </fieldset>
  </form>

<table>
<?php

if (isset($_REQUEST['btn'])) {

$linha = $_REQUEST['linha'];
$coluna = $_REQUEST['coluna'];

echo "<h1>Olá, Você <em>pediu $linha Linha(s) e $coluna Coluna(s)</em>.</h1>";

for ($x=1; $x <= $linha ; $x++) { 
echo "<tr>";
	for ($y=1; $y <= $coluna ; $y++) { 
	echo "<td>$y . $x</td>";
}
echo "</tr>";
}

}
?>


</table>

</body>
</html>
