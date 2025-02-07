<?php

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
            array('-', '-', '-', '-', '-', '-', '-', '-', '-');
        $this->joueur = $joueur;
        $this->tour = $tour = 0;
        $this->message = $message = "";
        $this->erreur = $erreur = "";
        $this->verif = $verif = false;
    }

    // nombre de tour
    public function numTour(): int
    {
        if (isset($_POST) and isset($_SESSION['tour'])) {
            $_SESSION['tour'] += 1;
            $this->tour = $_SESSION['tour'];
            return $this->tour;
        } else {
            return $_SESSION['tour'] = 1;
        }
    }

    // changement joueur
    public function joueurSymbole(): string
    {
        $_SESSION['joueur'] = $this->joueur;
        if ($this->joueur == 'X') {
            if ($this->tour % 2 == 0) {
                return $this->joueur = "X";
            } else {
                return $this->joueur = "O";
            }
        } else {
            if ($this->tour % 2 == 0) {
                return $this->joueur = "O";
            } else {
                return $this->joueur = "X";
            }
        }
    }

    // placement des symboles dans la grille

    public function placement(): void
    {
        if (isset($_SESSION['grille'])) {

            $valuePost = array_key_first($_POST);

            if ($_SESSION['grille'][$valuePost - 1] == '-') {
                $_SESSION['grille'][$valuePost - 1] = $this->joueurSymbole();
                $this->grille = $_SESSION['grille'];
            } else {
                $this->message = "choisir une autre case";
                $_SESSION['tour'] -= 1;
            }
        } else {
            $_SESSION['grille'] = $this->grille;
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
            return true;
        } elseif (
            $_SESSION['grille'][3] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][5] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif (
            $_SESSION['grille'][6] == $this->joueur &&
            $_SESSION['grille'][7] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif ( // verif colonne
            $_SESSION['grille'][0] == $this->joueur &&
            $_SESSION['grille'][3] == $this->joueur &&
            $_SESSION['grille'][6] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif (
            $_SESSION['grille'][1] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][7] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif (
            $_SESSION['grille'][2] == $this->joueur &&
            $_SESSION['grille'][5] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif ( // verif diagonal
            $_SESSION['grille'][0] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][8] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif (
            $_SESSION['grille'][2] == $this->joueur &&
            $_SESSION['grille'][4] == $this->joueur &&
            $_SESSION['grille'][6] == $this->joueur
        ) {
            $this->message = $this->joueur . " a gagné !";
            return true;
        } elseif ($this->tour > count($this->grille) - 1) { // verif égalité
            for ($i = 0; $i < count($this->grille); $i++) {
                if ($_SESSION['grille'][$i] != "-") {
                    $this->message = "Egalité";
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}

$jeu = new Jeu("X");
echo "num tour : " . $jeu->numTour();
$jeu->placement();
$jeu->verification();
echo "<br><br>";
echo var_dump($_POST);
echo var_dump($_SESSION['grille']);



echo "<br><br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>tik tak toe</title>
</head>

<body>

    <form method="post" action="jour05.php">

        <?php for ($i = 1; $i <= 9; $i++): ?>
            <input id="case" type="submit" name="<?= $i; ?>" value="<?= $_SESSION['grille'][$i - 1] ?>">
            <?php if ($i % 3 == 0) : ?>
                <br>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if (!empty($jeu->message)): ?>
            <p class="msg"><?= $jeu->message ?></p>
            <input type="submit" id="rejouer" name="rejouer" value="Rejouer">
        <?php endif; ?>
        <?php if (!empty($jeu->erreur)): ?>
            <p class="msg"><?= $jeu->erreur ?></p>
        <?php endif; ?>

    </form>

</body>

</html>