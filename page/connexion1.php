<?php
  session_start();
if (isset($_SESSION['pseudoclient'])) {
	header('location:noter.php');
}

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
<?php
	if (isset($_REQUEST['option'])) {
		if ($_REQUEST['option']=='justsinup') {
			echo '<div style="background-color:green; width: 30%;text-align:center; margin-left:33%;padding-top:0.5%;padding-bottom:0.5%;">Votre Enregistrement a bien Reussi </div>';
		}
	}
?>

<form class="con" method="post" action="serveur.php?option=acces_client2" style="margin-left:37%;width:50%;margin-top:1%; margin-bottom:7% ">
	<img src="./../image/user.png" style="margin-left: 18%;">
	<h1  style="font-size: 24px;font-weight: bolder;letter-spacing: -0.5px; margin-left:18%; "> Solliciteur</h1>
	<div style="border:solid 1px silver; width:50%; padding-left:4%;padding-top:2%;padding-bottom:3%;background-color:white;">
		<label for="pseudo">Pseudo ou Email</label>
		<input type ="email" required="required"id="pseudo" name="pseudo" placeholder="Adresse email">
		<label for="pwd" style="float:left;"> Mot de passe</label > <label style=" margin-left:36%; letter-spacing:-0.5px; font-size:0.8em;"><a href="#">Mot de pass oublie?</a></label>
		<input type="password" required="required" id="pwd" name="pwd" placeholder="Mot de passe">
		<?php
			if (isset($_REQUEST['option'])) {
				if ($_REQUEST['option']=='pwd') {
					echo '<label style=" color:red; font-size:0.8em;"> verifier vos saisies</label>';
				}
			}
		?>
		<input type="checkbox" name="" style="float: left; margin-left: 0%; width: 10%;">
		<label>Rester connecter</label>
		<button type="submit" >connexion </button>
	</div>
	<div style="border:solid 1px silver; width:52%; padding-left:2%;padding-top:1%;padding-bottom:2%; margin-top:1.5%; ;background-color:white;">
		<label>Nouveau Solliciteur? <a href="inscription1.php">S'inscrire</a></label>
	</div>
</form>

<?php
include 'footer.php'
?>