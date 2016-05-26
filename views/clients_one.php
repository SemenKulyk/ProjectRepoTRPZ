
<h1 class="page-header"><?=$clients[0]['fio']?></h1>

<div class="row">
    <div class="col-md-12">

        <?php if($clients): ?>
            <form class="form-horizontal" role="form" method="post" action="">

                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Номер клиента</label>
                    <div class="col-sm-10">
                        <input type="text" name="clients_id" class="form-control" id="inputText1" value="<?=$clients[0]['clients_id']?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">ФИО</label>
                    <div class="col-sm-10">
                        <input type="text" name="fio" class="form-control" id="inputText1" value="<?=$clients[0]['fio']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTel1" class="col-sm-2 control-label">Телефон</label>
                    <div class="col-sm-10">
                        <input type="tel" name="tel" class="form-control" id="inputTel1" value="<?=$clients[0]['tel']?>" required=" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input3" class="col-sm-2 control-label">Дата рождения</label>
                    <div class="col-sm-10">
                        <input type="date" name="data_rozhd" class="form-control" id="input3" value="<?=$clients[0]['data_rozhd']?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="upd" class="btn btn-success">Сохранить</button>
                        <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                        <a href="?view=clients_all" class="btn btn-default" role="button">Назад</a>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <h3>Такого клиента в системе нету.</h3>
        <?php endif; ?>

        <h3 class="sub-header">История визитов</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Дата</th>
                    <th>Администратор</th>
                    <th>Тип визита</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($visits as $v): ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$v['dateAdd']?></td>
                            <td><?=$v['users_fio']?></td>
                            <td><?=$v['name_visits_type']?></td>
                            <td>200 р.</td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>

        <h3 class="sub-header">История заказа столиков</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Дата</th>
                    <th>Администратор</th>
                    <th>Столик</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($visits_tables as $vt): ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$vt['dateReserv']?></td>
                        <td><?=$vt['users_fio']?></td>
                        <td><?=$vt['name']?> №<?=$vt['tables_id']?></td>
                        <td>200 р.</td>
                    </tr>
                <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>