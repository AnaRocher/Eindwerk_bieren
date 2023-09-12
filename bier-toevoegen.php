<?php

$foutmeldingen = [];
include 'includes/database.php';
include 'includes/bier-validatie.php';

if ($_POST) {

    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('INSERT INTO bieren (naam, bescrhijving, brouwerij_id, prijs, stock) VALUES (:nam, :bescrhijving, :brouwerij_id, :prijs, :stock)');
        $query->execute([
            'naam' => $_POST['naam'],
            'bescrhijving' => $_POST['bescrhijving'],
            'brouwerij_id' => $_POST['brouwerij_id'],
            'prijs' => $_POST['prijs'],
            'stock' => $_POST['stock']
        ]);
        header('location:index.php');
        exit;
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

        <p class="text-2xl font-semibold">Bier toevoegen</p>

        <div class="mt-4 mb-12">
            <a href="index.php" class="text-blue-500 underline">Terug naar overzicht</a>
        </div>

        <div class="">
            <form method="post" class="grid gap-4 max-w-lg">
                <?php include('./includes/bier-formulier.php') ?>
                <div class="flex items-center gap-4">
                    <input type="submit" value="Toevoegen"
                        class="cursor-pointer p-2 bg-green-500 text-green-100 inline-block">
                    <a href="index.php" class="text-blue-500 underline">annuleren</a>
                </div>
            </form>
        </div>

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>