<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex mx-5">
    <div class="">
        <p class="display-4">Nuevo libro</p>
    </div>
</div>

<div class="row mx-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="bookName">Titulo <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="bookName" placeholder="Titulo" required>
        </div>
        <div class="form-group">
            <label for="publicationDate">Fecha de publicación <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="publicationDate" placeholder="Fecha de publicación" required>
        </div>
        <div class="form-group">
            <label for="edition">Edición <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="edition" placeholder="Edición" required>
        </div>
        <div class="form-group">
            <label for="authors">Autores <span class="text-danger">*</span></label>
            <select name="authors[]" id="authors" class="form-control selectpicker" title="Seleccione uno o más autores" multiple required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->endSection('content'); ?>