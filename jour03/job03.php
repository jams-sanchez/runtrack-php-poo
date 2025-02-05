<?php

// Créer une classe Rectangle
class Rectangle
{

    // avec comme attribut privé longueur et largeur
    private int $longueur;
    private int $largeur;

    public function __construct(?int $longueur, ?int $largeur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    // Créer les assesseurs et mutateurs
    public function getLongueur(): int
    {
        return $this->longueur;
    }
    public function getLargeur(): int
    {
        return $this->largeur;
    }

    // Créer la méthode perimetre qui calcule le périmètre du rectangle
    public function perimetre(): int
    {
        return ($this->getLongueur() + $this->getLargeur()) * 2;
    }

    // Créer la méthode surface qui calcule la surface du rectangle
    public function surface(): int
    {
        return ($this->getLongueur() * $this->getLargeur());
    }
}

// Créer une classe Parallelepipede héritant de la classe Rectangle
class Parallelepipede extends Rectangle
{
    // avec en attribut hauteur
    public int $hauteur;

    public function __construct(int $longueur, int $largeur, int $hauteur)
    {
        parent::__construct($longueur, $largeur);
        $this->hauteur = $hauteur;
    }

    public function getHauteur(): int
    {
        return $this->hauteur;
    }

    // Créer une méthode volume() qui calcule le volume du parallelepipede
    public function volume(): int
    {
        return ($this->getLongueur() * $this->getLargeur() * $this->getHauteur());
    }
}

// Affichage des valeurs
$rectangle = new Rectangle(10, 5);
echo "<strong>Rectangle :</strong>";
echo "<br> Longueur: " . $rectangle->getLongueur();
echo "<br> Largeur: " . $rectangle->getLargeur();
echo "<br> Perimètre: " . $rectangle->perimetre();
echo "<br> Surface: " . $rectangle->surface();

echo "<br><br>";
echo "<strong>Parallelepipede :</strong>";
$parallelepipede = new Parallelepipede(10, 5, 13);
echo "<br> Longueur: " . $parallelepipede->getLongueur();
echo "<br> Largeur: " . $parallelepipede->getLargeur();
echo "<br> Hauteur: " . $parallelepipede->getHauteur();
echo "<br> Volume: " . $parallelepipede->volume();
