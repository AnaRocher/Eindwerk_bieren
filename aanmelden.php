<?php

include 'includes/database.php';

$foutmeldingen = [];

if ($_POST) {
    if (empty($_POST['username'])) {
        $foutmeldingen['username'] = 'Username is verplicht.';
    }
    if (empty($_POST['password'])) {
        $foutmeldingen['password'] = 'Password is verplicht.';
    }
    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('SELECT * FROM users WHERE username=:username LIMIT 1');
        $query->execute([
            'username' => $_POST['username']
        ]);
        $user = $query->fetch();        

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header('location: index.php');
            exit;
        } else {
    $foutmeldingen['username'] = 'We kunnen je niet aanmelden met deze gegevens.';
}
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

        <p class="text-2xl font-semibold">Aanmelden</p>

        <div class="mt-4 mb-12">
            <a href="index.php" class="text-blue-500 underline">Terug naar overzicht</a>
        </div>

        <div class="">
            <form method="post" class="grid gap-4 max-w-lg">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="w-full bg-neutral-100 p-2 block"
                        value="<?php echo $_POST['username'] ?? '' ?>">
                    <?php if (isset($foutmeldingen['username'])): ?>
                    <span class="text-red-500"><?php echo $foutmeldingen['username'] ?></span>
                    <?php endif ?>
                </div>

                <div>
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" class="w-full bg-neutral-100 p-2 block">
                    <?php if (isset($foutmeldingen['password'])): ?>
                    <span class="text-red-500"><?php echo $foutmeldingen['password'] ?></span>
                    <?php endif ?>
                </div>

                <div class="flex items-center gap-4">
                    <input type="submit" value="Aanmelden"
                        class="cursor-pointer p-2 bg-green-500 text-green-100 inline-block">
                    <a href="index.php" class="text-blue-500 underline">annuleren</a>
                </div>
            </form>
        </div>

        <?php include('./includes/footer.php') ?>
    </div>

</body>

</html>