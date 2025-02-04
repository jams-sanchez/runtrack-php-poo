<?php

class Livre
{

    private string $titre;
    private string $auteur;
    private int $nbPages;

    private bool $disponible;

    public function __construct(string $titre = "", string $auteur = "", int $nbPages = 0, bool $disponible = True)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
        $this->disponible = $disponible;
    }

    // méthode récupération et affichage des valeurs

    public function getTitre(): string
    {
        return "Titre : $this->titre";
    }

    public function getAuteur(): string
    {
        return "Auteur : $this->auteur";
    }

    public function getNbPages(): string
    {
        return "Nombre de pages : $this->nbPages";
    }

    public function getDisponible(): string
    {
        if ($this->disponible == True) {
            return "le livre est disponible";
        } else {
            return "le livre n'est pas disponible";
        }
    }

    // méthode modification des valeurs

    public function setTitre(string $newTitre)
    {
        $this->titre = $newTitre;
    }

    public function setAuteur(string $newAuteur)
    {
        $this->auteur = $newAuteur;
    }

    public function setNbPages($newNbPages)
    {
        if ($newNbPages >= 0 and is_int($newNbPages)) {
            $this->nbPages = $newNbPages;
            return "Le nombre de page a bien été modifié";
        } else {
            return "Erreur, le nombre de pages doit être entier et positif ! ";
        }
    }

    // vérification si le livre est disponible

    public function verification(): bool
    {
        if ($this->disponible == True) {
            return True; // livre disponible
        } else {
            return False; // livre indisponible
        }
    }

    // méthode emprunter 

    public function emprunter()
    {
        if ($this->verification() == True) {
            $this->disponible = False; // livre emprunter
        }
    }

    // méthode rendre 

    public function rendre()
    {
        if ($this->verification() == False) {
            $this->disponible = True; // livre rendu
        }
    }
}

$livre = new Livre();

echo $livre->getDisponible();

$livre->emprunter();
echo "<br>" . $livre->getDisponible();

$livre->emprunter();
echo "<br>" . $livre->getDisponible();

$livre->rendre();
echo "<br>" . $livre->getDisponible();
