
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    // var_dump($_SESSION['message']);
    if(isset($_SESSION['message'])){

        ?>
        alertify.success("<?php echo $_SESSION['message']?>");
        // alertify.success('Cart Updated Successfully');
        <?php
        unset($_SESSION['message']);
    }
    ?>
</script>
