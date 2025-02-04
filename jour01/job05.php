<?php

class Animal
{

    public int $age;
    public string $prenom;

    public function __construct(?int $age = 0, string $prenom = "")
    {
        $this->age = $age;
        $this->prenom = $prenom;
    }

    public function afficheAge()
    {
        return "L'age de l'animal $this->age ans";
    }

    public function vieillir()
    {
        $this->age += 1;
        return "L'age de l'animal $this->age ans";
    }

    public function nommer($prenom)
    {
        $this->prenom = $prenom;
        return "L'animal se nomme $this->prenom";
    }
}

$animal = new Animal();
echo ($animal->afficheAge());
echo "<br>" . ($animal->vieillir());
echo "<br>" . ($animal->vieillir());
echo "<br>" . ($animal->vieillir());
echo "<br>" . ($animal->nommer('Jack'));
