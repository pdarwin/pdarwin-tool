<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Wikimedia</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  width: 200px;
}
div {text-align: center;}
</style>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$endPoint = "https://commons.wikimedia.org/w/api.php";
include './bin/api.php';
loginAPI($_GET["login"], $_GET["pass"]);

if (isset($_POST['action']))
	{
	switch ($_POST['action']) 
		{
            case 'verify':
                echo "O seu utilizador é:" . userinfoAPI ($_GET["login"])["query"]["userinfo"]["name"];
                break;
            case 'select':
                select();
                break;
        }
    }

/*echo "<div>
<form action=\"login.php\" method=\"POST\">
	<button class=\"button button2\" type=\"submit\" formaction=\"login.php\" value=\"verify\" data-toggle=\"modal\" data-target=\"#myModal\">Verificar utilizador</button>
</form>
</div>";*/

?>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="button button2" data-toggle="modal" data-target="#myModal">
  	Verificar utilizador
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <p>
          	<?php 
          		echo "O seu utilizador é:" . userinfoAPI ()["query"]["userinfo"]["name"];
          	 ?>
          </p>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div>
	<form action="arq.php" method="POST">
		<button class="button button2" type="submit" formaction="arq.php">Arquipelagos</button>
	</form>
</div>
</body>
</html>
