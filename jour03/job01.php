<?php


// Créer une classe Personne
class Personne
{

    // avec un attribut age initialisé à 14
    public int $age;

    public function __construct(int $age = 14)
    {
        $this->age = $age;
    }

    // Créer une méthode afficherAge() qui affichera l'age
    public function afficherAge(): int | string
    {
        return $this->age;
    }

    // Créer une méthode bonjour() qui renvoie "Hello"
    public function bonjour(): string
    {
        return "Hello";
    }

    // créer une méthode modifierAge() permettant de modifier l'age
    public function modifierAge(int $newAge): void
    {
        $this->age = $newAge;
    }
}


// Créer une classe Eleve sans attribut qui hérite de la classe Personne

class Eleve extends Personne
{

    // Créer une méthode publique allerEnCours() qui affiche "Je vais en cours"
    public function allerEnCours(): string
    {
        return "Je vais en cours";
    }

    // Créer une méthode afficherAge() qui affiche "J'ai XX ans"
    public function afficherAge(): string
    {
        return ("J'ai $this->age ans");
    }
}


// Créer une classe Professeur 

class Professeur extends Personne
{

    // avec un attribut privé matiereEnseignee
    private string $matiereEnseignee;

    public function __construct(string $matiereEnseignee, int $age)
    {
        $this->matiereEnseignee = $matiereEnseignee;
        parent::__construct($age);
    }

    // Créer une méthode publique enseigner() qui affiche 'Le cours va commencer'
    public function enseigner(): string
    {
        return "Le cours $this->matiereEnseignee va commencer";
    }
}

// Instancier une classe Personne est une classe Eleve
$personne = new Personne();
$eleve = new Eleve();

// Afficher l'âge par défaut de l'élève
echo $eleve->afficherAge();
echo "<br><br><br>";
