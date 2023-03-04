<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<?php echo $this->include('templates/alert_success'); ?>
<?php echo $this->include('templates/alert_error'); ?>

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <p class="display-4">Autores</p>
    </div>
    <div class="">
        <a href="<?php echo url_to('authors.create') ?>" class="btn bg-primary mt-3">Nuevo autor</a>
    </div>
</div>

<div class="mx-5">
    <table id="authorsTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($authors) : ?>
                <?php foreach ($authors as $author) : ?>
                    <tr>
                        <td><?php echo $author->first_name; ?></td>
                        <td><?php echo $author->last_name; ?></td>
                        <td><?php echo $author->country; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php $this->endSection('content'); ?>