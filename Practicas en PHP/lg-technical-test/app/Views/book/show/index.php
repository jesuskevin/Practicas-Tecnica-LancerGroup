<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <p class="display-4">Detalles del libro</p>
    </div>
</div>

<div class="mx-5">
    <div class="card">
        <div class="card-body">
            <div class="">
                <h5 class="font-weight-bold"><li>Titulo:</li></h5>
                <p><?php echo $book->book_name ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Fecha de publicación:</li></h5>
                <p><?php echo $book->publication_date ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Edición:</li></h5>
                <p><?php echo $book->edition ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Autores</li></h5>
                <ol>
                    <?php if ($book->authors) : ?>
                        <?php foreach($book->authors as $author) : ?>
                            <li><?php echo "$author->first_name $author->last_name" ?></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection('content'); ?>