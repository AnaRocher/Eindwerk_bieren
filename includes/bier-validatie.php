<?php

if (empty($_POST['naam'])) {
    $foutmeldingen['naam'] = "Naam is verplicht.";
}

if (empty($_POST['beschrijving'])) {
    $foutmeldingen['beschrijving'] = "Beschrijving is verplicht.";
}

if (!isset($_POST['brouwerij'])) {
    $foutmeldingen['brouwerij'] = "Brouwerij is verplicht.";
}

if (empty($_POST['stock'])) {
    $foutmeldingen['stock'] = "Stock is verplicht.";
}

if (empty($_POST['prijs'])) {
    $foutmeldingen['prijs'] = "Prijs is verplicht.";
}