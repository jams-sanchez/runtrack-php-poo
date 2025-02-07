<?php

// Créer une classe commande
class Commande
{
    // avec les attributs privés: numero de commande, liste de plats commandés et statut de la commande
    private int $numCommande;
    private array $platsCommande;
    private string $statutCommande;

    public function __construct(int $numCommande = 0)
    {
        $this->numCommande = $numCommande;
        $this->platsCommande = $platsCommande = array();
        $this->statutCommande = $statutCommande = "En cours";
    }

    // augmente de 1 le numéro de commande

    public function get_numCommande(): int | string
    {
        return "Commande numéro: " . $this->numCommande;
    }

    public function set_numCommande(): int | string
    {
        if ($this->numCommande >= 0) {
            $this->numCommande++;
            return $this->get_numCommande()
                . "<br>" . $this->get_statutCommande();
        }
    }

    // defini le statut de la commande


    public function get_statutCommande(): string
    {
        return "Statut de la commande: " . $this->statutCommande;
    }

    public function annuleCommande(): void
    {
        $this->statutCommande = "Annulée";
    }

    public function termineCommande(): void
    {
        $this->statutCommande = "Terminée";
    }

    // Créer une méthode qui permet d'ajouter un plat

    public function get_platsCommande()
    {
        return var_dump($this->platsCommande);
    }

    public function ajouterPlat($nomPlat, $prixPlat)
    {
        $this->platsCommande[] = [
            "nom" => $nomPlat,
            "prix" => $prixPlat
        ];
    }

    // Créer une méthode privé pour calculer le total de la commande

    private function calculerTotal()
    {
        $total = 0;
        foreach ($this->platsCommande as $plat) {
            $total += $plat["prix"];
        }
        return $total;
    }

    // Méthode pour calculer la TVA (en supposant une TVA de 20%)
    public function calculerTVA()
    {
        $total = $this->calculerTotal();
        return $total * 0.20;  // TVA à 20%
    }

    // Méthode pour afficher la commande avec son total à payer

}

$commande = new Commande();
echo $commande->set_numCommande();
// echo "<br>" .  $commande->set_statutCommande("En cours");
$commande->ajouterPlat("Burger", "19.5");
$commande->ajouterPlat("Frites", "6");

$commande->get_platsCommande();

echo "<br><br>";

echo "<br><br><br><br>";


echo "<br><br><br>";
