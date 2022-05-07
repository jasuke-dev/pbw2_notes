<?php $this->extend('layouts/home_layout')?>

<?php $this->section('content') ?>
    <div class="header">
        <h1>Notes for Ilham</h1>
        <a href="<?= route_to('logout') ?>">
            <button class="logout" type="button"><i class="fa-solid fa-right-from-bracket"></i></button>
        </a>
    </div>
    <div id="app">
        <?php foreach($notes as $note) : ?>
            <!-- <textarea class="note"><?= $note['content'] ?></textarea> -->
        <?php endforeach ?>
        <button class="add-note" type="button">+</button>
    </div>
<?php $this->endSection()?>