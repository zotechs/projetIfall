<div>
<?php
if (isset($_REQUEST["aff"]))
{
	if ($_REQUEST["aff"]=='false') {
		include 'solliciter.php';
	}
	else{
		if ($_REQUEST["aff"]=='res') {
				#code...
		} else {
			if ($_REQUEST["aff"]=='djaajout') {
					?>
		<script type="text/javascript">
			alert('Vous avez deja Assigne Une tache a ce prestataire');
			setTimeout(relr,500);
			function relr() {
				location="noter.php?aff=ok";
			}
		</script>
			<?php
			} else {
			
	
	echo "<div class='tag1'  >";
	echo "<form action='serveur.php?option=rech2' method='post' id='recherche1'>";
	echo "Proximite <input type='checkbox' name='tri[]' value='zone_couverture' style='width:2%'/>";
	echo "Taux de satisfaction<input type='checkbox' name='tri[]' value='note'  style='width:2%'/>";
	echo " Disponibilite<input type='checkbox' name='tri[]' value='disponibilite' style='width:2%' />";
	echo "<input type='submit' class='bouton' value='trier' style='margin-left:0%;width:14%;padding:0.7%'/>";
	echo "</form>";
	echo "</div>";
	echo '<br><br>';
	?>

	<h3 style="vertical-align: bottom; margin-top: -2%" ><img src="./../image/rech.png" style="width: 3%; height: 6%; margin-left: 5%; margin-right: 2%;  vertical-align: middle; ">Résultat de la recherche</h3>
	<?php
	$tab = array();
	$fichier=fopen("liste.txt", "r");
	$line="";
	while(!feof($fichier))
	{
		$line = $line."".fgets($fichier);
	}
	$tab=explode("//", $line);
	if($line==""){
		?>
		<h1 style="width: 100%; text-align: center;  %">!!! Aucun Résultat n'est trouvé</h1>
		<?php
	}
	for ($i=0;$i<count($tab);$i++)
	{
		echo $tab[$i];
	}
}

}
}
}
?>




</div>