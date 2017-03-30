<?php
	$choix;
		$lieu;
	session_start();
	$op;	
$query9="";
$i=0;
$tab6=array();
	
	if (isset($_REQUEST['option'])) 
	{
				
	$op=$_REQUEST['option'];
		}

	$ok=true;
	$sex ;
	$tabdon;

	if (isset($_REQUEST['donnee'])) 
	{
			   $tabdon=	$_REQUEST['donnee'];
			
			}

		if(isset($_POST['sex'])) 
		{
		    $sex = $_POST['sex'];
		} else 
		{
		    $sex = 'Homme';
		}
	$tab= array('prenom' =>'','nom' =>'','mail' =>'','pwd' =>'','sexe' =>'' ,'dat' =>'','numero'=>'','photo'=>'','note'=>'');
	
/// ======================================les operation===========================================
	switch ($op) {


		case 'saveclient':
			
			try{
		       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
		          try
		            {
		             // On récupère tout le contenu de la table jeux_video

		 				$tab= array('prenom' =>$_REQUEST['prenom'],'nom' =>$_REQUEST['nom'],'mail' =>$_REQUEST['mail'],'pwd' =>$_REQUEST['pwd'],'sexe' =>$sex ,'dat' =>$_REQUEST['dat'],'numero'=>$_REQUEST['phone']);



						  $requete="select emailclient from client";
						  $reponse = $bdd->query($requete);

						     // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                {
				                 if($donnees['emailclient']===$tab['mail'])
									{
										$ok=false;
										header('location:inscription1.php?valid=false');	
										break;	
									}
							} 	
								if ($ok)
								{
									$requete="insert into client values ('".$tab['mail']."','".$tab['prenom']."','".$tab['nom']."', PASSWORD('".$tab['pwd']."'),'"+$tab['numero']."')";
									header('location:connexion1.php?option=justsinup');
								}
		        			
		               	$reponse->closeCursor();
		            }catch(Exception $e)
		                 {
            				die('Erreur : '.$e->getMessage());
          				} 
          			}
          			catch(Exception $e)
		                 {
            				die('Erreur : '.$e->getMessage());
          				}
			break;
//====================================deconnexion solliciteur=======================================
case 'decoclient':
	session_destroy();
	header('location:connexion1.php');
	break;
		//========================================supp service===============================
	
		case 'supp':
		
		$ser=$_REQUEST['ser'];
		$mail=$_SESSION['pseudo'];

		 try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             
				              $requete="delete from service_prest where emailprest='".$mail."' and nom ='".$ser."'";
				               $reponse = $bdd->query($requete);
				        		header('location:prestataireAcc.php');
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
			break;
//=========================================decliner un travail
	case 'rejettravail':
			try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             
				              $requete="delete from travail where id=".$tabdon;
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataire.php');
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
			break;
// =======================================accepter travail========================================================

		case 'accepttravail':
			try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             
				              $requete="update travail set accepter='oui' where id=".$tabdon;
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataire.php');
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
			break;

// =============================================valid travail fait=======================================

		case 'validtravail':

					try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             
				              $requete="update travail set etat='fait' where id=".$tabdon;
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataire.php');
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
					
			break;
