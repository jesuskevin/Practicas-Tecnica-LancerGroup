<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <p class="display-4">Autores</p>
    </div>
    <div class="">
        <a href="<?php echo base_url() ?>autores/crear" class="btn bg-info mt-3">Nuevo autor</a>
    </div>
</div>

<div class="row">
    <table id="authorsTable" class="table mx-5">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>
</div>

<?php $this->endSection('content'); ?>