<?php
session_start();
	if (!isset($_SESSION['tab'])) {
		header('location:inscription.php');
	}
 include 'entete.php' ;
 ?>


<form action="serveur.php?option=photo" method="post" id="frml" enctype="multipart/form-data">
<div style="width:92%; height:100%; margin-left:4%; margin-top:1%;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); " class="co">     
	<div style="width:40%;height:90%; padding-left :2% ;margin-left:2%;height:100%;" >
		
		<H3>Contact</H3>   
		 <label>Ville</label>   
		 <select name="ville" onchange="" id="">
		 		<option value="Bakel">Bakel</option>
				<option value="Bargny">Bargny</option>
				<option value="Bignona">Bignona</option>
				<option value="Cap-Skirring">Cap-Skirring</option>
				<option value="Dagana">Dagana</option>
				<option value="Dakar">Dakar</option>
				<option value="Diourbel">Diourbel</option>
				<option value="Elinkine">Elinkine</option>
				<option value="Enampore">Enampore</option>
				<option value="Fatick">Fatick</option>
				<option value="Gorée">Gorée</option>
				<option value="Guédé">Guédé</option>
				<option value="Guediawaye">Guediawaye</option>
				<option value="Iwol">Iwol</option>
				<option value="Joal-Fadiouth">Joal-Fadiouth</option>
				<option value="Kaolack">Kaolack</option>
				<option value="Karabane">Karabane</option>
				<option value="Kayar">Kayar</option>
				<option value="Kébémer">Kébémer</option>
				<option value="Kédougou">Kédougou</option>
				<option value="Kolda">Kolda</option>
				<option value="Louga">Louga</option>
				<option value="Matam">Matam</option>
				<option value="Mbacké">Mbacké</option>
				<option value="Mbour">Mbour</option>
				<option value="Mlomp">Mlomp</option>
				<option value="Ngor">Ngor</option>
				<option value="Nguenienne">Nguenienne</option>
				<option value="Nianing">Nianing</option>
				<option value="Ourossogui">Ourossogui</option>
				<option value="Oussouye">Oussouye</option>
				<option value="Pikine">Pikine</option>
				<option value="Podor">Podor</option>
				<option value="Popinguine">Popinguine</option>
				<option value="Richard Toll">Richard Toll</option>
				<option value="Rosso">Rosso</option>
				<option value="Rufisque">Rufisque</option>
				<option value="Saint-Louis">Saint-Louis</option>
				<option value="Saly-Portudal">Saly-Portudal</option>
				<option value="Sédhiou">Sédhiou</option>
				<option value="Somone">Somone</option>
				<option value="Tambacounda">Tambacounda</option>
				<option value="Thiès">Thiès</option>
				<option value="Tivaouane">Tivaouane</option>
				<option value="Touba">Touba</option>
				<option value="Toubab Dialaw">Toubab Dialaw</option>
				<option value="Ziguinchor<">Ziguinchor</option>
		 </select>
		 <label>Adresse complet</label>   
		 <input type="text" placeholder="Adresse" style="width:80%" name="adresse" id="address" onchange="codeAddress();" required="required">  
		 
		<label for="photo">Photo</label>
		<input type="file" style="display:none; " name="photo" id="photo" onchange="verif();">

		<label for="photo" style="width:100%; margin-top:2%;"  >
		<div style="width:34%; height:200px; border: dashed; z-index:1000">

			<?php 
			echo '<img id="tof" src="'.$_SESSION['nom'].'" >';
			?>
		</div>
		</label>
		<br/>
		<br/>  
	</div>     
	<div  style=" width:48%;height:200px;"> 
		 <div id="map" style="border:dashed; width:80%;height:200%">
		 	
		 </div>
	</div>
	<button type="submit" style="margin-bottom:2%; margin-left:58%" formaction="serveur.php?option=enregistrer1">terminer</button> 

</div>
</form>
<script type="text/javascript">
	function verif()
	{
		document.getElementById('frml').submit();
	}
</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVzvRPvu4G0PhG9qHqZcMSuTYk4pMSVQ" async defer></script>

<script type="text/javascript" src="./../js/map.js"></script>

<style type="text/css">
	.co div
	{
		display: inline-block;
	}
	img
	{
		width: 100%;
		height: 100%;
	}
</style>
<?php include "footer.php"; ?>


