<?php

include 'includes/database.php';
$foutmeldingen = [];
$success = false;

if ($_POST) {
    if (empty($_POST['naam'])) {
        $foutmeldingen['naam'] = 'Naam is verplicht.';
    }
    if (empty($_POST['email'])) {
        $foutmeldingen['email'] = 'E-mailadres is verplicht.';
    }
    if (empty($_POST['adres'])) {
        $foutmeldingen['adres'] = 'Straat is verplicht.';
    }
    if (!isset($_POST['gemeente'])) {
        $foutmeldingen['gemeente'] = 'Gemeente is verplicht.';
    }
    if (empty($_POST['aantal'])) {
        $foutmeldingen['aantal'] = 'Aantal is verplicht.';
    }
    if (empty($_POST['accept'])) {
        $foutmeldingen['accept'] = 'Je moet de voorwaarden accepteren.';
    }

    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $query->execute([
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        ]);
        $success = true;
        header('location: index.php');
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

        <p class="text-2xl font-semibold">Bier bestellen</p>

        <div class="mt-4 mb-12">
            <a href="index.php" class="text-blue-500 underline">Terug naar overzicht</a>
        </div>

        <?php if ($success) : ?>
        <div class="bg-green-500 text-green-100 p-4 rounded inline-block my-4">
            Jouw bestelling is geplaatst!
        </div>
        <p class="text-xl">
            Je plaatst een bestelling voor het bier: "Duvel".
        </p>
        <p>
            Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Moortgat</a>
        </p>
        <?php else : ?>
        <div class="mt-12">
            <form method="post" class="grid gap-4 max-w-lg">
                <?php include('./includes/bestel-formulier.php') ?>
                <div class="flex items-center gap-4">
                    <input type="submit" value="Bestellen maar"
                        class="cursor-pointer p-2 bg-green-500 text-green-100 inline-block">
                    <a href="index.php" class="text-blue-500 underline">annuleren</a>
                </div>
            </form>
            <?php endif ?>
        </div>

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>