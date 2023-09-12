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
    if (empty($_POST['password_confirmatie'])) {
        $foutmeldingen['password_confirmatie'] = 'Password confirmatie is verplicht.';
    }
    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $query->execute([
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        ]);
        
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

        <p class="text-2xl font-semibold">Registreren</p>

        <div class="mt-12">
            <form method="post" class="grid gap-4 max-w-lg">
                <div>
                    <label for="username">Username:</label>
                    <input value="<?php echo $_POST['username'] ?? '' ?>" type="text" id="username"
                        class="w-full bg-neutral-100 p-2 block">
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

                <div>
                    <label for="password_confirmation">Wachtwoord confirmatie:</label>
                    <input type="password" id="password_confirmation" class="w-full bg-neutral-100 p-2 block">
                    <?php if (isset($foutmeldingen['password_confirmatie'])): ?>
                    <span class="text-red-500"><?php echo $foutmeldingen['password_confirmatie'] ?></span>
                    <?php endif ?>
                </div>

                <div class="flex items-center gap-4">
                    <input type="submit" value="Registreren"
                        class="cursor-pointer p-2 bg-green-500 text-green-100 inline-block">
                </div>
            </form>
        </div>
    </div>

</body>

</html>