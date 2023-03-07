<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<?php echo $this->include('templates/alert_success'); ?>
<?php echo $this->include('templates/alert_error'); ?>

<div class="d-flex mx-5">
    <div class="">
        <p class="display-4">Editar autor</p>
    </div>
</div>

<?php echo $this->include('templates/validation_errors'); ?>
<div class="row mx-5">
    <form action="<?php echo url_to('authors.update', $author->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="firstName">Nombres <span class="text-danger">*</span></label>
            <input type="text" name="first_name" value="<?php echo old('first_name') ?? $author->first_name; ?>" required class="form-control" id="firstName" placeholder="Nombres">
        </div>
        <div class="form-group">
            <label for="lastName">Apellidos <span class="text-danger">*</span></label>
            <input type="text" name="last_name" value="<?php echo old('last_name') ?? $author->last_name; ?>" required class="form-control" id="lastName" placeholder="Apellidos">
        </div>
        <div class="form-group">
            <label for="country">País <span class="text-danger">*</span></label>
            <input type="text" name="country" value="<?php echo old('country') ?? $author->country; ?>" required class="form-control" id="country" placeholder="País">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php $this->endSection('content'); ?>