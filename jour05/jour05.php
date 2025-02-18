<?php

// Classe Jeu : Cette classe va gérer l'état du jeu et la logique générale du jeu (gestion des tours, placement des symboles, vérification des combinaisons gagnantes, etc.).
// Classe Grille : Cette classe sera responsable de la gestion de la grille (initialisation, mise à jour et affichage des cases).
// Classe Joueur : Cette classe gère le joueur actuel (son symbole et son tour).

session_start();

class Jeu
{

    public array $grille;
    public string $joueur;
    public int $tour;
    public bool $verif;
    public string $message;
    public string $erreur;

    public function __construct(string $joueur)
    {
        $this->grille = $grille =
            array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
        if (!isset($_SESSION['grille'])) {
            $_SESSION['grille'] = $this->grille;
        }
        $this->joueur = $joueur;
        $this->tour = $tour = 0;
        if (!isset($_SESSION['tour'])) {
            $_SESSION['tour'] = $this->tour;
        }
        $this->message = $message = "";
        $this->erreur = $erreur = "";
        $this->verif = $verif = false;
    }

    // nombre de tour
    public function numTour(): int
    {
        if (!isset($_SESSION['joueur'])) {
            $_SESSION['joueur'] = $this->joueur;
        }

        $_SESSION['tour'] += 1;
        $this->tour = $_SESSION['tour'];
        return $this->tour;
    }

    // changement joueur
    public function joueurSymbole(): string
    {
        if ($this->joueur == 'X') {
            if ($this->tour % 2 == 0) {
                $this->joueur = "X";
                return $_SESSION['joueur'] = $this->joueur;
            } else {
                $this->joueur = "O";
                return $_SESSION['joueur'] = $this->joueur;
            }
        } else {
            if ($this->tour % 2 == 0) {
                $this->joueur = "O";
                return $_SESSION['joueur'] = $this->joueur;
            } else {
                $this->joueur = "X";
                return $_SESSION['joueur'] = $this->joueur;
            }
        }
    }

    // placement des symboles dans la grille

    public function placement(): void
    {
        if (!empty($_POST)) {

            $valuePost = array_key_first($_POST);

            if ($_SESSION['grille'][$valuePost - 1] == ' ') {
                $_SESSION['grille'][$valuePost - 1] = $this->joueurSymbole();
                $this->grille = $_SESSION['grille'];
            } else {
                $this->erreur = "choisir une autre case";
                $this->tour--;
                $_SESSION['tour'] = $this->tour;
            }
        }
    }

    // verifie les combinaisons
    public function verification(): bool
    {

        if ( // verif ligne
            $_SESSION['grille'][0] == $this->joueur &&
            $_SESSION['grille'][1] == $this->joueur &&
            $_SESSION['grille'][2] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (
            $_SESSION['grille'][3] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][5] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (
            $_SESSION['grille'][6] == $this->joueur &&
            $_SESSION['grille'][7] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif ( // verif colonne
            $_SESSION['grille'][0] == $this->joueur &&
            $_SESSION['grille'][3] == $this->joueur &&
            $_SESSION['grille'][6] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (
            $_SESSION['grille'][1] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][7] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (
            $_SESSION['grille'][2] == $this->joueur &&
            $_SESSION['grille'][5] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif ( // verif diagonal
            $_SESSION['grille'][0] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (
            $_SESSION['grille'][2] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][6] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return $this->verif = true;
        } elseif (!in_array(' ', $_SESSION['grille'])) { // verif égalité
            $this->message = "Egalité";
            return $this->verif = true;
        } else {
            return $this->verif = false;
        }
    }

    // methode rejouer
    public function rejouer(): void
    {
        if (isset($_GET['rejouer'])) {
            session_destroy();
            header("Location: jour05.php");
        }
    }

    // deroulement jeu
    public function jouer(): void
    {
        $this->numTour();
        $this->placement();
        $this->verification();
        $this->rejouer();
    }
}

$jeu = new Jeu("X");
$jeu->jouer();
// echo "<br><br>";
// echo "post" . var_dump($_POST);
// echo var_dump($_SESSION);
// echo var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>tik tak toe</title>
</head>

<body>
    <main>
        <section class="game">
            <?php if ($jeu->verif == false): ?>


                <div class="msg-joueur">
                    <?php if (empty($jeu->erreur)): ?>
                        <?php if ($_SESSION['joueur'] == "X" and $jeu->tour > 1): ?>
                            <h1 class="joueur2">Joueur O </h1>
                            <p class="joueur2">c'est à vous de jouer !</p>
                        <?php else: ?>
                            <h1 class="joueur1">Joueur X </h1>
                            <p class="joueur1">c'est à vous de jouer !</p>
                        <?php endif; ?>
                    <?php else : ?>
                        <p class="msg"><?= $jeu->erreur ?></p>
                    <?php endif; ?>
                </div>



                <table>
                    <thead></thead>
                    <tbody>

                        <form method="post" action="">
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <td>
                                    <input id="case" type="submit" name="<?= $i; ?>" value="<?= $_SESSION['grille'][$i - 1] ?>">
                                </td>
                                <?php if ($i % 3 == 0) : ?>
                                    <tr>
                                    </tr>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </form>
                    </tbody>
                </table>

                <div>
                    <p class="tour">
                        Numéro tour : <span><?= $jeu->tour ?></span>
                    </p>
                </div>

            <?php else : ?>
                <form method="get" action="">

                    <div class="msg-joueur">
                        <?php if (!empty($jeu->message)): ?>
                            <p class="msg"><?= $jeu->message ?></p>
                        <?php endif; ?>
                        <input type="submit" id="rejouer" name="rejouer" value="Rejouer">
                    </div>
                </form>
                <table>
                    <thead></thead>
                    <tbody>

                        <form method="post" action="">
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <td>
                                    <p id="case" class="case"><?= $_SESSION['grille'][$i - 1] ?></p>
                                </td>
                                <?php if ($i % 3 == 0) : ?>
                                    <tr>
                                    </tr>
                                <?php endif; ?>
                            <?php endfor; ?>


                        </form>
                    </tbody>
                </table>

                <div>
                    <p class="tour">
                        Numéro tour : <span><?= $jeu->tour ?></span>
                    </p>
                </div>

            <?php endif; ?>

        </section>
    </main>
</body>

</html>