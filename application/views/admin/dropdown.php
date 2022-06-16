<?php
    foreach ($city as $row) {
    ?>
        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
    <?php
    }
    ?> 