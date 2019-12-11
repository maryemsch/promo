<?php
include "../config.php";
class PromoC {
function ajouter ($promo)

{$sql="insert into promo (reference,nom,aprix,taux,nprix,quantite,etat,image,datee) values ( :reference , :nom ,:aprix , :taux , :nprix, :quantite , :etat ,:image	,:datee)" ;
	$db=config::getConnexion();
try{
	$req=$db->prepare($sql);
	  
	$reference=$promo->getreference();
	$nom=$promo->getnom();
	$aprix=$promo->getaprix();
	$taux=$promo->gettaux();
	$nprix=$promo->getnprix();
	$quantite=$promo->getquantite();
	$etat=$promo->getetat();
	$image=$promo->getimage();
	$datee=$promo->getdatee();
	$req->bindValue(':reference',$reference);
	$req->bindValue(':nom',$nom);
	$req->bindValue(':aprix',$aprix);
	$req->bindValue(':taux',$taux);
	$req->bindValue(':nprix',$nprix);
	$req->bindValue(':quantite',$quantite);
	$req->bindValue(':etat',$etat);
	$req->bindValue(':image',$image);
	$req->bindValue(':datee',$datee);
	$req->execute();
	return true ;
} catch (Exception $e)
	
{echo 'Erreur' .$e->getMessage(); return false ;}
}
	/*******************************************************************************************/

	function modifier($promo,$reference){
$sql="UPDATE promo SET nom=:nom ,aprix=:aprix, taux=:taux,nprix=:nprix,quantite=:quantite, etat=:etat,image=:image,	datee=:datee  where reference = :reference" ;
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
	$reference=$promo->getreference();
	$nom=$promo->getnom();
	$aprix=$promo->getaprix();
	$taux=$promo->gettaux();
	$nprix=$promo->getnprix();
	$quantite=$promo->getquantite();
	$etat=$promo->getetat();
	$image=$promo->getimage();
	$datee=$promo->getdatee();
	/*	$datas = 	array(':nom'=>$nom,':aprix'=>$aprix, ':taux'=>$taux, ':nprix'=>$nprix,':quantite'=>$quantite,':etat'=>$etat,':image'=>$image,':datee'=>$datee,':reference'=>$_GET['reference']);
*/
	$req->bindValue(':reference',$reference);
	$req->bindValue(':nom',$nom);
	$req->bindValue(':aprix',$aprix);
	$req->bindValue(':taux',$taux);
	$req->bindValue(':nprix',$nprix);
	$req->bindValue(':quantite',$quantite);
	$req->bindValue(':etat',$etat);
	$req->bindValue(':image',$image);
	$req->bindValue(':datee',$datee);
		
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  
        }
		
	}
	/***************************************************************************/
	function recupererpromo($reference){
		$sql="SELECT * from promo where reference=$reference";
		$db = config::getConnexion();
		try{
		$promo=$db->query($sql);
		return $promo;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/***************************************************************************/
	/*function afficherpromo ($promo){
		echo "reference: ".$promo->getreference()."<br>";
		echo "aprix: ".$promo->getaprix()."<br>";
		echo "taux: ".$promo->gettaux()."<br>";
		echo "nprix: ".$promo->getnprix()."<br>";
		echo "quantite: ".$promo->getquantite()."<br>";
		echo "etat: ".$promo->getetat()."<br>";
		echo "datee: ".$promo->getdatee()."<br>";
		
	
	}	*/
	/***************************************************************************/
	function afficherpromoo(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From promo";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/***************************************************************************/
	function affichercom(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commentaires";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/***************************************************************************/
	 function supprimerpromo($reference){

		$sql="DELETE from promo where reference=$reference";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':$reference',$reference);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	/***************************************************************************/
	function afficherstat(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT nom, sum(taux) From promo group by nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		/*************************************************************/
		function rechercher(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql='select * from promo WHERE reference LIKE "%'.$_GET['search'].'%"';
			
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/************************************************************/
	function affichertri(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From promo ORDER BY taux DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>