
<?php
 session_start();
 	if (!isset($_SESSION['pseudo'])) {
 		header('location:connexion.php');
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
		<div style=" height:25%;margin-top:0%;width:100% ;" >
		
			<div class="inf"    style="float:left; margin:12% 0% 0% 10%;">
				<img src="<?php echo $_SESSION['photo'] ;?>" style="width:100%;height:100%; ">
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
			 <img src="./../image/logo.png" style="width:25%;height: 90%; margin-left: 4%;" >
		</section>
		<section class="body" style=" width:100%;height:87%; overflow:scroll; ">
		<div id="serv" style="width:96%;height:100%; padding : 2% 1% 1% 3%; display: block; ">
			   <a id="bch"  class="button" style="margin-bottom:2%; width: 20%; " onclick="change();">
			   <img src="./../image/ajout.png" style="width: 6%; height: 40%; margin-right: 2%">Ajouter un Service
			   </a>
			<div id="lis" style="">
				<?php
						try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				               $requete="select * from service_prest where emailprest='".$_SESSION['pseudo']."' order by note desc";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               $i=1;
				               while ($donnees = $reponse->fetch())
				                   {
				                   	$op ="serveur.php?option=modifser&num=$i&ser=".$donnees['nom'];
				                   	$t="tar$i";
				                   	$z="zone$i";
				                   	$n="n$i"
               ?>
               				                   	
               	<form method="post"  action="<?php echo "$op";?>" style="padding-bottom:0.5%; width:98%;background-color:white;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);padding-top:0.2%;margin-bottom:2%;background-color: #37474f;">
					<h2 style="width:99%;height:6%; background-color:white;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); padding-left:2%;font-weight:bolder;background-color: #e0f2f1; margin-top: -1%;" name="<?php echo $n;?>" > <?php echo $donnees['nom'];?></h2>
					<fieldset style="width:90%;margin-left:4% ; border-radius:5% 5% 5% 5%;border:none; color:white;margin-top:2%;margin-bottom:2%" >
						<label style="">Description</label>
						<label style="font-weight:normal; font-size:0.9em; margin-top:1%;margin-bottom:1%"><?php echo $donnees['description'];?></label>
						<label style="float:left">Note : </label> <label style="color:#00e676; margin-left:2%; float: left"><?php echo $donnees['note'];?></label>
						<label style="margin-left:30%;margin-right:2%;float:left">tarif :</label>
						<input        onchange="modifier('<?php echo $i;?>')"  name="<?php echo $t;?>" id="note" style="color:#00e676; margin-left:2%; border:none; width:5%;font-weight:bolder;margin-bottom:1%; margin-top:-0.5%;" value="<?php echo $donnees['tarif'];?>" type="number" >
						<label style="float:left">zone de couverture</label>
						<select name="<?php echo $z;?>" id="zone" style="border:none; width:10%; margin-left:20%; margin-top:-0.5%;float: left;" onchange="modifier('<?php echo $i;?>')" >
								<option value="<?php echo $donnees['zone_couverture'];?>" selected> <?php echo $donnees['zone_couverture'];?></option>
								<option value="Bakel" >Bakel</option>
								<option value="Bargny">Bargny</option>
								<option value="Bignona">Bignona</option>
								<option value="Cap-Skirring">Cap-Skirring</option>
								<option value="Dagana">Dagana</option>
								<option value="Dakar" >Dakar</option>
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
							<?php
								$d="serveur.php?option=supp&num=$i&ser=".$donnees['nom'];
							?>
						<a href="<?php echo $d;?>"  style="margin-left: 70%; background-color: red; text-align: center; width: 12%; " id="<?php echo "bt".$i;?>" onclick=""><img src="./../image/sup.png" style=" width: 16%; height: 50%"> Supprimer</a>
					</fieldset>	
					<div id="<?php echo $i;?>" name="b"  style="display: none;">
						<a href="" class="button" style="float:left; margin-left:55%; " onclick="annuler();"> Annuler</a>
						<button type="submit" style="margin-left:3%; margin-bottom:1%; width: 20% "  ><img src="./../image/mod.png" style="width: 12%; height: 40% ;margin-right: 5%; ">Modifier</button>

					</div>
               	</form>

               				                   
               <?php
                 $i++;
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
			</div>		
            <script type="text/javascript">
	            	function modifier(ele)
	            	{
	            			document.getElementById(ele).style.display="block";
	            			var btn='bt'+ele;
	            			document.getElementById(btn).style.display="none";
	            	}
	            	function annuler()
	            	{
	            		document.reload;
	            }
            </script>



					
              

            <div id="aj" style="margin-bottom: 2%;display: none;">
            		<h2 style=" margin-left:32%;">
            	<img src="./../image/ic.png" style="width: 3%; margin-right:  2%">Ajouter un Nouveau Service</h2>
            		<form method="post" action="serveur.php?option=ajoutserv" style="border-radius:5% 5% 5% 5%;width:50%; border:solid 1px gray; margin-left:19%; padding:4% 4% 4% 4%;background-color:white" id="fml">	
            			<label style="margin-top: 2%; margin-bottom: 2%">services</label>
                        <select name="service">
                           <?php
		try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				               $requete="select nomservice from service where nomservice not in (select nom from service_prest where emailprest='".$_SESSION['pseudo']."')";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                   {
				                   	?>
				                   	<option value="<?php echo $donnees['nomservice'];?>">
				                   	<?php
				                   			echo $donnees['nomservice'];
				                   		?>
				                   	</option>
				                   
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
                        </select>
                    	<label style="margin-top: 2%; margin-bottom: 2%"> Descption</label>
                        <input type="textarea" name="desc" id="desc"  required="required">
                    	<label style="margin-top: 2%; margin-bottom: 2%">Tarif</label>
                    	<input type="number" name="tarif" required="required" >
                    	<label style="margin-top: 2%; margin-bottom: 2%">Zone de Couverture</label>
                   		<select name="ville">
		                    <option value="Bakel" selected="">Bakel</option>
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
                    	<button type="submit" style="margin-left:30%">Ajouter</button>
            		</form>
	
             </div>
              <?php include 'footer.php'; ?>
           </div>
           
         

		</section>

	
	</section>

	<script type="text/javascript">

	
	function supp(ele)
	{
		document.getElementById(ele).style.display="block";
	}

		function change()
			{
				if (document.getElementById('bch').value =='Ajouter un Service')
				 {
					document.getElementById('lis').style.display='none';
					document.getElementById('aj').style.display="block";
					document.getElementById('bch').style.display="none";
				}
				else
				{
					document.getElementById('bch').value='Ajouter un Service';
					document.getElementById('aj').style.display='none';
					document.getElementById('lis').style.display="block";

				}
				
			}

	</script>
	</body>
	</html>
		
