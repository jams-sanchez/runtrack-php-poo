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

    function nombres()
    {
        $result = "le nombre 1 est $this->nombre1 et le nombre 2 est $this->nombre2";
        return $result;
    }
}

$operation = new Operation(5, 3);
echo ($operation->nombres());
