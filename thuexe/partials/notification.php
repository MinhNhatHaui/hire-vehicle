<?php if(isset($_SESSION['success'])) :?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success'];
        unset($_SESSION['success']); // huy session
        ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['error'])) :?>
    <div class="alert alert-danger text-center">
        <?php echo $_SESSION['error'];
        unset($_SESSION['error']); // huy session
        ?>
    </div>
<?php endif; ?>