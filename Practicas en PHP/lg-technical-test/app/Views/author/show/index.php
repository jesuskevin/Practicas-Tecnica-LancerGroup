<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<?php echo $this->include('templates/alert_success'); ?>
<?php echo $this->include('templates/alert_error'); ?>

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <p class="display-4">Detalles del autor</p>
    </div>
</div>

<div class="mx-5">
    <div class="card">
        <div class="card-body">
            <div class="">
                <h5 class="font-weight-bold"><li>Nombre:</li></h5>
                <p><?php echo $author->first_name ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Apellido:</li></h5>
                <p><?php echo $author->last_name ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>País:</li></h5>
                <p><?php echo $author->country ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Fecha de registro:</li></h5>
                <p><?php echo $author->registration_date ?></p>
            </div>
            <div class="">
                <h5 class="font-weight-bold"><li>Cantidad de libros registrados:</li></h5>
                <p><?php echo 50 ?></p>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection('content'); ?>