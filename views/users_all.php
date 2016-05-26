
<h1 class="page-header">Пользователи АРМ</h1>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Обслуживающий персонал
                    </h4>
                </div>
                <div class="panel-body">
                    <?php foreach($users as $u): ?>
                        <?php if($u['access_id'] == 2 ): ?>
                            <a href="?view=users_one&id=<?=$u['users_id']?>">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        ФИО: <?=$u['fio']?> <br/>
                                        Логин: <?=$u['login']?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Администраторы системы
                    </h4>
                </div>
                <div class="panel-body">
                    <?php foreach($users as $u): ?>
                        <?php if($u['access_id'] == 3): ?>
                            <a href="?view=users_one&id=<?=$u['users_id']?>">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        ФИО: <?=$u['fio']?> <br/>
                                        Логин: <?=$u['login']?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        <h3>Добавление сотрудника</h3>

        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="inputText1" class="col-sm-2 control-label">ФИО</label>
                <div class="col-sm-10">
                    <input type="text" name="fio" class="form-control" id="inputText1" placeholder="Иванов Иван Иванович" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSelect1" class="col-sm-2 control-label">Доступ к системе</label>
                <div class="col-sm-10">
                    <select name="access_id" class="form-control" id="inputSelect1">
                        <?php foreach($access as $key => $val): ?>
                            <option value="<?=$val['access_id']?>"><?=$val['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel1" class="col-sm-2 control-label">Телефон/Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="inputTel1" placeholder="Придумайте логин или введите номер телефона">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Введите пароль" required="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Добавить</button>
                    <?php
                        if($_SESSION['message']){ // если есть сообщение в сессии
                            echo '<br/><br/>'.$_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>