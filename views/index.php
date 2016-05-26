
<?php include_once 'inc/header.php'; ?>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <?php include_once $view.'.php'; ?>
        </div><!--/span-->

        <?php
            if(!$guest){
                include_once 'inc/nav_right.php';
            }
        ?>

    </div><!--/row-->

    <hr>

    <footer>
        <p>© АРМ "Клуб Олимпус"</p>
    </footer>

</div><!--/.container-->


</body>
</html>