<?php

class Personnage
{

    public int $x;
    public int $y;

    public function __construct(int $x = 2, int $y = 5)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function gauche(): string
    {
        $this->x -= 1;
        return "coordonnées x = $this->x";
    }

    public function droite(): string
    {
        $this->x += 1;
        return "coordonnées x = $this->x";
    }

    public function haut(): string
    {
        $this->y += 1;
        return "coordonnées y = $this->y";
    }

    public function bas(): string
    {
        $this->y -= 1;
        return "coordonnées y = $this->y";
    }

    public function position(): string
    {
        return "coordonnées x = $this->x ; coordonnées y = $this->y";
    }
}

$mouvements = new Personnage();
echo ($mouvements->position());
echo "<br>" . ($mouvements->gauche());
echo "<br>" . ($mouvements->position());
echo "<br>" . ($mouvements->gauche());
echo "<br>" . ($mouvements->droite());
echo "<br>" . ($mouvements->haut());
echo "<br>" . ($mouvements->haut());
echo "<br>" . ($mouvements->droite());
echo "<br>" . ($mouvements->position());
