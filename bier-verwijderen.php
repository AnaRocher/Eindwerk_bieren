<?php 

$foutmeldingen = [];
include 'includes/database.php';


$query = $pdo->prepare('SELECT * FROM brouwerij');
$query->execute([]);
$brouwerij = $query->fetchAll();

if ($_POST) {
  
    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('DELETE FROM bieren WHERE id=:id');
        $query->execute([
            'id' => $_GET['id']
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

        <p class="text-2xl font-semibold">Bier verwijderen</p>

        <div class="mt-4 mb-12">
            <a href="index.php" class="text-blue-500 underline">Terug naar overzicht</a>
        </div>

        <div class="">
            <form method="post" class="grid gap-8 max-w-4xl">

                <p class="text-xl">
                    Ben je zeker dat je "Duvel" van brouwerij "<a href="brouwerij.php?id=1"
                        class="text-blue-500 underline">Moortgat</a>" wilt verwijderen?
                </p>

                <p>
                    Deze handeling verwijderd ook alle bijhorende orders.
                </p>
                <div class="flex items-center gap-4">
                    <input type="submit" value="Verwijderen"
                        class="cursor-pointer p-2 bg-red-500 text-red-100 inline-block">
                    <a href="index.php" class="text-blue-500 underline">annuleren</a>
                </div>
            </form>
        </div>

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>