
<?php
 session_start();
 	if (!isset($_SESSION['pseudo'])) {
 		header('location:connexion.php');
 		 	}

if (isset($_REQUEST['option'])) {
	if ($_REQUEST['option']=='ajoutok') {
		?>
		<script type="text/javascript">
				alert('Ce service a ete ajoute avec succes');
				setTimeout(relr,500);
			function relr() {
				location="Prestataire.php";
			}
		</script>
		<?php

	}
}

if (isset($_REQUEST['register'])) {
	if ($_REQUEST['register']=='ok') {
		?>
		<script type="text/javascript">
				alert('votre modication a ete bien enregistree');
		</script>
		<?php
	}
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Prestataire</title>
	<link rel="stylesheet" type="text/css" href="./../css/cssf.css">
	
	 <link rel="icon" href="./../image/logmin.png" sizes="32x32">
</head>
<body style="width:100%; height:100%; margin-left:0%;margin-top:0%;background-color: #f9f9f9;">
	<section style="background-color:#ffffff; width:25%;height:100%; border-right:solid; z-index:1;" id="borleft">
		<div style=" height:25%;margin-top:0%;width:100% ; " >
			<div class="inf"    style="float:left; margin:12% 0% 0% 10%;">
				<img src="<?php echo $_SESSION['photo'] ;?>" style="width:100%;height:100%;  ">
			</div>
			<div style="margin-left:36%; margin-top:15%; heigth:20%;position:absolute;">
				<span style="display:block; "><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'] ;?></span>
				<span><?php echo $_SESSION['pseudo'] ;?></span>
			</div>
			<?php if ($_SESSION['disponibilite']=='disponible') {
			?>
					<div id="dispo"  name="dispo" style="background-color:green; width:6%; height:3%; margin-left:35%;margin-top:36%; position:absolute;border-radius:100% 100% 100% 100%; float:left">
					</div>
					<label style="margin-left:45%;padding-top:36%" >disponible</label>
			<?php } 
					else
					{
			?>
					<div id="dispo"  name="dispo" style="background-color:red; width:6%; height:3%; margin-left:35%;margin-top:36%; position:absolute;border-radius:100% 100% 100% 100%; float:left">
					</div>
					<label style="margin-left:45%;padding-top:36%" >pas disponible</label>

			<?php }
			?>
					<ul class="dispo">
						<li><a href="serveur.php?option=chet&etat=disponible">disponible</a></li>
						<li> <a href="serveur.php?option=chet&etat=pasdisponible" >pas disponible</a></li>
					</ul>
					
		</div>

		
		<div class="menu" style="background-color:#37474f;height:100%;position:absolute; width:100%;">

			<ul>
			<li><a href="PrestataireAcc.php" style="font-size:1.2em; margin-bottom:5%"><img src="./../image/ser.png" style="width:6%;heigth:6%;"> Mes Services</a></li>
			<li><a href="Prestataire.php" style="font-size:1.2em; margin-bottom:5%"><img src="./../image/travail.png" style="width:6%;heigth:6%;"> Travaux</a></li>
			<li><a href="#" style="font-size:1.2em;margin-bottom:5%"><img src="./../image/par.png" style="width:6%;heigth:6%;"> Parametre</a></li>
			<li><a href="serveur.php?option=decon" style="font-size:1.2em;margin-bottom:5%" ><img src="./../image/deco.png" style="width:6%;heigth:6%;"> Deconnexion</a></li>
		</ul>

		</div>
	</section>
	<section id="bortop" style="width:75%;height:100%;margin-left:25%;z-index:0; ">
		<section style="width:100%;height:13%; background-color:#37474f; ">
			 <img src="./../image/logo.png" style="width:25%;height: 90%; margin-left: 4%" >
		</section>
		<section class="body" style=" width:100%;height:87%; overflow:scroll; ">

           <div id="trav" style="width:96%;height:100%; padding : 2% 1% 1% 3%; ">


  <!-- ==========================================Demandes de travail==========================================-->
 

           <a style="margin-bottom:3%; margin-left: 5%" class="men"  onclick="chopt('dem');"><img src="./../image/dem.png" style="width: 2%; height: 50%; margin-right: 1%">Liste de sollicitations</a>
<ul class="listtra" style="height: auto; margin-top: -2.99%;padding-top: 2%;  width:81% ; margin-left: 6%; background-color:  #37474f; " id="dem"> 
           <?php
						try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				               $requete="select * from travail,client where emailprest='".$_SESSION['pseudo']."' and accepter='non' and client.emailclient=travail.emailclient order by dates desc";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               $i=1;
				               while ($donnees = $reponse->fetch())
				                   {
               ?>
           			
           				<li style="width:96%;background-color:#90a4ae; height:20%;padding:1% 1% 1% 1%; margin-bottom: 4%	; margin-left: -2%">
           					<h3 style="width:102%;height:25%;margin-top:-2%; margin-left:-2%; background-color:white;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); padding-left:2%;font-weight:bolder;background-color: #e0f2f1;" >
           						<label style="float:left">Id demande  <?php echo $donnees['id'].' : '.$donnees['dates'];?></label>
           					 <label style="margin-left:75%;"> Etat : <?php echo $donnees['etat']?></label>
           					</h3>
           					<fieldset style="width:45% ;height:38%; float:left;margin-right:2%">
           						<legend>Contact Solliciteur</legend>
           						<label>Nom du Soliciteur : <?php echo $donnees['prenom'].' '.$donnees['nom']?></label>
           						<label>numero de telephone : <?php echo $donnees['telephone']?></label>
           						<label>Adresse e-mail : <?php echo $donnees['emailclient']?></label>
           					</fieldset>
           					<fieldset style="width:45%; height:38%">
           						<legend>Confirmation</legend>
           						<a href="serveur.php?option=rejettravail&donnee=<?php echo $donnees['id'];?>" class="button" style="background-color: #ef5350; width: 35%"> <img src="./../image/dislike.png" style="width: 12%; height: 40%;"> Decliner</a>
           						<a href="serveur.php?option=accepttravail&donnee=<?php echo $donnees['id'];?>" class="button" style="background-color: #1b5e20"> Accepter</a>
           					</fieldset>
           				</li>
           			
           				<?php
				                    } 
				               
				               	$reponse->closeCursor();
				            }catch(Exception $e)
				                 {
                    				die('Erreur : '.$e->getMessage());
                  				} 
                  }
                 catch (Exception $e)
                      {
                            die('Erreur : ' . $e->getMessage());
                      }

                            ?>
                 </ul>

               

   <!-- ==========================================travaux=================================================-->



               <a style="margin-bottom:3%; margin-left: 5%" class="men"  onclick="chopt('job');" ><img src="./../image/attente.png" style="width: 2%; height: 50%; margin-right: 1%">Liste de travaux en attente</a>
