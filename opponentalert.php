<DOCTYPE html>
</html>
<script>
    if (confirm('Are you sure you want to save this thing into the database?'))
    {
        <?php
            header("Location: window.php");
        ?>   
    } else {
        <?php
            header("Location: window.php");
        ?>
}
</script>
