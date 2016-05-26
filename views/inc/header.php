<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />-->

<title>АРМ "Олимпус Клуб"</title>

<link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="views/css/style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="views/bootstrap/js/bootstrap.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<?=$javascript?>

</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if($_SESSION['auth']): ?>
                <a class="navbar-brand" href="?view=visits_add">АРМ "Клуб Олимпус"</a>
            <?php else: ?>
                <a class="navbar-brand" href="?view=auth">АРМ "Клуб Олимпус"</a>
            <?php endif; ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if($_SESSION['auth']): ?>
                    <li><a href="?view=users_all">Пользователи</a></li>
                    <li><a href="?view=auth&action=exit">Выйти</a></li>
                <?php else: ?>
                    <li><a href="?view=auth">Войти</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->

