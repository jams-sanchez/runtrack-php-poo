<?php

class Student
{

    private string $nom;
    private string $prenom;
    private int $numero;
    private int $credits;
    private string $level;

    public function __construct(string $nom = "", string $prenom = "", int $numero = 0, ?int $credits = 0, string $level = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numero = $numero;
        $this->credits = $credits;
        $this->level = $level;
    }

    // affiche les informations de l'étudiant
    public function getNom(): string
    {
        return "Nom: $this->nom";
    }

    public function getPrenom(): string
    {
        return "Prenom: $this->prenom";
    }

    public function getNumero(): string
    {
        return "ID: $this->numero";
    }

    public function getCredits(): string
    {
        return "Crédits : $this->credits";
    }

    public function getStudentEval(): string
    {
        return $this->studentEval();
    }

    public function getLevel(): string
    {
        $this->level = $this->getStudentEval();
        return "Niveau : $this->level";
    }

    // affiche les informations de l'étudiant

    public function studentInfo(): string
    {
        $nomEtudiant = $this->getNom();
        $prenomEtudiant = $this->getPrenom();
        $numEtudiant = $this->getNumero();
        $levelEtudiant = $this->getLevel();

        return "$nomEtudiant 
        <br> $prenomEtudiant
        <br> $numEtudiant
        <br> $levelEtudiant";
    }

    // ajoute des crédits
    public function addCredits($addCredits)
    {
        if ($addCredits > 0 and is_int($addCredits)) {
            $this->credits += $addCredits;
        } else {
            return "Erreur, veuillez entrer un nombre entier et positif supérieur à 0";
        }
    }

    // évaluation étudiant

    private function studentEval(): string
    {

        if ($this->credits >= 90) {
            return "Excellent!";
        } elseif ($this->credits >= 80) {
            return "Très Bien";
        } elseif ($this->credits >= 70) {
            return "Bien";
        } elseif ($this->credits >= 60) {
            return "Passable";
        } elseif ($this->credits < 60) {
            return "Insuffisant";
        }
    }
}

$etudiant = new Student('Doe', 'John', 145, 25);
echo $etudiant->getNom();
echo "<br>" . $etudiant->getPrenom();
echo "<br>" . $etudiant->getNumero();
echo "<br>" . $etudiant->addCredits(6.5);
$etudiant->addCredits(6);
$etudiant->addCredits(28);
echo "<br>" . $etudiant->getCredits();
echo "<br><br>" . $etudiant->studentInfo();
