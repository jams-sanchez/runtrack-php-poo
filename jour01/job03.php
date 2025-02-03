<?php

class Personne
{

    public string $nom;
    public string $prenom;

    public function __construct(string $prenom = 'John', string $nom = 'Doe')
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    function SePresenter()
    {
        $result = "Je suis $this->prenom $this->nom";
        return $result;
    }
}

$personne = new Personne();
echo ($personne->SePresenter());

echo "<br>";

$personne2 = new Personne('Jean', 'Dupond');
echo ($personne2->SePresenter());
