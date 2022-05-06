<?php $this->extend('layouts/home_layout')?>

<?php $this->section('content') ?>
    <div id="app">
        <?php foreach($notes as $note) : ?>
            <!-- <textarea class="note"><?= $note['content'] ?></textarea> -->
        <?php endforeach ?>
        <button class="add-note" type="button">+</button>
    </div>
<?php $this->endSection()?>