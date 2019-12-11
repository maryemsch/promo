<?php
class Promo
{
	private $reference;
	private $nom;
	private $aprix;
	private $taux;
	private $nprix;
	private $quantite;
	private $etat;
	private $image;
	private $datee;

function __construct($reference,$nom,$aprix,$taux,$nprix,$quantite,$etat,$image,$datee)
{
	$this->reference=$reference;
	$this->nom=$nom;
	$this->aprix=$aprix;
	$this->taux=$taux;
	$this->nprix=$nprix;
	$this->quantite=$quantite;
	$this->etat=$etat;
	$this->image=$image;
	$this->datee=$datee;

}

function getreference() { return $this->reference; }
	function getnom() { return $this->nom; }

function getaprix() { return $this->aprix;  }

function gettaux() { return $this->taux; }

function getnprix() { return $this->nprix; }

function getquantite() { return $this->quantite;  }

function getetat() { return $this->etat; }
function getimage() { return $this->image; }
	function getdatee() { return $this->datee; }

function setreference($reference) {$this->reference=$reference;}
	function setnom($nom) {$this->nom=$nom;}
function setAPrix($aprix) {$this->aprix=$aprix;}
function settaux($taux) {$this->taux=$taux;}
function setnprix($NPrix) {$this->nprix=$nprix;}
function setquantite($quantite) {$this->quantite=$quantite;}
function setetat($etat) {$this->etat=$etat;}
	function setimage($image) {$this->image=$image;}
function setdatee($datee) {$this->datee=$datee;}

}
?>
