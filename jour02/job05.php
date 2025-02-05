<?php

// Créer une classe Voiture 
class Voiture
{

    // qui a pour attribut privés 'marque', 'modele', 'annee', 'kilometrage'
    private string $marque;
    private string $modele;
    private int $annee;
    private int $kilometrage;
    // et un attribut nommée 'enMarche' initialisé à False
    public bool $enMarche;
    // Ajouter l'attribut privé 'reservoir' qui est initialisé à 50 par défaut
    private int $reservoir;

    public function __construct(
        string $marque,
        string $modele,
        int $annee,
        int $kilometrage,
        int $reservoir = 50,
        bool $enMarche = False
    ) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
        $this->reservoir = $reservoir;
        $this->enMarche = $enMarche;
    }

    // Creer des mutateurs et assesseurs pour chaque attribut

    // Marque
    public function getMarque(): string
    {
        return $this->marque;
    }
    public function setMarque($newMarque): string
    {
        return $this->marque = $newMarque;
    }
    // Modele
    public function getModele(): string
    {
        return $this->modele;
    }
    public function setModele($newModele): string
    {
        return $this->modele = $newModele;
    }
    // Annee
    public function getAnnee(): int
    {
        return $this->annee;
    }
    public function setAnnee($newAnnee): int
    {
        return $this->annee = $newAnnee;
    }
    // Kilometrage
    public function getKilometrage(): int
    {
        return $this->kilometrage;
    }
    public function setKilometrage($newKm): int
    {
        return $this->kilometrage = $newKm;
    }
    // EnMarche
    public function getEnMarche(): string
    {
        if ($this->enMarche == True) {
            return "La voiture est démarré ! Vroom Vroom !";
        } else {
            return "La voiture est arreté.";
        }
    }
    // reservoir
    public function setReservoir($newReservoir): int
    {
        return $this->reservoir = $newReservoir;
    }


    // Créer une méthode démarrer() qui change la valeur de l'attribut 'enMarche' en True
    // bis- Si la valeur du reservoir est supérieur à 5 la voiture peut démarrer
    public function demarrer(): string
    {
        if ($this->verifierPlein() > 5) {
            $this->reservoir -= 10; // chaque démarrage coute 10L (parce que j'ai envie)
            $this->enMarche = True;
            return $this->getEnMarche();
        } else {
            return "La voiture n'a pas assez d'essence pour demarrer...";
        }
    }

    // Créer une méthode arreter() qui change la valeur de l'attribut 'enMarche' en False
    public function arreter(): string
    {
        $this->enMarche = False;
        return $this->getEnMarche();
    }

    // Créer une méthode privée 'verifierPlein()' qui retourne la valeur de l'attribut reservoir
    public function getVerifierPlein(): int
    {
        return $this->verifierPlein();
    }

    private function verifierPlein(): int
    {
        return $this->reservoir;
    }
}

$voiture = new Voiture('Seat', 'Ibiza', 2009, 240000);
echo "Reservoir = " . $voiture->getVerifierPlein() . " L";
echo "<br>" . $voiture->demarrer();
echo "<br> Reservoir = " . $voiture->getVerifierPlein() . " L";
echo "<br>" . $voiture->arreter();
echo "<br>" . $voiture->demarrer();
