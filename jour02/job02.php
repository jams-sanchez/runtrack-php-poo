<?php

class Livre
{

    private string $titre;
    private string $auteur;
    private int $nbPages;

    public function __construct(string $titre = "", string $auteur = "", int $nbPages = 0)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
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
}

// création du livre
$livre = new Livre();
// affichage des valeurs par defaut 
echo $livre->getTitre();
echo "<br>" . $livre->getAuteur();
echo "<br>" . $livre->getNbPages();

// modification des valeurs du livre créé
$livre->setTitre("Livre Test");
$livre->setAuteur("James");
$livre->setNbPages(10);

// affichage des nouvelles valeurs
echo "<br><br><br> Nouvelles valeurs: <br>";
echo "<br>" . $livre->getTitre();
echo "<br>" . $livre->getAuteur();
echo "<br>" . $livre->getNbPages();

// test pour erreur nombre de pages
echo "<br><br><br> Test erreur nombre de page: <br>";
echo "<br>" . $livre->setNbPages(13.2);
echo "<br>" . $livre->getNbPages();
