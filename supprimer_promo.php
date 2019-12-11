<?php
include "../core/PromoC.php";
include "../entities/Promo.php";



$promoC=new PromoC();

	$listePromo=$promoC->afficherpromoo();
$resultat=0 ;
  foreach($listePromo as $row){
	if(isset($_GET["reference"]) && ($_GET["reference"] ==$row['reference']))
	{
		  
	   $promoC->supprimerpromo($_GET["reference"]);
		 header('Location: reduc.php');
	}
  
	
		  
else	{ $resultat=1 ;
		}}
if($resultat==1) {
{ echo '<script>alert("Reference Introuvable")</script>' ;}
}


?>
	