//=============================================modification etat prestaire=======================
		case 'chet':
			$etat=$_REQUEST['etat'];
			if ($etat=='pasdisponible') {
				$etat='pas disponible';
			}
			$_SESSION['disponibilite']=$etat;

				try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             
				              $requete="update prestataire set disponibilite='".$etat."' where emailprest='".$_SESSION['pseudo']."' ";
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataire.php');
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
			
			break;
	//===========================================modification service================
		case 'modifser':
					$num=$_REQUEST['num'];
					$tarif="tar".$num;
					$tarif=$_REQUEST[$tarif];
					$zone='zone'.$num;
					$zone=$_REQUEST[$zone];
					$ser=$_REQUEST['ser'];
					try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             
				              $requete="update service_prest set tarif=".$tarif.", zone_couverture='".$zone."' where emailprest='".$_SESSION['pseudo']."' and nom='".$ser."'";
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataireAcc.php');
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
			break;

		// ====================================ajout nouvelle service pour le prestaire===============================
		case 'ajoutserv':
		$nom;
		$couv;

		if(isset($_REQUEST['service'])) {
		    $nom = $_REQUEST['service'];
		}
		if(isset($_REQUEST['ville'])) {
		    $couv = $_REQUEST['ville'];
		} 

		  $ta = array('nom' => $nom,'mail'=> $_SESSION['pseudo'] ,'tarif'=> $_REQUEST['tarif'] , 'note'=> 0 ,'desc'=> $_REQUEST['desc'], 'couverture'=>$couv );


				try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             $donnees="'".$ta['nom']."','".$ta['mail']."',".$ta['note'].",'".$ta['desc']."','".$ta['couverture']."',".$ta['tarif'];
				            	$requete="insert into service_prest values (".$donnees.")";
				               $reponse = $bdd->query($requete);
				        
				            	header('location:prestataireAcc.php?option=ajoutok');
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
			
			break;
		/// ======================================verificatio authentification===========================================
		case 'connexion':
			$pseudo=$_REQUEST['pseudo'];
			$pwd=$_REQUEST['pwd'];


		try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				            	$requete="select emailprest, nom, prenom,password,photo,disponibilite from prestataire where emailprest = '".$pseudo."'";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                                  {
				                               $tab['mail']=$donnees[0];
				                               $tab['nom']=$donnees[1];
				                               $tab['prenom']=$donnees[2];
				                               $tab['pwd']=$donnees[3];
				                               $tab['dat']=$donnees[4];
				                               $tab['note']=$donnees[5];

				                                  } 
				                 $requete="select PASSWORD('".$pwd."')";
				                 $reponse = $bdd->query($requete);
				                 while ($donnees = $reponse->fetch())
				                 {
				                 	$pwd=$donnees[0];
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


						if ($tab['mail']==$pseudo)
						 {
							if ($tab['pwd']==$pwd) 
							{
								$_SESSION['pseudo']=$pseudo;
								$_SESSION['pwd']=$pwd;
								$_SESSION['photo']=$tab['dat'];
								$_SESSION['prenom']=$tab['prenom'];
								$_SESSION['nom']=$tab['nom'];
								$_SESSION['disponibilite']=$tab['note'];
								header("location:prestataireAcc.php");
							}
						else 
							{
								header('location:connexion.php?option=pwd');
							}
						}
						else
							{header('location:connexion.php?option=pwd');
							break;
							}
		break;

			/// ======================================inscription pretatire===========================================
		case 'enregistrer1':
				$_SESSION['adresse']=$_REQUEST['adresse'];


				try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table
				             $donnees="'".$_SESSION['tab']['mail']."','".$_SESSION['tab']['prenom']."','".$_SESSION['tab']['nom']."',PASSWORD('".$_SESSION['tab']['pwd']."'),'disponible','".$sex."','".$_SESSION['adresse']."','".$_SESSION['tab']['dat']."','".$_SESSION['tab']['numero']."','".$_SESSION['nom']."','0','0' ";
				            	//$donnees="'oumarndiayee@gmail.com','oumar','ndiaye',password('3001'),'disponible','Yeumbeul','1995-03-12','772496530','oumarndiayee@gmail.com.png',0,0";
				            	$requete="insert into prestataire values (".$donnees.")";
				               $reponse = $bdd->query($requete);
				        
				            	header('location:connexion.php?option=justsinup');
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
				
			break;

			/// ======================================verifatio email deja inscrit===========================================

		case 'verif':
			if (!isset($_SESSION['tab']))
			{

			try{
		       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
		          try
		            {
		             // On récupère tout le contenu de la table jeux_video

		 				$tab= array('prenom' =>$_REQUEST['prenom'],'nom' =>$_REQUEST['nom'],'mail' =>$_REQUEST['mail'],'pwd' =>$_REQUEST['pwd'],'sexe' =>$sex ,'dat' =>$_REQUEST['dat'],'numero'=>$_REQUEST['phone']);



				        $_SESSION['tab']=$tab;
				        $_SESSION['nom']='';
						  $requete="select emailprest from prestataire";
						  $reponse = $bdd->query($requete);

						     // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                {
				                 if($donnees['emailprest']===$_SESSION['tab']['mail'])
									{
										$ok=false;
										header('location:inscription.php?valid=false');	
										break;	
									}
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

                      if ($ok==true)
						 {
							header('location:continuer.php');
						}

			}

		  
			break;

			/// =====================================upload photo===========================================
		case 'photo':
			$nom=$_FILES['photo']['name'];
			$ta=explode('.', $nom);
			copy($_FILES['photo']['tmp_name'],'./../image/prest/'.$_SESSION['tab']['mail'].'.'. $ta[1]);
			$_SESSION['nom']='./../image/prest/'.$_SESSION['tab']['mail'].'.'.$ta[1];
			header('location:continuer.php');
			break;


			///===================================deconnexion===================

			   case 'decon':
			   				session_destroy();
			   				header('location:connexion.php');
				# code...
				break;
		
		case 'noter':

          $point=$_REQUEST['not'];
          $empl=$_REQUEST['don'];
          $tabl=[];
          $tabl=explode('|', $empl);
          $empl=$tabl[1];
          $div=1;

                                try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
                                 $query="select note from service_prest where nom='".$tabl[2]."' and emailprest='".$empl."'";
                                             $result=$bdd->query($query);
				               while ($donnees = $result->fetch())
				               {
				               	$note=$donnees[0];
				               }
				                $query="select count(etat) from travail where etat='fait' and emailprest='".$empl."'and noter='true'";   

				               while ($donnees = $result->fetch())
				               {
				               	$div=$donnees[0];
				               }   
				               if ($div==0) {
				                       $div=1;
				                       $noter= ($note*$div + $point)/($div);
				                       }        
				                           
				                       else
				                       {
				                       	 $noter= ($note*$div + $point)/($div+1);
				                       }       
                                            
                                             
                                             $result->closeCursor();
                                      // on fait la moyenne des notes et on met la tuple à jour 
				            	$requete="update service_prest set note=".$noter." where emailprest='".$empl."' and nom ='".$tabl[2]."'";
				                $reponse = $bdd->query($requete);	
				                $requete="update travail set noter='true' where id =".$tabl[0];  
				                 $reponse = $bdd->query($requete);            
				               	$reponse->closeCursor();
				               	echo "ok";
 
                                          header('Location:noter.php?not=ok');
                                           }
				            catch(Exception $e)
				                 {
                    				die('Erreur : '.$e->getMessage());
                  				} 
                  }
                 catch (Exception $e)
                      {
                            die('Erreur : ' . $e->getMessage());
                      }

			break;
		




//====================================================================================diyee balde =====================================

 case 'choisir':
    			try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
          try
            {
            	$query1="select count(*) from travail where emailprest='".$_REQUEST['mail']."' and emailclient='".$_SESSION['pseudoclient']."' and dates= CURDATE()";
               $result1 = $bdd->query($query1);
               if ($donnees=$result1->fetch ()) {
               	 if ($donnees[0]==0) {
               	 	$query1="insert into travail(etat,emailprest,emailclient,dates,detail,accepter,service,noter) values('en attente','".$_REQUEST['mail']."','".$_SESSION['pseudoclient']."','".date('Y-m-d')."','".$_REQUEST['detailler']."','non','".$_REQUEST['service']."','false')";
		               $result1 = $bdd->query($query1);


		              header('Location:noter.php?aff=res');
               	 }
               	 else
               	 	header('location:noter.php?aff=djaajout');
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


		//==============================================acces client ====================================================


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
								 			$_SESSION['pseudoclient']=$_POST['pseudo'];
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


//===============================================acces 2================================


					case 'acces_client2':
					$donnees;

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
								 			$_SESSION['pseudoclient']=$_POST['pseudo'];
								 			$_SESSION['nomclient']=$donnees['nom'];
								 			$_SESSION['prenomclient']=$donnees['prenom'];
								 			$ok=true;
								 			break;
								 		}
								 	}
								 	if($ok==true){
								 		header('location:noter.php');
								 	}
								 	else
								 	header('location:connexion1.php?option=pwd');
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







	case 'rech1':
		
		$choix=$_REQUEST['choix'];
		$lieu=$_REQUEST['lieu'];

		$_SESSION['lieu']=$lieu;
		$_SESSION['choix']=$choix;
			

	try{
        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
        try
        {
        	$query1="select p.prenom,p.nom,p.disponibilite,p.sexe,p.adresse,p.telephone,p.photo,sp.nom,sp.note,sp.zone_couverture,sp.description,sp.tarif,p.emailprest from service_prest sp,prestataire p where sp.zone_couverture='".$lieu."' and sp.emailprest=p.emailprest and sp.nom='".$choix."'";

            $result1 = $bdd->query($query1);
            $fichier=fopen("liste.txt", "w+");
            
            while ($row1 = $result1->fetch())
              {
              	$i++;
              	$deb="<div class='resultat' ><img src='".$row1[6]."' class='image'> <p>".$row1[0]."    ".$row1[1]." <input type='button' id='".$i."' onClick='javascript: affiche(this);' class='bouton' value='DETAILLER' /></p></div>";
              	$dec='<div id="details'.$i.'-"  class="menu">'; 
              	$nom="<div ><form action='noter.php?email=".$row1[12]."&service=".$row1[7]."&aff=false'  method='post'><img style='margin-left:10%' src='".$row1[6]."' class='image' > <p>".$row1[0]."    ".$row1[1]."<input style='margin-left:40%;width:200' type='submit' class='bouton' value='choisir' /></p></form></div ><br> ";
				$de="<table '><tr><th>Sexe</th><th>Telephone</th><th>adresse</th><th>service</th><th>tarif</th><th>note</th><th>description</th></tr><tr><td align='center'>".$row1[3]."</td><td align='center'>".$row1[4]."</td><td align='center'>".$row1[5]."</td><td align='center'>".$row1[7]."</td><td align='center'>".$row1[11]."</td><td align='center'>".$row1[8]."</td><td align='center'>".$row1[10]."</td></tr></table><hr><p>Mapping</p><br>";						
				$fin="<div style='width:60%;height:30%'></div ><input type='button' class='bouton' id='".$i."-' style='margin-left:10%;width:10%' onClick='javascript:retour(this);' value='retour'/></div> //";
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

	header('Location:noter.php?aff=ok');
		
		break;

//=====================================================================================================================


	case 'rech2':
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
						    $deb="<div class='resultat' ><img src='".$row9[6]."' class='image'> <p>".$row9[0]."    ".$row9[1]." <input type='button' id='".$i."' onClick='javascript: affiche(this);' class='bouton' value='DETAILS' /></p></div>";
			              	$dec='<div id="details'.$i.'-"  class="menu">'; 
			              	$nom="<div ><form action='connexion2.php?email=".$row9[12]."&service=".$row9[7]."'  method='post'><img style='margin-left:10%' src='".$row9[6]."' class='image' > <p>".$row9[0]."    ".$row9[1]."<input style='margin-left:40%;width:200' type='submit' class='bouton' value='choisir' /></p></form></div ><br> ";
							$de="<table '><tr><th>Sexe</th><th>Telephone</th><th>adresse</th><th>service</th><th>tarif</th><th>note</th><th>description</th></tr><tr><td align='center'>".$row9[3]."</td><td align='center'>".$row9[4]."</td><td align='center'>".$row9[5]."</td><td align='center'>".$row9[7]."</td><td align='center'>".$row9[11]."</td><td align='center'>".$row9[8]."</td><td align='center'>".$row9[10]."</td></tr></table><hr><p>Mapping</p><br>";						
							$fin="<div style='width:60%;height:30%'></div ><input type='button' class='bouton' id='".$i."-' style='margin-left:10%;width:10%' onClick='javascript:retour(this);' value='retour'/></div> //";
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
			 header('Location:noter.php?aff=ok');		
		break;

		//=================================================
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




//====================================================================

   

    				//=================

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



	
