	<?php include 'entete.php' ; 
	session_start();
  
  if (isset($_SESSION['pseudoclient'])) {
  	header('location:noter.php');
  }
	$val=true;
	if( isset($_REQUEST['valid'])) {
		if($_REQUEST['valid']=='false')
		{
			$val=false;
			
		}
	}
	

$tab= array('prenom' =>'','nom' =>'','mail' =>'','pwd' =>'','sexe' =>'' ,'dat' =>'','numero'=>'');
	if (isset($_SESSION['tab']))
		{
			$tab=$_SESSION['tab'];
			 session_destroy();
		}
	?>

<!--===================inscription=================-->

    	<form style="width:100%" id="frml" method="post" action="serveur.php?option=saveclient"  style="">
	    	<div  style="margin-left:55%;margin-bottom:2%; width:40%; padding-left:4%; padding-bottom:1%;  box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);" >
	    		<h1>Inscription</h1>
	    		<label for="prenom">Votre nom</label>
	    <?php
			echo'	<input type="text" name="prenom" placeholder="Votre Prenom" id="prenom" required="required" style="width:40%;float:left;margin-right:1%;" value="'.$tab['prenom'].'">';
			echo'	<input type="text" name="nom" placeholder="Votre Nom" required="required" style="width:39%" value="'.$tab['nom'].'">';
			echo'	<label for="mail">Adresse mail</label>';
			if ($val) {
				echo'	<input type="email" name="mail" id="email" placeholder="Adresse mail" id="mail" required="required" value="'.$tab['mail'].'" style ="border-color:black;">';
					}
			else
			{
				echo'	<input type="email" name="mail" id="email" placeholder="Adresse mail" id="mail" required="required" value="'.$tab['mail'].'" style ="border-color:red;" >';
			}
			echo'	<label for="pwd">Mot de passe</label>';
			echo'	<input type="password" id="pwd" name="pwd" placeholder="Mot de passe" required="required onchange="verif();>';
			echo'	<label for="conf">Confirmer votre mot de passe</label>';
			echo'	<input type="password" id="conf" name="conf" placeholder="confirmation" required="required" onchange="verifpass();" >';
			echo'	<label >Sexe</label>';

			echo'	<select name="sex" id="sex" >';
				if ($tab['sexe']=='Homme') {
					echo'<option value="Homme" selected>Homme</option>';
					echo'		<option value="Femme" >Femme</option>';
				}
				else
				{
					echo'<option value="Homme" >Homme</option>';
					echo'		<option value="Femme" selected>Femme</option>';
				}
		
			echo'	</select>';
			echo'	<label for ="phone">Telephone</label>';
			echo'	<input type="tel" id ="phone" name="phone" placeholder="Phone" value="'.$tab['numero'].'">';
			echo'	<button type="submit" style="margin-left:24%;">continuer</button> ';

		?>
	    	</div>
    	</form>
   
</body>
<style type="text/css">
	.reds{
		background-color: red;
	}
	.black{
		border-color: black;
	}
</style>
<script type="text/javascript">
	function verifpass () {
		var pwd=document.getElementById('pwd');
		var conpwd=document.getElementById('conf');
		if (pwd.value!=conpwd.value) {
			$('#conf').val('');
			alert('les mots de passes ne correspondent pas')	
		}
	}
</script>

<!--===================footer================-->
	<?php include "footer.php"; ?>
	
</html>
