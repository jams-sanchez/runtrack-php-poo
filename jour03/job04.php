<?php

// Créer une classe Forme possédant une méthode nommée aire() qui renvoie 0

class Forme
{

    public function aire(): int | float
    {
        return 0;
    }
}

// Créer une classe Rectangle qui hérite de la classe Forme

class Rectangle extends Forme
{

    // et qui possède deux attributs 'largeur' et 'hauteur'
    public int $largeur;
    public int $longueur;

    public function __construct(int $largeur, int $longueur)
    {
        $this->largeur = $largeur;
        $this->longueur = $longueur;
    }

    // surcharger la méthode aire() dans la classe Rectangle afin qu'elle renvoie l'aire du rectangle
    public function aire(): int | float
    {
        return $this->largeur * $this->longueur;
    }
}

// afficher le resultat de la méthode aire() pour le rectangle
$rectangle = new Rectangle(10, 20);
echo "L'aire de ce rectangle est de : " . $rectangle->aire();
