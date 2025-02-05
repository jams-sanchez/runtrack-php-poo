<?php


// A l'aide de la classe Personne, Eleve et Professeur créé au-dessus
require_once('job01.php');

// Faites dire bonjour à votre élève 
echo "<br>" . $eleve->bonjour();
echo "<br>" . $eleve->allerEnCours();

// Modifier l'age de l'élève à 15 ans
$eleve->modifierAge(15);
echo "<br>" . $eleve->afficherAge();

echo "<br><br>";

// Créer un Professeur, 40 ans
$professeur = new Professeur("histoire", 40);

// Faite dire bonjour à votre professeur
echo "<br>" . $professeur->bonjour();

// et commencer le cours avec la méthode enseigner
echo "<br>" . $professeur->enseigner();
