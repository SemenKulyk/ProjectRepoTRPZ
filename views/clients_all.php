
<h1 class="page-header">Клиенты</h1>

<div class="row">
    <div class="col-md-12">

        <h3 class="sub-header">Регистрация нового клиента</h3>

        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">ФИО</label>
                <div class="col-sm-10">
                    <input type="text" name="fio" class="form-control" id="input1" placeholder="Фамилия Имя Отчество">
                </div>
            </div>
            <div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Номер телефона</label>
                <div class="col-sm-10">
                    <input type="tel" name="tel" class="form-control" id="input2" placeholder="89991234567">
                </div>
            </div>
            <div class="form-group">
                <label for="input3" class="col-sm-2 control-label">Дата рождения</label>
                <div class="col-sm-10">
                    <input type="date" name="data_rozhd" class="form-control" id="input3">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Зарегистрировать</button>
                </div>
            </div>
        </form>

        <h3 class="sub-header">Поиск клиента</h3>

        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="post" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ФИО" name="name">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="search_name">Поиск</button>
                    </span>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="post" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Номер телефона" name="tel">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="search_tel">Поиск</button>
                    </span>
                </div>
            </form>
        </div>

        <br/>

        <div class="col-md-12">
            <?php
            if($_SESSION['message']){ // если есть сообщение в сессии
                echo '<br/><br/>'.$_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </div>

        <br/>

        <h3 class="sub-header">Список клиентов</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ФИО</th>
                        <th>Телефон</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $key => $val): ?>
                        <tr>
                            <td><?=$val['clients_id']?></td>
                            <td><?=$val['fio']?></td>
                            <td><?=$val['tel']?></td>
                            <td>
                                <a href="?view=clients_one&id=<?=$val['clients_id']?>" class="btn btn-warning btn-sm btn-block" role="button">Изменить</a>
                                <a href="?view=clients_all&action=del&id=<?=$val['clients_id']?>" class="btn btn-danger btn-sm btn-block" role="button">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>