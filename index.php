<?php

$foutmeldingen = [];
include 'includes/database.php';

$query = $pdo->prepare('SELECT * FROM brouwerij');
$query->execute([]);
$brouwerij = $query->fetchAll();

$query = $pdo->prepare('SELECT * FROM bieren');
$query->execute([]);
$bieren = $query->fetchAll();

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

        <?php include('./includes/admin-menu.php') ?>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach($bieren as $bier): ?>
            <div class="bg-neutral-100 p-4 flex flex-col relative">

                <div class="absolute top-0 inset-x-0 text-center transform -translate-y-1/2 bg-neutral-200 rounded">
                    <a href="bier-aanpassen.php?id=<?php echo $bier['id']?>"
                        class="text-orange-500 underline">aanpassen</a> <a
                        href="bier-verwijderen.php?id=<?php echo $bier['id']?>"
                        class="text-red-500 underline">verwijderen</a>
                </div>
                <div class="flex-1">
                    <header class="mb-4">
                        <p class="text-lg font-semibold <?php echo $bier['id'] ?>"><?php echo $bier['naam']?></p>
                        <p class="text-neutral-500 italic text-sm mb-2 <?php echo $bier['id'] ?>">
                            <?php echo $bier['beschrijving']?></p>
                        <p>Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Moortgat</a></p>
                        <p>Prijs: &euro;<?php echo $bier['prijs']?> per flesje</p>
                    </header>
                    <p class="text-orange-500 <?php echo $bier['stock'] ?>">Nog maar <?php echo $bier['stock'] ?> in
                        stock!</p>
                </div>
                <p class="mt-2"><a href="bestellen.php?id=1"
                        class="bg-green-500 text-green-100 px-2 py-1 rounded inline-block">Bestellen!</a></p>

            </div>
            <?php endforeach ?>
        </div>

        <!--
            <div class="bg-neutral-100 p-4 flex flex-col relative">
                <div class="absolute top-0 inset-x-0 text-center transform -translate-y-1/2 bg-neutral-200 rounded">
                    <a href="bier-aanpassen.php?id=1" class="text-orange-500 underline">aanpassen</a> <a
                        href="bier-verwijderen.php?id=1" class="text-red-500 underline">verwijderen</a>
                </div>
                <div class="flex-1">
                    <header class="mb-4">
                        <p class="text-lg font-semibold">Leffe Bruin</p>
                        <p class="text-neutral-500 italic text-sm mb-2">Lekker pittig, maar ook fruitig.</p>
                        <p>Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Leffe</a></p>
                        <p>Prijs: &euro;3,5 per flesje</p>
                    </header>
                    <p class="text-green-500">Voorradig</p>
                </div>
                <p class="mt-2"><a href="bestellen.php?id=1"
                        class="bg-green-500 text-green-100 px-2 py-1 rounded inline-block">Bestellen!</a></p>
            </div>

            <div class="bg-neutral-100 p-4 flex flex-col relative">
                <div class="absolute top-0 inset-x-0 text-center transform -translate-y-1/2 bg-neutral-200 rounded">
                    <a href="bier-aanpassen.php?id=1" class="text-orange-500 underline">aanpassen</a> <a
                        href="bier-verwijderen.php?id=1" class="text-red-500 underline">verwijderen</a>
                </div>
                <div class="flex-1">
                    <header class="mb-4">
                        <p class="text-lg font-semibold">Leffe Blond</p>
                        <p class="text-neutral-500 italic text-sm mb-2">Lekker pittig, maar ook fruitig.</p>
                        <p>Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Leffe</a></p>
                        <p>Prijs: &euro;3,5 per flesje</p>
                    </header>
                   
                </div>
            </div>

            <div class="bg-neutral-100 p-4 flex flex-col relative">
                <div class="absolute top-0 inset-x-0 text-center transform -translate-y-1/2 bg-neutral-200 rounded">
                    <a href="bier-aanpassen.php?id=1" class="text-orange-500 underline">aanpassen</a> <a
                        href="bier-verwijderen.php?id=1" class="text-red-500 underline">verwijderen</a>
                </div>
                <div class="flex-1">
                    <header class="mb-4">
                        <p class="text-lg font-semibold">La Chouffe</p>
                        <p class="text-neutral-500 italic text-sm mb-2">Lekker pittig, maar ook fruitig.</p>
                        <p>Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Chouffe</a></p>
                        <p>Prijs: &euro;3,5 per flesje</p>
                    </header>
                    <p class="text-green-500">Voorradig</p>
                </div>
                <p class="mt-2"><a href="bestellen.php?id=1"
                        class="bg-green-500 text-green-100 px-2 py-1 rounded inline-block">Bestellen!</a></p>
            </div>

            <div class="bg-neutral-100 p-4 flex flex-col relative">
                <div class="absolute top-0 inset-x-0 text-center transform -translate-y-1/2 bg-neutral-200 rounded">
                    <a href="bier-aanpassen.php?id=1" class="text-orange-500 underline">aanpassen</a> <a
                        href="bier-verwijderen.php?id=1" class="text-red-500 underline">verwijderen</a>
                </div>
                <div class="flex-1">
                    <header class="mb-4">
                        <p class="text-lg font-semibold">Mc Chouffe</p>
                        <p class="text-neutral-500 italic text-sm mb-2">Lekker pittig, maar ook fruitig.</p>
                        <p>Brouwerij: <a href="brouwerij.php?id=1" class="text-blue-500 underline">Chouffe</a></p>
                        <p>Prijs: &euro;3,5 per flesje</p>
                    </header>
                    <p class="text-green-500">Voorradig</p>
                </div>
                <p class="mt-2"><a href="bestellen.php?id=1"
                        class="bg-green-500 text-green-100 px-2 py-1 rounded inline-block">Bestellen!</a></p>
            </div>
        </div> -->

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>