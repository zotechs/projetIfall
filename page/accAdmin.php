<?php
  session_start();
  
	include 'entete.php';
?>
<style type="text/css">
body
{
	width: 100%;

}
label ,input,button
{
	display: block;
	margin-top: 4%;
}
input,button
{
	width:90%;

}
input:focus{
	border-color: blue;
}

a{
	text-decoration: none;
	color:blue;
}
.con div
{
		border-radius: 5px 5px 5px 5px;
		border: solid 1px silver;
}
</style>

<form class="con" method="post" action="serveur.php?option=admin" style="margin-left:37%;width:50%;margin-top:1%; margin-bottom:7% ">
	<img src="./../image/user.png" style="margin-left: 18%;">
	<h1 style="font-size: 24px;font-weight: bolder;letter-spacing: -0.5px; margin-left:6%; ">Administrateur GoorGoorlu</h1>
	<div style="border:solid 1px silver; width:50%; padding-left:4%;padding-top:2%;padding-bottom:3%;background-color:white;">
		<label for="pseudo">Pseudo l</label>
		<input type ="email" required="required"id="pseudo" name="pseudo" placeholder="Pseudo">
		<label for="pwd" style=""> Mot de passe</label > 
		<input type="password" required="required" id="pwd" name="pwd" placeholder="Mot de passe" style="width: 90%">
		<?php
			if (isset($_REQUEST['option'])) {
				if ($_REQUEST['option']=='pwd') {
					echo '<label style=" color:red; font-size:0.8em;"> verifier vos saisies</label>';
				}
			}
		?>
		<button type="submit" >connexion </button>
	</div>
</form>

<?php
include 'footer.php'
?>