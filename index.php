<style>
table, th, td {
  	border: 1px solid black;
  	border-collapse: collapse;
	}
</style>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('default_charset', "utf-8");
error_reporting(E_ALL);

$page = 1;
if (isset($_GET["page"])) if ($_GET["page"]!= 0) $page = $_GET["page"];

echo $page;
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL,"https://www.arquipelagos.pt/wp-json/wp/v2/imagem?page=" . $page);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
$data = curl_exec($ch);
curl_close($ch);

$pattern = '/\{\"id\"\:.*?\]\}\}/';

preg_match_all($pattern, $data, $matches);
//echo "Tamanho:" . sizeof ($matches [0]) . "<BR>";
for ($i = 0; $i < sizeof ($matches [0]); $i++) 
{
    $match = $matches[0][$i];
    $obj = json_decode($match, true);

    //echo "Slug: " . $obj["slug"] . "<BR>";
    //echo "Guid: " . utf8_decode($obj["guid"]["rendered"]) . "<BR>";
    //echo "Link: " . $obj["link"] . "<BR>";
   

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_URL,$obj["link"]);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
	$data1 = curl_exec($ch);
	curl_close($ch);
	//$data1 = utf8_decode($data1);
	preg_match ('/\<img src\=\"(.*?)\" class\="card\-img mb\-2\"/', $data1, $imagem);

	echo "<table><tr><td>";
  	echo "#" . $i;
	echo "</td><td>";
	echo "id: " . $obj["id"];
	echo "</td></tr><tr><td>";
	echo "Data: " . $obj["date"] . " (modificado em " . $obj["modified"] . ")<BR>";
	echo "</td><td>";
	echo "Título: " . $obj["title"]["rendered"] . "<BR>";
	echo "</td></tr><tr><td>";
	echo "<a href=\"" . $imagem[1] . "\"> 
			<img src=\"" . $imagem[1] . "\" style=\"width:200px;height:auto;\" alt=\"Image\" >
		  </a>";
	echo "</td><td>";
	echo "Conteúdo: " . $obj["content"]["rendered"] . "<BR>";
	echo "</td></tr></table>";

	//echo utf8_decode($data1);

}
echo "<BR><BR><BR>";
echo "<a href=\"index.php?page=1\">Primeira página</a>     <a href=\"index.php?page=" . ($page - 1) . "\">Página anterior</a>     <a href=\"index.php?page=" . ($page + 1) . "\">Página seguinte</a>";

?>
