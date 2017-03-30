<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Detail</title>
	<style type="text/css">
		 span {
			  color:#000000;
			  display:block;height:23px;
			  padding:3px 15px 0;
			  text-shadow:1px 1px 1px white;
			  font-size:0.9em;
			  font-weight:bolder; 
			  }

		 body
		 {
		 	width:100%; 
		 	height:700px; 
		 	margin:0px;
		 }
		 header
		 {
		 	width:100%;
		 	height:149px; 
		 	background-color:#000000; 
		 	position:fixed;
		 	z-index:100;
		 }


		#silde{		overflow:hidden;
			  }
		
		 

	 </style>

	 <style type="text/css">

		      nav ul{
			     position:absolute;
			     height:20%;
			     margin:7% 50%;
			     padding:0;
			     width: 100%;
			     white-space:nowrap;
			}
			nav ul li{
			     display:inline;
			     text-align:center;
			}
			nav ul li:nth-child(1) a{width:8%;}
			nav ul li:nth-child(2) a{width:8%;}
			nav ul li:nth-child(3) a{width:8%;}
			nav ul li:nth-child(4) a{width:8%;}
			nav ul li:nth-child(5) a{width:8%;}
			nav ul li:nth-child(6) a{width:8%;}

			nav ul li a{
			     display:inline-block;
			     box-sizing:border-box;
			     color:#ffffff;
			     text-decoration:none;
			     text-shadow:0 1px 0 white;
			     background-color:transparent;
			     transition:background-color .3s ease;
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
			     left:0%;
			     bottom:-3px;
			     display:block;
			     width:5%;
			     height:3px;
			     background:#ccc;
			     border-bottom:1px solid rgba(255,255,255,.8);
			     transition: all .5s ease;
			}
			nav ul li:hover ~ li:last-child::after,
			nav ul li:last-child:hover::after{background:#C351FA;}

			nav ul li:nth-child(1):hover ~ li:last-child::after{left:0;width:8%;}
			nav ul li:nth-child(2):hover ~ li:last-child::after{left:9.1%;width:6%;}
			nav ul li:nth-child(3):hover ~ li:last-child::after{left:17.6%;width:6%;}
			nav ul li:nth-child(4):hover ~ li:last-child::after{left:25.7%;width:6%;}
			nav ul li:nth-child(5):hover ~ li:last-child::after{left:33.4%;width:9%;}
			nav ul li:last-child:hover::after{left:42%;width:7%;}
                           
                    .tofdev {
                                   
                                   width:100%;
                                   height:100%;
                                   overflow:hidden; 
                             }

                          .ofdev{
                                   border-radius:100% 100% 100% 100%; 
                                   width:100%;
                                   height:100%;
                                   overflow:hidden; 
                             }

	 </style>

         <script>
           function merci(){
                alert('Merci nous vous reviendrons bientot!');
           }
         </script>
</head>

<body>
	<header >
		<div style="color:white; font-size:3em;font-weight:bolder;margin-left:5% ; float:left; " >GoorGoorLu</div>
		<nav>
			<ul>
			     <li><a href="messagerie.php">Ma Messagerie</a></li>
			     <li><a href="#">Historique </a></li>
			     <li><a href="#"> Prestataires</a></li>
			     <li><a href="#">Solliciteurs</a></li>
				 <li><a href="#">Ajouter un service</a></li>
				 <li><a href="index.php">Deconnexion</a></li>
			</ul>
		</nav>
	
	</header>

         <div style="height:19%; z-index:100; "></div>	
  
<!-- boutton-->
<style type="text/css">
.btn:focus {
  background-color: #1d7d74;
				}
	.btn{
		  text-decoration: none;
		  color: #fff;
		  background-color: #26a69a;
		  text-align: center;
		  letter-spacing: .5px;
		  transition: .2s ease-out;
		  cursor: pointer;
		  outline: 0;
		  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
		  border: none;
  		  border-radius: 2px;
  		  display: inline-block;
  		  height: 36px;
  		  line-height: 36px;
  		  padding: 0 2rem;
 		  text-transform: uppercase;
 		  vertical-align: middle;
 		 -webkit-tap-highlight-color: transparent;
	    }
	.btn:hover
	{
		  box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2);
		   background-color: #2bbbad;

	}
</style>
       
<br/><br/>


<?php

//========================================= Affichage du message en question ========================================================

if(isset($_REQUEST['name']) and isset($_REQUEST['mail']) and isset($_REQUEST['sujet']) and isset($_REQUEST['mess']))
{
  echo "  <div style='margin-left:25%;margin-bottom:2%; width:40%; padding-left:4%; padding-bottom:1%;  box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);'>
                     <h2> Vous lisez...</h2>
		 </div>
  
  <div style='margin-left:25%;margin-bottom:2%; width:50%; padding-left:4%; padding-bottom:1%;  box-shadow: 5px 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.3);'>

  <br/><br/><br/><table align='center' width=50% >";
  echo" <tr>

  <td>
   <div style='width:30%; height:30%'>
        <img src='sans-titre2.png'><br/><br/><br/>
   </div>
  </td>
<tr/>
<tr>
  <td>
    <u>Prenom & Nom:</u> $_REQUEST[name] <br/><br/><br/>
    <u>Mail:</u>$_REQUEST[mail]<br/><br/><br/>
    <u>Objet:</u>$_REQUEST[sujet]<br/><br/><br/>
   <td/>
</tr>
<tr>
   <td>
    <u> Message:</u><br/><br/>$_REQUEST[mess]<br/><br/><br/><br/>
	 <a href='messagerie.php'>
	    <input type='submit' value='Retour' style='align:right; width:30%; height:12%'>
		</input><br/><br/>
	</a>
   </td>
</tr>
</table>";
}
//================================================= fin =============================================================================

?>

</body>


</html>