<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TESTE</title>
</head>
<body>
<form method="POST">
	<select name="select">
  <option value="nome">Nome</option>
  <option value="id">ID</option>
  <input type="text" name="pesquisa">
  <input type="submit" value="OK">
</select>
</form>
</body>
</html>
<?php


echo $_POST['select'];
echo $_POST['pesquisa'];


?>