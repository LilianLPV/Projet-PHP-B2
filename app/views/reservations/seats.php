<?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <link rel="stylesheet" href="../public/css/seats.css">

<?php if (isset($_GET['error']) && $_GET['error'] == 'deja_pris'): ?>
    <script>
        alert("Oups ! 😅 Une ou plusieurs places sélectionnées viennent d'être réservées par quelqu'un d'autre. Veuillez en choisir d'autres.");
    </script>
<?php endif; ?>


    <div class="cinema-room">
        <h2 style="color: #e5a71a; margin-top: 0; margin-bottom: 30px;">Choisissez vos places</h2>

        <div class="screen"></div>

        <form action="index.php?action=valider_reservation" method="POST">
            <input type="hidden" name="id_seance" value="<?= htmlspecialchars($_GET['id_seance'] ?? '') ?>">

            <div class="seats-container">
                <?php
                $reservedSeats = $reservedSeats ?? [];

                for ($row = 0; $row < 5; $row++):
                    $lettre = chr(65 + $row);
                    ?>
                    <div class="seat-row">
                        <span class="row-letter"><?= $lettre ?></span>

                        <?php
                        for ($seat = 1; $seat <= 8; $seat++):
                            $numero_place = $lettre . $seat;

                            $isReserved = in_array($numero_place, $reservedSeats);

                            $disabledAttr = $isReserved ? 'disabled' : '';
                            $takenClass = $isReserved ? 'seat-taken' : '';
                            ?>
                            <input type="checkbox"
                                   id="place-<?= $numero_place ?>"
                                   name="places[]"
                                   value="<?= $numero_place ?>"
                                   class="seat-checkbox"
                                    <?= $disabledAttr ?>>

                            <label for="place-<?= $numero_place ?>" class="seat-label <?= $takenClass ?>">
                                <?= $isReserved ? 'X' : $seat ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
            </div>

            <button type="submit" class="btn-reserver">Réserver mes billets</button>
        </form>
    </div>

