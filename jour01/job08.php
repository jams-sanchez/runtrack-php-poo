<?php

class Produit
{

    public string $nom;
    public float $prixHT;
    public float $TVA;
    public float $prixTTC;

    public function __construct(string $nom = "", float $prixHT = 0, float $TVA = 0, float $prixTTC = 0)
    {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
        $this->TVA = $TVA;
        $this->prixTTC = $prixTTC;
    }

    public function changerNom(string $newNom): string
    {
        $this->nom = $newNom;
        return "Produit : $this->nom";
    }

    public function changerPrixHT(float $newPrix): string
    {
        $this->prixHT = $newPrix;
        return "Prix HT : $this->prixHT €";
    }

    public function changerTVA(float $newTVA): string
    {
        $this->TVA = $newTVA;
        return "TVA : $this->TVA %";
    }

    public function calculerPrixTTC(): string
    {
        $calcul = $this->prixHT * $this->TVA / 100;
        $this->prixTTC =  $this->prixHT + $calcul;
        return "Prix TTC : $this->prixTTC €";
    }

    public function afficher(): string
    {
        return "Infos du produit : 
        <br> Nom produit : $this->nom
        <br> Prix HT : $this->prixHT €
        <br> TVA : $this->TVA %
        <br> Prix TTC : $this->prixTTC €";
    }
}

$produit1 = new Produit();
// change le nom du produit
$produit1->changerNom("Table");
// change son prix HT 
$produit1->changerPrixHT(23.50);
// change la TVA
$produit1->changerTVA(20);
// calcule le prix TTC
$produit1->calculerPrixTTC();
// affiche toutes les informations du produit
echo $produit1->afficher();

$produit2 = new Produit();
$produit2->changerNom('Yaourt');
$produit2->changerPrixHT(2);
$produit2->changerTVA(5.5);
$produit2->calculerPrixTTC();
echo "<br><br>" . $produit2->afficher();
