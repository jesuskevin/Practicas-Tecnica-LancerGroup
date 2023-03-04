<?php if (session('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
        <p class="lead"><?php echo session('success'); ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>