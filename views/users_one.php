
<h1 class="page-header">Информация о сотруднике №<?=$users[0]['users_id']?></h1>

<div class="row">
    <div class="col-md-12">

        <?php if($users): ?>
            <form class="form-horizontal" role="form" method="post" action="">

                <input type="hidden" name="users_id" value="<?=$users[0]['users_id']?>">

                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">ФИО</label>
                    <div class="col-sm-10">
                        <input type="text" name="fio" class="form-control" id="inputText1" value="<?=$users[0]['fio']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSelect1" class="col-sm-2 control-label">Доступ</label>
                    <div class="col-sm-10">
                        <select name="access_id" class="form-control" id="inputSelect1">
                            <?php foreach($access as $key => $val): ?>
                                <?php if($val['access_id'] == $users[0]['access_id']): ?>
                                    <option value="<?=$val['access_id']?>" selected><?=$val['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$val['access_id']?>"><?=$val['name']?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Логин/Телефон</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="inputText1" value="<?=$users[0]['login']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="password_old" value="<?=$users[0]['password']?>">
                        <input type="password" name="password" class="form-control" id="inputPassword1" value="<?=$users[0]['password']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="upd" class="btn btn-success">Сохранить</button>
                        <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                        <a href="?view=users_all" class="btn btn-default" role="button">Назад</a>
                        <?php
                        if($_SESSION['message']){ // если есть сообщение в сессии
                            echo '<br/><br/>'.$_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <h3>Такого пользователя в системе нету.</h3>
        <?php endif; ?>
    </div>
</div>