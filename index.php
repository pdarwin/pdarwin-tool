<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Darwin-Tool</title>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 3px solid #008CBA;
}
div {text-align: center;}
</style>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<div>
<form action=\"login.php\" method=\"POST\">
	<button class=\"button button2\" type=\"submit\" formaction=\"login.php?login=" . $_GET["login"] . "&pass=" . $_GET["pass"] . "\">Entrar</button>
</form>
</div>"





?>
</body>
</html>
