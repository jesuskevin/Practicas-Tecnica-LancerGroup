<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex mx-5">
    <div class="">
        <p class="display-4">Nuevo autor</p>
    </div>
</div>

<div class="row mx-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="firstName">Nombres <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="firstName" placeholder="Nombres" required>
        </div>
        <div class="form-group">
            <label for="lastName">Apellidos <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="lastName" placeholder="Apellidos" required>
        </div>
        <div class="form-group">
            <label for="country">País <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="country" placeholder="País" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->endSection('content'); ?>