<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<?php echo $this->include('templates/alert_success'); ?>
<?php echo $this->include('templates/alert_error'); ?>

<div class="d-flex mx-5">
    <div class="">
        <p class="display-4">Nuevo libro</p>
    </div>
</div>

<?php echo $this->include('templates/validation_errors'); ?>
<div class="row mx-5">
    <form action="<?php echo url_to('books.store'); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="bookName">Titulo <span class="text-danger">*</span></label>
            <input type="text" class="form-control" value="<?php echo old('book_name') ?>" name="book_name" id="bookName" placeholder="Titulo" required>
        </div>
        <div class="form-group">
            <label for="publicationDate">Fecha de publicación <span class="text-danger">*</span></label>
            <input type="date" class="form-control" value="<?php echo old('publication_date') ?>" name="publication_date" id="publicationDate" placeholder="Fecha de publicación" required>
        </div>
        <div class="form-group">
            <label for="edition">Edición <span class="text-danger">*</span></label>
            <input type="number" class="form-control" value="<?php echo old('edition') ?>" name="edition" id="edition" placeholder="Edición" required>
        </div>
        <div class="form-group">
            <label for="authors">Autores <span class="text-danger">*</span></label>
            <select name="authors[]" id="authors" class="form-control selectpicker" data-live-search="true" data-size="5" title="Seleccione uno o más autores" multiple required>
                <?php if ($authors) : ?>
                    <?php foreach ($authors as $author) : ?>
                        <option value="<?php echo $author->id ?>"><?php echo "$author->first_name $author->last_name" ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->endSection('content'); ?>