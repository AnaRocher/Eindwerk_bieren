<div>
    <label for="naam">Naam:</label>
    <input value="<?php echo $_POST['naam'] ?? '' ?>" type="text" id="naam" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['naam'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['naam'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="beschrijving">Korte beschrijving:</label>
    <input value="<?php echo $_POST['beschrijving'] ?? '' ?>" type="text" id="beschrijving"
        class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['beschrijving'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['beschrijving'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="brouwerij">Brouwerij:</label>
    <select id="brouwerij_id" class="w-full bg-neutral-100 p-2 block">
        <option <?php if(!isset($_POST['brouwerij_id'])) { echo 'selected'; } ?> disabled selected>-- Kies een brouwerij
        </option>
        <option <?php if(isset($_POST['brouwerij_id']) && $_POST['brouwerij_id'] == '1') { echo 'selected'; } ?>
            value="1">Moortgat</option>
        <option <?php if(isset($_POST['brouwerij_id']) && $_POST['brouwerij_id'] == '2') { echo 'selected'; } ?>
            value="2">Leffe</option>
        <option <?php if(isset($_POST['brouwerij_id']) && $_POST['brouwerij_id'] == '3') { echo 'selected'; } ?>
            value="3">Chouffe</option>
    </select>
    <?php if (isset($foutmeldingen['brouwerij'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['brouwerij'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="stock">Stock:</label>
    <input min=0 type="number" id="stock" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['stock'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['stock'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="prijs">Prijs:</label>
    <input min=0 type="number" id="prijs" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['prijs'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['prijs'] ?></span>
    <?php endif ?>
</div>