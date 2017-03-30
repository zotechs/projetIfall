
	<style type="text/css">
	p{
    font-size:14px;
	font-family: sans-serif;
	}
	.trd {
		margin-left: 28%;
		padding-top: 1%;
		padding-left: 4%;
		padding-right: 4%;
		padding-bottom: 4%;
		border-radius: 4px;
		width: 40%;
		margin-top: 3%;
		box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);
	}
	input.valider{
		width: 100%;
		margin-top: 4%;
		border-radius: 10px;
		background-color:#2F4F4F;
		color:white;
		height: 7%
	}
	textarea{
		width: 100%;
	}
	p+input{
	width: 100%;	
	}

body
{

		 	background-color: #f9f9f9;
}


	</style>

<h2 style="margin-left: 39%">Consulter Le Prestatire </h2>	
<div  class="trd" style="border:solid black 1px; margin-bottom: 2%">


<?php
		echo '<form action="serveur.php?option=choisir&mail='.$_REQUEST['email'].'&service='.$_REQUEST['service'].'" method="post">';
						

               		echo '<p>Adresse Email du prestataire</p>';
					echo '<input value='.$_REQUEST['email'].' disabled >';
					echo '<p>Service</p>';
					echo '<input value='.$_REQUEST['service'].' disabled>';
					echo '<p>Details</p>';
					echo '<textarea name="detailler"  required></textarea>';
					echo '<input class="valider" type="submit" value="valider"  >';
               
	
?>
</form>
</div>

