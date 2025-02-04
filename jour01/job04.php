<?php

class Point
{

    public int $x;
    public int $y;

    public function __construct(?int $x = 1, ?int $y = 2)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function afficherLesPoints()
    {
        $deuxPoints = "x = $this->x ; y = $this->y";
        return $deuxPoints;
    }

    function afficherX()
    {
        return "x = $this->x";
    }

    function afficherY()
    {
        return "y = $this->y";
    }

    function changerX($newX)
    {
        $this->x = $newX;
        return "nouvelle valeur x = $newX";
    }

    function changerY($newY)
    {
        $this->y = $newY;
        return "nouvelle valeur y = $newY";
    }
}

$result = new Point();
echo $result->afficherLesPoints();
echo "<br><br>" . $result->afficherX();
echo "<br>" . $result->changerX(10);
echo "<br>" . $result->afficherX();
echo "<br><br>" .  $result->afficherY();
echo "<br>" . $result->changerY(20);
echo "<br>" . $result->afficherY();
echo "<br><br>" . $result->afficherLesPoints();
