<?php

class Rectangle
{

    private int $longueur;
    private int $largeur;

    public function __construct(?int $longueur, ?int $largeur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function getLongueur(): string
    {
        return "Longueur : $this->longueur";
    }
    public function getLargeur(): string
    {
        return "Largeur : $this->largeur";
    }

    public function setLongueur($newLongueur): string
    {
        $this->longueur = $newLongueur;
        return "Longueur: $this->longueur";
    }

    public function setLargeur($newLargeur): string
    {
        $this->largeur = $newLargeur;
        return "Largeur: $this->largeur";
    }
}

// créer un rectangle avec les valeurs longueur 10 et largeur 5
$rectangle = new Rectangle(10, 5);

// affiche les valeurs longueur et largeur
echo $rectangle->getLongueur();
echo "<br>" . $rectangle->getLargeur();

// modifie les valeurs longueur et largeur
$rectangle->setLongueur(12);
$rectangle->setLargeur(10);

// affiche la nouvelle valeur de longueur et largeur
echo "<br><br> nouvelle valeur de longueur et largeur <br>";
echo "<br>" . $rectangle->getLongueur();
echo "<br>" . $rectangle->getLargeur();
