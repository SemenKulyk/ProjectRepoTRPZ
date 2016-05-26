
<h1 class="page-header">Бронирование столика</h1>

<div class="row">

    <div class="col-md-12">
        <h3 class="sub-header">Занятость столов</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Столик</th>
                    <th>Вместимость</th>
                    <th>Состояние</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tables as $t): ?>
                <tr>
                    <input type="hidden" name="tables_id" value="<?=$t['tables_id']?>">
                    <td><?=$t['tables_id']?></td>
                    <td><?=$t['name']?></td>
                    <td><?=$t['count_seats']?> чел.</td>
                    <td>
                        <?php if($t['flag_free']){
                            echo "<span class='label label-danger'>Занято</span>";
                        } else {
                            echo "<span class='label label-primary'>Свободен</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="?view=tables_one&id=<?=$t['tables_id']?>" class="btn btn-warning btn-sm btn-block" role="button">Изменить</a>
                        <a href="?view=service_restaurant&action=clear&id=<?=$t['tables_id']?>" class="btn btn-danger btn-sm btn-block" role="button">Освободить</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <form method="post" action="">
                <tr>
                    <td><?=$t['tables_id']+1?></td>
                    <td><input type="text" name="name" placeholder="Название"></td>
                    <td><input type="text" name="count_seats" placeholder="Вместимость"></td>
                    <td colspan="3">
                        <button type="submit" name="add" class="btn btn-success btn-sm btn-block">Добавить</button>
                    </td>
                </tr>
                </form>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <h3 class="sub-header">Закрепить клиента за столом</h3>
        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Выберите клиента</label>
                <div class="col-sm-10">
                    <select name="clients_id" class="form-control" id="input1">
                        <?php foreach($clients as $c): ?>
                            <option value="<?=$c['clients_id']?>">№<?=$c['clients_id']?> - <?=$c['fio']?>, <?=$c['tel']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Выберите свободный стол</label>
                <div class="col-sm-10">
                    <select name="tables_id" class="form-control" id="input2">
                        <?php foreach($tables as $t): ?>
                            <?php if($t['flag_free'] == '0'): ?>
                                <option value="<?=$t['tables_id']?>"><?=$t['name']?> №<?=$t['tables_id']?>, <?=$t['count_seats']?> чел.</option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="bron" class="btn btn-success">Закрепить</button>
                </div>
            </div>
        </form>
    </div>

</div>