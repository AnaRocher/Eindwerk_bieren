<?php

$foutmeldingen = [];
include 'includes/database.php';
include 'includes/bier-validatie.php';

if ($_POST) {
    if (empty($_POST['naam'])) {
        $foutmeldingen['naam'] = 'Naam is verplicht.';
    }
    
    if (empty($_POST['beschrijving'])) {
        $foutmeldingen['beschrijving'] = 'Beschrijving is verplicht.';
    }
    if (!isset($_POST['brouwerij'])) {
        $foutmeldingen['brouwerij'] = 'Brouwerij is verplicht.';
    }
    if (empty($_POST['stock'])) {
        $foutmeldingen['stock'] = 'Stock is verplicht.';
    }
    if (empty($_POST['prijs'])) {
        $foutmeldingen['prijs'] = 'Prijs is verplicht.';
    }

    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('UPDATE bieren (naam, bescrhijving, brouwerij_id, prijs, stock) SET (:nam, :bescrhijving, :brouwerij_id, :prijs, :stock)');
        $query->execute([
            'naam' => $_POST['naam'],
            'bescrhijving' => $_POST['bescrhijving'],
            'bescrhijving' => $_POST['bescrhijving'],
            'brouwerij_id' => $_POST['brouwerij_id'],
            'prijs' => $_POST['prijs'],
            'stock' => $_POST['stock']
        ]);
        header('location:index.php');
        exit;
    }
    else {
        $query = $pdo->prepare('SELECT * FROM bieren WHERE id=:id');
        $query->execute([
            'id' => $_GET['id']
        ]);
        $_POST = $query->fetch();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bieren</title>
</head>

<body>

    <div class="container mx-auto">
        <h1 class="text-4xl mt-8">Bieren winkel</h1>

        <p class="text-2xl font-semibold">Bier aanpassen</p>

        <div class="mt-4 mb-12">
            <a href="index.php" class="text-blue-500 underline">Terug naar overzicht</a>
        </div>

        <div class="">
            <form method="post" class="grid gap-4 max-w-lg">
                <?php include('./includes/bier-formulier.php') ?>
                <div class="flex items-center gap-4">
                    <input type="submit" value="Aanpassen"
                        class="cursor-pointer p-2 bg-orange-500 text-orange-100 inline-block">
                    <a href="index.php" class="text-blue-500 underline">annuleren</a>
                </div>
            </form>
        </div>

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>