<ul class="listtra" style="height: auto; margin-top: -2.99%;padding-top: 2%;  width:81% ; margin-left: 6%; background-color:  #37474f;display: none; " id="job"> 
           <?php
						try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				               $requete="select * from travail,client where emailprest='".$_SESSION['pseudo']."' and accepter='oui' and client.emailclient=travail.emailclient and etat='en attente'";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               $i=1;
				               while ($donnees = $reponse->fetch())
				                   {
               ?>
           			
           				<li style="width:90%;background-color:#90a4ae; height:20%;padding:1% 1% 1% 1%;margin-bottom: 3%">
           					<h3 style="width:102%;height:25%;margin-top:-2%; margin-left:-2%; background-color:white;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); padding-left:2%;font-weight:bolder;background-color: #e0f2f1;" >
           						<label style="float:left">Id travail  <?php echo $donnees['id'].' : '.$donnees['dates']?></label>
           					 <label style="margin-left:75%;"> Etat : <?php echo $donnees['etat']?></label>
           					</h3>
           					<fieldset style="width:70% ;height:38%; float:left;margin-right:2%">
           						<legend>Contact Solliciteur</legend>
           						<label>Nom du Soliciteur : <?php echo $donnees['prenom'].' '.$donnees['nom']?></label>
           						<label>numero de telephone : <?php echo $donnees['telephone']?></label>
           						<label>Adresse e-mail : <?php echo $donnees['emailclient']?></label>
           					</fieldset>
           					<fieldset style="width:20%; height:38%">
           						<legend>Confirmation</legend>
           						<a href="serveur.php?option=validtravail&donnee=<?php echo $donnees['id'];?>" class="button" style="background-color:  #1b5e20; margin-top:3%"> Fait</a>
           					</fieldset>
           				</li>
           			
           				<?php
				                    } 
				               
				               	$reponse->closeCursor();
				            }catch(Exception $e)
				                 {
                    				die('Erreur : '.$e->getMessage());
                  				} 
                  }
                 catch (Exception $e)
                      {
                            die('Erreur : ' . $e->getMessage());
                      }

                            ?>
                 </ul>



  <!-- ==========================================Historiques==========================================-->

               
                 	<a style="margin-bottom:3%; margin-left: 5%" class="men"  onclick="chopt('his');"> <img src="./../image/history.png" style="width: 2%; height: 50%; margin-right: 1%"> Historique des travaux</a>
                 	<ul class="listtra" style="height: auto; margin-top: -2.99%;padding-top: 2%;  width:81% ; margin-left: 6%; background-color:  #37474f;display: none; " id="his"> 
           <?php
						try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				               $requete="select * from travail,client where emailprest='".$_SESSION['pseudo']."' and etat='fait' and client.emailclient=travail.emailclient ";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               $i=1;
				               while ($donnees = $reponse->fetch())
				                   {
               ?>
           			
           				<li style="width:90%;background-color:#90a4ae; height:20%;padding:1% 1% 1% 1%;margin-bottom: 3%">
           					<h3 style="width:102%;height:25%;margin-top:-2%; margin-left:-2%; background-color:white;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); padding-left:2%;font-weight:bolder;background-color: #1b5e20;" >
           						<label style="float:left">Id travail  <?php echo $donnees['id'].' : '.$donnees['dates']?></label>
           					 <label style="margin-left:75%;"> Etat : <?php echo $donnees['etat']?></label>
           					</h3>
           					<fieldset style="width:70% ;height:38%; float:left;margin-right:2%">
           						<legend>Contact Solliciteur</legend>
           						<label>Nom du Soliciteur : <?php echo $donnees['prenom'].' '.$donnees['nom']?></label>
           						<label>numero de telephone : <?php echo $donnees['telephone']?></label>
           						<label>Adresse e-mail : <?php echo $donnees['emailclient']?></label>
           					</fieldset>
           					<fieldset style="width:20%; height:38%;visibility: hidden;">
           						<legend>Confirmation</legend>
           						<a href="serveur.php?option=validtravail&donnee=<?php echo $donnees['id'];?>" class="button" style="background-color:  #1b5e20; margin-top:3%;"> Fait</a>
           					</fieldset>
           				</li>
           			
           				<?php
				                    } 
				               
				               	$reponse->closeCursor();
				            }catch(Exception $e)
				                 {
                    				die('Erreur : '.$e->getMessage());
                  				} 
                  }
                 catch (Exception $e)
                      {
                            die('Erreur : ' . $e->getMessage());
                      }

                            ?>
                 </ul>
             <?php include 'footer.php'; ?>  
           </div>
          

		</section>

	
	</section>

	<script type="text/javascript">

			 function chopt(ele)
			 {
			 	switch (ele)
			 	{
			 		case 'dem':
			 			document.getElementById('dem').style.display="block";
			 			document.getElementById('job').style.display="none";
			 			document.getElementById('his').style.display="none";
			 			break;
			 		case 'job':
			 			document.getElementById('dem').style.display="none";
			 			document.getElementById('job').style.display="block";
			 			document.getElementById('his').style.display="none";
			 		break;
			 		case 'his':
			 		 document.getElementById('dem').style.display="none";
			 			document.getElementById('job').style.display="none";
			 			document.getElementById('his').style.display="block";
			 		break;

			 	}
			 	
			 }
	


	</script>
	</body>
	</html>
		
