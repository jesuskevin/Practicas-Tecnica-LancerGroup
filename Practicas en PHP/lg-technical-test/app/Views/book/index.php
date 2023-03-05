<?php $this->extend('templates/template'); ?>

<?php $this->section('content'); ?>

<?php echo $this->include('templates/alert_success'); ?>
<?php echo $this->include('templates/alert_error'); ?>

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <p class="display-4">Libros</p>
    </div>
    <div class="">
        <a href="<?php echo base_url() ?>libros/crear" class="btn bg-primary mt-3">Nuevo libro</a>
    </div>
</div>

<div class="mx-5">
    <table id="booksTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Fecha de publicación</th>
                <th>Edición</th>
                <th>Accciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($books) : ?>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?php echo $book->book_name; ?></td>
                        <td><?php echo $book->publication_date; ?></td>
                        <td><?php echo $book->edition; ?></td>
                        <td>
                            <a href="<?php echo url_to('books.show', $book->id) ?>" class="btn-sm btn-primary">Ver detalles</a>
                            <a href="<?php /*echo url_to('books.edit', $book->id)*/ ?>" class="btn-sm btn-warning">Editar</a>
                            <a href="#" data-toggle="modal" data-target="#deleteAuthorModal<?php /*echo $book->id*/ ?>" class="btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>

                    <!-- Delete books modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="deleteAuthorModal<?php echo $book->id ?>" tabindex="-1" aria-labelledby="deleteAuthorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?php /*echo url_to('books.delete', $book->id)*/ ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAuthorModalLabel">Eliminar autor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estas seguro que deseas eleminar este autor?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php $this->endSection('content'); ?>