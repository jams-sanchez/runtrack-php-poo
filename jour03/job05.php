<?php

// recuperer votre classe Forme
require_once('job04.php');


// créer une classe nommée Cercle qui hérite de la classe forme 

class Cercle extends Forme
{

    public int $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    // Créer une méthode qui calcule l'aire du cercle

    public function aire(): float
    {
        return round(M_PI * $this->radius * $this->radius, 2);
    }
}

$cercle = new Cercle(12);
echo "<br> L'aire de ce cercle est de: " . $cercle->aire();
