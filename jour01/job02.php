<?php

class Operation
{

    public int $nombre1;
    public int $nombre2;

    public function __construct(?int $nombre1 = 1, ?int $nombre2 = 2)
    {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }

    function addition()
    {
        $addition = $this->nombre1 + $this->nombre2;
        $result = "le résultat de l'addition du nombre $this->nombre1 et du nombre $this->nombre2 est de $addition";
        return $result;
    }
}

$operation = new Operation(5, 3);
echo ($operation->addition());
