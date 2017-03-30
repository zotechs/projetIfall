<?php
session_start();
$query9="";
$i=0;
$tab6=array();
$op=$_REQUEST['option'];
switch ($op) {
	case 'rech1':
		if (!isset($_SESSION["type"])){
		$_SESSION["type"]=$_POST['cate'];
		$_SESSION["lieu"]=$_POST['lieu'];
		}
		else{
		$_SESSION["type"]=$_POST['cate'];
		$_SESSION["lieu"]=$_POST['lieu'];	
		}	
	try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
        try
        {
        	$query1="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p,service s where sp.zone_couverture='".$_SESSION['lieu']."' and sp.emailprest=p.emailprest and sp.nom=s.nomservice and s.categorie='".$_SESSION['type']."'";
            $result1 = $bdd->query($query1);
            $fichier=fopen("liste.txt", "w+");
            while ($row1 = $result1->fetch())
              {
              	$i++;
              	$deb="<div class='resultat' ><img src='./../image/prest/".$row1[6]."' class='image'> <p>".$row1[0]."    ".$row1[1]." <input type='button' id='".$i."' onClick='javascript: affiche(this);' class='bouton' value='AFFICHER LES DETAILS' /></p></div>";
              	$dec='<div id="details'.$i.'-"  class="menu">'; 
              	$nom="<div ><form action='connexion2.php?email=".$row1[12]."&service=".$row1[7]."'  method='post'><img style='margin-left:10%' src='./../image/prest/".$row1[6]."' class='image' > <p>".$row1[0]."    ".$row1[1]."<input style='margin-left:40%;width:200' type='submit' class='bouton' value='choisir' /></p></form></div ><br> ";
				$de="<table '><tr><th>Sexe</th><th>Telephone</th><th>adresse</th><th>service</th><th>tarif</th><th>note</th><th>description</th></tr><tr><td align='center'>".$row1[3]."</td><td align='center'>".$row1[4]."</td><td align='center'>".$row1[5]."</td><td align='center'>".$row1[7]."</td><td align='center'>".$row1[11]."</td><td align='center'>".$row1[8]."</td><td align='center'>".$row1[10]."</td></tr></table><hr><p>Mapping</p><br>";						
				$fin="<div style='width:60%;height:40%'></div ><input type='button' class='bouton' id='".$i."-' style='margin-left:10%;width:10%' onClick='javascript:retour(this);' value='retour'/></div> //";
				$b=$deb.$dec.$nom.$de.$fin;	
				fputs($fichier,$b);
              }

            }catch(Exception $e)
                {
    				die('Erreur : '.$e->getMessage());
  				} 
       }
       catch (Exception $e)
          {
                die('Erreur : ' . $e->getMessage());
          }
	header('Location:research.php');
		
		break;
	case 'rech2':
			   $_SESSION["choix"]=$_POST['choix'];
			   $tab1 = array();
			   $tab1[0]="";
			   $tab1[1]="";
			   $tab1[2]="";
			   if(isset($_POST['tri'])){
			   foreach ($_POST['tri'] as $key) 
			   {
			   	$i=0;
			   	if($i==0 && $key=="zone_couverture")
			   	$tab1[$i]=$key;
			   	$i++;
			   	if($i==1 && $key=="note")
			   	$tab1[$i]=$key;
			   	$i++;
			   	if($i==2 && $key=="disponibilite")
			   	$tab1[$i]=$key;			   	
			   }	
			   }
			   
			try{
		        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
		        try
		        {
		        	$query8="create view depart (num) as select num from ville where nomville='".$_SESSION['lieu']."' ;";
		        	$result8 = $bdd->query($query8);
		        	$query7="create view tri (nomville,distance) as (select nomville,ABS(depart.num-ville.num) as distance from ville,depart order by distance) ";
		        	$result7 = $bdd->query($query7);
		        	if($tab1[0]!="" && $tab1[1]!="" && $tab1[2]!="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif from service_prest sp,prestataire p,tri where sp.zone_couverture=tri.nomville and sp.emailprest=p.emailprest and sp.nom='".$_SESSION['choix']."' order by ".$tab1[1].",".$tab1[2]."";
		        	if($tab1[0]!="" && $tab1[1]!="" && $tab1[2]=="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif from service_prest sp,prestataire p,tri where sp.zone_couverture=tri.nomville and sp.emailprest=p.emailprest and sp.nom='".$_SESSION['choix']."' order by ".$tab1[1]."";
		        	if($tab1[0]!="" && $tab1[1]=="" && $tab1[2]!="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif from service_prest sp,prestataire p,tri where sp.zone_couverture=tri.nomville and sp.emailprest=p.emailprest and sp.nom='".$_SESSION['choix']."' order by ".$tab1[2]."";
		        	if($tab1[0]=="" && $tab1[1]!="" && $tab1[2]!="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p where sp.zone_couverture='".$_SESSION['lieu']."' and sp.emailprest=p.emailprest and sp.nom='".$_SESSION["choix"]."' order by ".$tab1[1].",".$tab1[2]."";
		        	if($tab1[0]!="" && $tab1[1]=="" && $tab1[2]=="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif from service_prest sp,prestataire p,tri where sp.zone_couverture=tri.nomville and sp.emailprest=p.emailprest and sp.nom='".$_SESSION['choix']."'";
		        	if($tab1[0]=="" && $tab1[1]!="" && $tab1[2]=="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p where sp.zone_couverture='".$_SESSION['lieu']."' and sp.emailprest=p.emailprest and sp.nom='".$_SESSION["choix"]."' order by ".$tab1[1]."";
		        	if($tab1[0]=="" && $tab1[1]=="" && $tab1[2]!="" )
		        		$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p where sp.zone_couverture='".$_SESSION['lieu']."' and sp.emailprest=p.emailprest and sp.nom='".$_SESSION["choix"]."' order by ".$tab1[2]."";
		            if($tab1[0]=="" && $tab1[1]=="" && $tab1[2]=="" )
						$query9="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p where sp.zone_couverture='".$_SESSION['lieu']."' and sp.emailprest=p.emailprest and sp.nom='".$_SESSION["choix"]."'";		            	
		            $result9 = $bdd->query($query9);
		            $fichier=fopen("liste.txt", "w+");
		            $i=0;
		            while ($row9 = $result9->fetch())
		              {

						    $i++;
						    $deb="<div class='resultat' ><img src='./../image/prest/".$row9[6]."' class='image'> <p>".$row9[0]."    ".$row9[1]." <input type='button' id='".$i."' onClick='javascript: affiche(this);' class='bouton' value='AFFICHER LES DETAILS' /></p></div>";
			              	$dec='<div id="details'.$i.'-"  class="menu">'; 
			              	$nom="<div ><form action='connexion2.php?email=".$row9[12]."&service=".$row9[7]."'  method='post'><img style='margin-left:10%' src='./../image/prest/".$row9[6]."' class='image' > <p>".$row9[0]."    ".$row9[1]."<input style='margin-left:40%;width:200' type='submit' class='bouton' value='choisir' /></p></form></div ><br> ";
							$de="<table '><tr><th>Sexe</th><th>Telephone</th><th>adresse</th><th>service</th><th>tarif</th><th>note</th><th>description</th></tr><tr><td align='center'>".$row9[3]."</td><td align='center'>".$row9[4]."</td><td align='center'>".$row9[5]."</td><td align='center'>".$row9[7]."</td><td align='center'>".$row9[11]."</td><td align='center'>".$row9[8]."</td><td align='center'>".$row9[10]."</td></tr></table><hr><p>Mapping</p><br>";						
							$fin="<div style='width:60%;height:40%'></div ><input type='button' class='bouton' id='".$i."-' style='margin-left:10%;width:10%' onClick='javascript:retour(this);' value='retour'/></div> //";
							$b=$deb.$dec.$nom.$de.$fin;
							fputs($fichier,$b);
		              }
				   $query7="drop view tri"; 
		           $result7 = $bdd->query($query7);
		           $query8="drop view depart"; 
		           $result8 = $bdd->query($query8);
		        }catch(Exception $e)
		                {
		    				die('Erreur : '.$e->getMessage());
		  				} 
		       }
		       catch (Exception $e)
		          {
		                die('Erreur : ' . $e->getMessage());
		          }
			 header('Location:research.php');		
		break;
	case 'essai':
			   $tab1 = array();
			   $tab1[0]="";
			   $tab1[1]="";
			   $tab1[2]="";
			   foreach ($_POST['tri'] as $key) 
			   {
			   	$i=0;
			   	if($i==0 && $key=="zone_couverture")
			   	$tab1[$i]=$key;
			   	$i++;
			   	if($i==1 && $key=="note")
			   	$tab1[$i]=$key;
			   	$i++;
			   	if($i==2 && $key=="disponibilite")
			   	$tab1[$i]=$key;			   	
			   }
			   for($i=0;$i<count($tab1);$i++)
			   {
			   	echo "tab[".$i."]: ".$tab1[$i]."<br>";	
			   }
			   

		break;
	case 'acces_client':

						try{
							$ok=false;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
				          try
				            {
                          if(isset($_POST['pseudo'])){       
				            	$requete="select * from  client where emailclient='".$_POST['pseudo']."'";
				                $reponse = $bdd->query($requete);           				              
							if($donnees = $reponse->fetch()){
								 if(($donnees[0]==$_POST['pseudo']) )
								 {
								 	$qu="select emailclient from client where password=PASSWORD('".$_REQUEST['pwd']."')";
								 	$re=$bdd->query($qu);
								 	while($row= $re->fetch()){
								 		if($row[0]==$_POST['pseudo']){
								 			$_SESSION['client_prest']=$_POST['pseudo'];
								 			$ok=true;
								 			break;
								 		}
								 	}
								 	if($ok==true){
								 		header('location:solliciter.php');
								 	}
								 	else
								 	header('location:connexion2.php');
								 }

								     
						    }
                            }
                           
				            }catch(Exception $e)
				                 {
                    				die('Erreur : '.$e->getMessage());
                  				} 
                  }
                 catch (Exception $e)
                      {
                            die('Erreur : ' . $e->getMessage());
                      }

					break;
    case 'choisir':
    			try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
          try
            {
               $query1="insert into travail values('','en attente','".$_SESSION['prest_client']['email']."','".$_SESSION['client_prest']."','".date('Y-m-d')."','".$_POST['detailler']."','non','".$_SESSION['prest_client']['service']."')";
               $result1 = $bdd->query($query1);
               if($row1=$result1->fetch()){

               }
               header('Location:resume.php');
            }catch(Exception $e)
                 {
    				die('Erreur : '.$e->getMessage());
  				} 
      }
     catch (Exception $e)
          {
                die('Erreur : ' . $e->getMessage());
          }


    				break;

   	case 'supprest':
   					try{
   					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
			          try
			            {
			               $query1="delete from prestataire where emailprest='".$_REQUEST['email']."'";
			               $result1 = $bdd->exec($query1);
			               header('Location:modification.php');
			            }catch(Exception $e)
			                 {
			    				die('Erreur : '.$e->getMessage());
			  				} 
			      }
			     catch (Exception $e)
			          {
			                die('Erreur : ' . $e->getMessage());
			          }
   					break;
   	case 'supclient':
   				try{
   					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
			          try
			            {
			               $query1="delete from client where emailclient='".$_REQUEST['email1']."'";
			               $result1 = $bdd->exec($query1);
			               header('Location:modification.php');
			            }catch(Exception $e)
			                 {
			    				die('Erreur : '.$e->getMessage());
			  				} 
			      }
			     catch (Exception $e)
			          {
			                die('Erreur : ' . $e->getMessage());
			          }

   					break;
   	case 'ajouteville':
   				try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
        try
        {
        	$query1="insert into ville values ('".$_POST['ajouterville']."',".$_POST['localisation'].")";
            $result1 = $bdd->query($query1);
            header('Location:modification.php');
            }catch(Exception $e)
                {
    				die('Erreur : '.$e->getMessage());
  				} 
       }
       catch (Exception $e)
          {
                die('Erreur : ' . $e->getMessage());
          }
   		break;
   	case 'ajouteser':
   				try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
        try
        {
        	$query1="insert into service values ('".$_POST['ajouterservice']."','".$_POST['categorie']."')";
            $result1 = $bdd->query($query1);
            header('Location:modification.php');
            }catch(Exception $e)
                {
    				die('Erreur : '.$e->getMessage());
  				} 
       }
       catch (Exception $e)
          {
                die('Erreur : ' . $e->getMessage());
          }
   		break;
   	case 'supville':
   				try{
   					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
			          try
			            {
			               $query1="delete from ville where nomville='".$_POST['supvi']."'";
			               $result1 = $bdd->exec($query1);
			               header('Location:modification.php');
			            }catch(Exception $e)
			                 {
			    				die('Erreur : '.$e->getMessage());
			  				} 
			      }
			     catch (Exception $e)
			          {
			                die('Erreur : ' . $e->getMessage());
			          }

   			break;
   	case 'supser':
   				try{
   					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
			          try
			            {
			               $query1="delete from service where nomservice='".$_POST['supser']."'";
			               $result1 = $bdd->exec($query1);
			               header('Location:modification.php');
			            }catch(Exception $e)
			                 {
			    				die('Erreur : '.$e->getMessage());
			  				} 
			      }
			     catch (Exception $e)
			          {
			                die('Erreur : ' . $e->getMessage());
			          }

   			break;
	default:
		# code...
		break;
 }
?>