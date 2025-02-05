<?php

// Créer une classe Vehicule
class Vehicule
{

    // avec comme attributs 'marque', 'modele', 'année' et 'prix'
    public string $marque;
    public string $modele;
    public int $annee;
    public float $prix;

    public function __construct(string $marque, string $modele, int $annee, float $prix)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

    // Créer la méthode informationsVehicule()
    public function informationsVehicule()
    {
        return "Marque = " . $this->marque .
            "<br> Modèle = " . $this->modele .
            "<br> Année = " . $this->annee .
            "<br> Prix = " . $this->prix;
    }

    // Créer la méthode demarrer() dans la classe Vehicule
    public function demarrer(): string
    {
        return "Attention, je roule ! ";
    }
}

// Créer la classe Voiture qui hérite de la classe Vehicule

class Voiture extends Vehicule
{

    // ajouter un attribut 'portes' qui contient le nombre entier 4
    public int $portes;

    public function __construct($marque, $modele, $annee, $prix, int $portes = 4)
    {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->portes = $portes;
    }

    // Créer une méthode informationsVehicule() qui affiche les informations générales du véhicule 
    // et le nombre de portes de la voiture

    public function informationsVehicule()
    {
        return "Marque = " . $this->marque .
            "<br> Modele = " . $this->modele .
            "<br> Année = " . $this->annee .
            "<br> Prix = " . $this->prix . " €" .
            "<br> Nombre de porte = " . $this->portes;
    }

    // Surcharger la méthode demarrer() dans la classe Voiture
    public function demarrer(): string
    {
        return parent::demarrer() . " vroom, vroom !";
    }
}

// Créer une classe Moto qui hérite de la classe Vehicule
class Moto extends Vehicule
{

    // ajouter l'attribut roue qui contient le nombre 2 par défaut
    public int $roue;

    public function __construct($marque, $modele, $annee, $prix, int $roue = 2)
    {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->roue = $roue;
    }

    // Créer à nouveau une méthode informationsVehicule() dans la classe Moto
    // qui affiche l'intégralité des informations de la moto

    public function informationsVehicule()
    {
        return "Marque = " . $this->marque .
            "<br> Modele = " . $this->modele .
            "<br> Année = " . $this->annee .
            "<br> Prix = " . $this->prix . " €" .
            "<br> Nombre de roue = " . $this->roue;
    }

    // Surcharger la méthode demarrer() dans la classe Moto
    public function demarrer(): string
    {
        return "BrouBrouBrou ! Je roule";
    }
}

// Instancier une voiture et afficher ses informations
$voiture = new Voiture('Mercedes', 'Classe A', 2020, 18500);
echo $voiture->informationsVehicule();
echo "<br>" . $voiture->demarrer();

// Instancier une Moto et afficher ses informations
echo "<br><br>";
$moto = new Moto('Yamaha', '1200 Vmax', 1987, 4500);
echo "<br>" . $moto->informationsVehicule();
echo "<br>" . $moto->demarrer();
