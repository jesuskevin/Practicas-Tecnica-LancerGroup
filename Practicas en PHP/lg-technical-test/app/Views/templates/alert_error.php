<?php if (session('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show mx-5" role="alert">
        <p class="lead"><?php echo session('error'); ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>