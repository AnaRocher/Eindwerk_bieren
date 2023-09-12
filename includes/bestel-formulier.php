<div class="font-semibold">Gegevens</div>

<div>
    <label for="naam">Naam:</label>
    <p class="text-neutral-500 italic text-sm">Geef jouw naam in</p>
    <input value="<?php echo $_POST['naam'] ?? '' ?>" type="text" id="naam" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['naam'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['naam'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="email">E-mailadres:</label>
    <p class="text-neutral-500 italic text-sm">Geef jouw e-mailadres in</p>
    <input value="<?php echo $_POST['email'] ?? '' ?>" type="text" id="email" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['email'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['email'] ?></span>
    <?php endif ?>
</div>


<div class="font-semibold">Adres</div>

<div>
    <label for="straat">Straat + Huisnummer:</label>
    <p class="text-neutral-500 italic text-sm">Geef je straat en huisnummer/bus in</p>
    <input value="<?php echo $_POST['adres'] ?? '' ?>" type="text" id="straat" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['adres'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['adres'] ?></span>
    <?php endif ?>
</div>

<div>
    <label for="straat">Gemeente:</label>
    <p class="text-neutral-500 italic text-sm">Kies je gemeente</p>
    <select id="gemeente_id" class="w-full bg-neutral-100 p-2 block">
        <option <?php if(!isset($_POST['gemeente_id'])) { echo 'selected'; } ?> disabled selected>-- Kies een gemeente
        </option>
        <option <?php if(isset($_POST['gemeente_id']) && $_POST['gemeente_id'] == '1') { echo 'selected'; } ?>
            value="1">3500 - Hasselt</option>
        <option <?php if(isset($_POST['gemeente_id']) && $_POST['gemeente_id'] == '2') { echo 'selected'; } ?>
            value="2">3580 - Beringen</option>
        <option <?php if(isset($_POST['gemeente_id']) && $_POST['gemeente_id'] == '3') { echo 'selected'; } ?>
            value="3">3550 - Heusden-Zolder</option>
    </select>
    <?php if (isset($foutmeldingen['gemeente'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['gemeente'] ?></span>
    <?php endif ?>
</div>

<div class="font-semibold">Bijkomend</div>

<div>
    <label for="aantal">Aantal:</label>
    <p class="text-neutral-500 italic text-sm">Hoeveel flesjes wil je bestellen?</p>
    <input min=1 type="number" id="aantal" class="w-full bg-neutral-100 p-2 block">
    <?php if (isset($foutmeldingen['aantal'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['aantal'] ?></span>
    <?php endif ?>
</div>

<div>
    <input <?php if(isset($_POST['accept'])) {echo 'checked';} ?> type="checkbox" id="voorwaarden" class="">
    <label for="aantal">Ik plaats mijn bestelling en ik ga akkoord met de voorwaarden.</label>
    <?php if (isset($foutmeldingen['accept'])): ?>
    <span class="text-red-500"><?php echo $foutmeldingen['accept'] ?></span>
    <?php endif ?>
</div>