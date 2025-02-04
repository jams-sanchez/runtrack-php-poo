<?php

class Cercle
{

    public int $rayon;

    public float $circonference;
    public float $aire;
    public int $diametre;

    public function __construct(?int $rayon = 0, float $circonference = 0, float $aire = 0, int $diametre = 0)
    {
        $this->rayon = $rayon;

        $this->circonference = $circonference;
        $this->aire = $aire;
        $this->diametre = $diametre;
    }

    public function changerRayon(int $newRayon): string
    {
        $this->rayon = $newRayon;
        return "Le rayon mesure $this->rayon";
    }

    public function circonference(): string
    {
        $circonference = 2 * M_PI * $this->rayon;
        $this->circonference = round($circonference, 3);
        return "La circonférence du cercle est de $this->circonference";
    }

    public function aire(): string
    {
        $aire = M_PI * $this->rayon * $this->rayon;
        $this->aire = round($aire, 3);
        return "L'aire de ce cercle est de $this->aire";
    }

    public function diametre(): string
    {
        $this->diametre = $this->rayon * 2;
        return "Diamètre du cercle = $this->diametre";
    }

    public function afficherInfos(): string
    {
        return "Info du cercle: 
        <br> Rayon = $this->rayon
        <br> Circonférence = $this->circonference
        <br> Aire = $this->aire
        <br> Diamètre = $this->diametre";
    }
}

// créer cercle
$cercle4 = new Cercle();
// change la valeur par defaut par le rayon voulu
$cercle4->changerRayon(4);
// calcule la circonference
$cercle4->circonference();
// calcule l'aire
$cercle4->aire();
// calcule le diametre
$cercle4->diametre();
// affiche toutes les infos ci-dessus
echo $cercle4->afficherInfos();


$cercle7 = new Cercle();
$cercle4->changerRayon(7);
$cercle4->circonference();
$cercle4->aire();
$cercle4->diametre();

echo "<br><br>" . $cercle4->afficherInfos();
