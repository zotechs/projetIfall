<?php 
	session_start();
	if (!isset($_SESSION['pseudoclient'])) {
		header('location:connexion1.php');
	}

	if (isset($_REQUEST['not'])) {
		?>
<script type="text/javascript">
	alert("Mercie de votre contribution ");

	setTimeout (function(){location="noter.php";},1000)
</script>
		<?php
	}
 ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="icon" href="./../image/logmin.png" sizes="32x32">
   <link rel="stylesheet" type="text/css" href="./../css/ch.css">
  
<script type="text/javascript">

	function set(){
		document.getElementsByTagName('tri').checked=false;
	}
	function affiche(that){
		var2="";
		var2=that.id;
		var1 ='details'+var2+'-';
		document.getElementById(var1).style.display='block';

	}
	function retour(that){
		var2=that.id;
		var1 ='details'+var2;
		document.getElementById(var1).style.display='none';
	}
  function rele(){
    document.getElementById('recherche').submit();
  }
</script>	
<meta charset="utf-8">


<style type="text/css">

nav ul{
           position:absolute;
           height:20%;
           margin:6% 70%;
           padding:0;
           width: 90%;
           white-space:nowrap;
      }
      nav ul li{
           display:inline;
           text-align:center;
           height: 80%;

      }
      nav ul li:nth-child(1) a{width:5%;}
      nav ul li:nth-child(2) a{width:12%;}
      nav ul li:nth-child(3) a{width:10%;}
      nav ul li:nth-child(5) a{width:3%;}

      nav ul li a{
           display:inline-block;
           box-sizing:border-box;
           color:#ffffff;
           text-decoration:none;
           text-shadow:0 1px 0 white;
           background-color:transparent;
           transition:background-color .3s ease;
           font-size: 0.9em;
      }
      nav ul li a:hover,ul li a:focus{
           color:#ffffff;
           background-color:rgba(255,255,255,.4);
           transition:background-color .3s ease .4s;
      }
      nav ul li a:focus{
           border-bottom:3px solid ffffff;
      }
      nav ul li:last-child::after{
           content:"";
           position:absolute;
           left:6.8%;
           bottom:-3px;
           display:block;
           width:9%;
           height:3px;
           background:#ccc;
           border-bottom:1px solid rgba(255,255,255,.8);
           transition: all .5s ease;
      }
      nav ul li:hover ~ li:last-child::after,
      nav ul li:last-child:hover::after{background: #26a69a;}

      nav ul li:nth-child(1):hover ~ li:last-child::after{left:0;width:5%;}
      nav ul li:nth-child(2):hover ~ li:last-child::after{left:5.1%;width:12%;}
      nav ul li:last-child:hover::after{left:17.7%;width:10%;}
         body
     {
      width:100%; 
      height:700px; 
      margin:0px;
     }
     header
     {
      width:100%;
      height:18%; 
      background-color:#37474f; 
      position:fixed;
      z-index:100;
     }

      input,label{
        	margin-right: 3%;
        	width: 25%;
        	margin-top:0%;

         }

.not  input[type=text],
    .not    input[type=password],
    .not    input[type=email],
    .not    input[type=url],
    .not    input[type=time],
     .not   input[type=date],
      .not  input[type=datetime],
     .not   input[type=datetime-local],
     .not   input[type=tel],
      .not  input[type=number],
      .not  input[type=search],
      .not  input[type=textarea],
       .not select{
        background-color: transparent;
        border: none;
        border-bottom: 1px solid ;
        border-radius: 0;
        outline: none;
        height: 25px;
        width: 90%;
        font-size: 0.8rem;
        padding: 0;
        margin-top: 2%;
        margin-bottom: 2%;
        box-shadow: none;
        box-sizing: content-box;
        transition: all 0.3s;
      }


 .not     input[type=text]:focus,
 .not     input[type=password]:focus,
  .not    input[type=email]:focus,
  .not    input[type=url]:focus,
  .not    input[type=time]:focus,
  .not    input[type=date]:focus,
  .not    input[type=datetime]:focus,
  .not    input[type=datetime-local]:focus,
  .not    input[type=tel]:focus,
  .not    input[type=number]:focus,
   .not   input[type=search]:focus,
   .not   select:focus,
   .not   input[type=textarea]:focus,
    {
          border-bottom: 1px solid green;
        box-shadow: 0 1px 0 0 #F44336;
        transition: all 0.3s;
       }

      .notlabel ,.not input,select
      {
        display: block;
      }
    .not  label
      {
      font-weight: bolder;
      }


       
    
        .rating {
            width: 100%;
            margin: 0 auto 1em;
            font-size: 45px;
        }
        .rating a {
            float:right;
            color: #aaa;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }
        .rating a:hover,
        .rating a:hover ~ a,
        .rating a:focus,
        .rating a:focus ~ a     {
            color: orange;
            cursor: pointer;
        }
        .rating2 {
            direction: rtl;
        }
        .rating2 a {
            float:none
        }
      .not  label
        {
        	text-align: left;
        }
        .tag label

        {
        	margin-top: 2%;
        	margin-right: 2%
        	margin-left:4%;
        	color: white;
            }
               .tag select
               {
               	color: white;
               }
         

    </style>

       
</head>
<body onload="set()">
<header >
    <div style="color:white; font-size:3em;font-weight:bolder;margin-left:5% ; float:left; height: 70%; width: 20%" >
    <img src="./../image/logo.png" style="width:100%;height: 100%; margin-left: 4%" ></div>
    <nav>
      <ul>
           <li ><a href="./../index.html"> Acceuil</a></li>
           <li><a  href=""><?php echo $_SESSION['prenomclient']."  ".$_SESSION['nomclient'] ; ?></a></li>
           <li><a href="serveur.php?option=decoclient">Deconnexion</a></li>
      </ul>
    </nav>
  </header>
  <div style="height:14%; z-index:100;"></div> 


  		<div class="tag" style=" position: fixed;" >
        <form  action='noter.php?option=diye' method='post' id='recherche' style="width: 60%;padding-left: 3%">
          	<label style="float: left; width: 16% ">Centre D'activité</label>
             <select  name="cate" id="cate" required style="margin-right: 2%; float: left;" onchange="rele()">
     
                  	<?php

                  		 $a="";
		              if (isset($_REQUEST['option'])) 
		              {
		                if ($_REQUEST['option']=='diye')
		                 {
		                 	$a=$_REQUEST['cate'];
		                 	$ser=$_REQUEST['cate'];
		                 }
		                

		                }
                   
                      
                      	if($a=="beaute")
                      	{
	?>
				<option value="beaute" selected>Beauté</option>
             	<option value="technique">Technique</option>
             	<option value="utilitaires">Utilitaire</option>
                  	<?php
	
                      	}
                      	if ($a=="technique") {
                      		?>
                      		<option value="beaute" >Beauté</option>
			             	<option value="technique" selected>Technique</option>
			             	<option value="utilitaires">Utilitaire</option>
                  	<?php
                      	
                      	}
                      	if ($a=="utilitaires") {
                      		
                      			?>
                      				<option value="beaute" >Beauté</option>
			             		<option value="technique" >Technique</option>
			             		<option value="utilitaires" selected>Utilitaire</option>
                  	
                      			<?php
                      		
                      	}
                      	if ($a=="") {
                      		?>
                      		<option value="beaute">Beauté</option>
             				<option value="technique">Technique</option>
             				<option value="utilitaires">Utilitaire</option>
                      		<?php
                      	}
                    
                    ?>
              </select>
              <label for="lieu" style="margin-right: 1%; float: left; width: 6%">Lieu</label>
              <select  name="lieu" id="lieu" required style="">
                  <?php
                    if(isset($_SESSION['lieu']))
                    	$a=$_SESSION['lieu'];
                    else $a="";
                    try{
                        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
                          try
                            {
                               $query1="select nomville from ville order by nomville ";
                               $result1 = $bdd->query($query1);
                               while ($row1= $result1->fetch()) 
                               {
                	               	if ($row1[0]==$a)
                        					   echo "<option value='".$row1[0]."' selected>".$row1[0]."</option>";	
                        				  else  
                                    echo "<option value='".$row1[0]."' >".$row1[0]."</option>";	
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
                   ?>		 
              </select>	
              
              <br>
              <label style="margin-left: 0%;width: 15.7%; float: left;">Service</label> 
              <select  id="select" name="choix" required style="float: left">
          <?php
          		$ser='beaute';
          		 $a="";
              if (isset($_REQUEST['option'])) 
              {
                if ($_REQUEST['option']=='diye')
                 {
                   	$ser=$_REQUEST['cate'];
                 }
                

                }

                               
                try{
                      $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '');
                        try
                          {
                             $query1="select nomservice from service where categorie='".$ser."'";
                             $result1 = $bdd->query($query1);
                             while ($row1= $result1->fetch()) {
                            echo "<option value='".$row1[0]."' >".$row1[0]."</option>"; 
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
                         
                  
                
             


          ?>
          </select>
          <input type="submit" name="" class="bouton" style="margin-left:10% ;width:20%; padding-bottom: 1%;" formaction="serveur.php?option=rech1" value="rechercher"> 
    	</form>
	</div>


<div style="width: 70%; height: auto; float: left;padding:2%; margin-top: 10% ;">
	
	<?php include 'affiche.php'	;?>

</div>



<div style="width: 25%;margin-left: 74%;margin-top: 11%; overflow: scroll; height: 60%;">
	<form  class="not" style=" width: 100%;padding: 2%;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3); " method="post" action="" id="opr">
		<h1 style="width: 100%; text-align: center; margin-top: -2%;">Notation</h1>

		<label style="text-align: left;">Prestataire</label>
		<br>
		<select id="notprest" required>

		
			<?php 

				try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				            	$requete="select t.emailprest,t.id,t.service,p.prenom,p.nom from travail t,prestataire p where emailclient = '".$_SESSION['pseudoclient']."' and t.emailprest=p.emailprest and noter='false' and accepter='oui'";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                                  {
				                             echo '<option value="'.$donnees['id'].'|'.$donnees['emailprest'].'|'.$donnees['service'].'">';
				                             echo $donnees['service']."-". $donnees['id'].'  '.$donnees['prenom'].'  '.$donnees['nom'] ."( ".$donnees['emailprest'].")"  ;
				                             echo "</option>";
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
		<br>
		<label>Veuillez donner une note</label>


		<div class="rating rating2" style="text-align: center;"><!--
        --><a onclick="evalue('20');"  title="Give 5 stars">★</a><!--
        --><a onclick="evalue('16');"  title="Give 4 stars">★</a><!--
        --><a onclick="evalue('12');"  title="Give 3 stars">★</a><!--
        --><a onclick="evalue('8');" title="Give 2 stars">★</a><!--
        --><a onclick="evalue('4');" title="Give 1 star">★</a>
    </div>
	</form>
		<script type="text/javascript">
		function evalue(ele)
		{
			var sel=document.getElementById('notprest');
			var ind=sel.options[sel.selectedIndex].value;

			ind="serveur.php?option=noter&not="+ele+"&don="+ind;
			document.getElementById('opr').action=ind;
			document.getElementById('opr').submit();
		}
	</script>
	<div class="not" style=" width: 100%;padding: 2%;; ">
	</div>
		<h3 style="width: 100%; text-align: center">Tavaux en Cours</h3>
		<?php 

			try{
				       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				        $bdd = new PDO('mysql:host=localhost;dbname=goorgolu', 'root', '',$pdo_options);
				          try
				            {
				             // On récupère tout le contenu de la table jeux_video
				            	$requete="select emailprest, dates,service from travail where emailclient = '".$_SESSION['pseudoclient']."' and etat='en attente' ";
				               $reponse = $bdd->query($requete);
				                  // On affiche chaque entrée une à une
				               while ($donnees = $reponse->fetch())
				                                  {
				                                  	?>
				                                  	<label style="background-color: #ff3d00; width: 90%; display: block;margin:1%; margin-left: 4%;box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);margin-bottom: 3%; text-align: center;"><?php echo "$donnees[1] $donnees[2] $donnees[0]"; ?></label>
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
   </div>

	
	</body>
	</html>

