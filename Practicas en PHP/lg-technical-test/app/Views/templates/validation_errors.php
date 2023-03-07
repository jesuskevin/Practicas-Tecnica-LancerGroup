<div class="text-danger">
    <ul>
        <?php if (session('validationErrors')) : ?>
            <?php foreach (session('validationErrors') as $error) : ?>
                <?php echo "<li>$error</li>" ?>
            <?php endforeach ?>
        <?php endif ?>
    </ul>
</div>