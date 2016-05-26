
<h1 class="page-header">Стол заказов музыки</h1>

<div class="row">
    <div class="col-md-12">

        <h3 class="sub-header">Заказать музыку</h3>

        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Телефон</label>
                <div class="col-sm-10">
                    <input type="text" name="tel" class="form-control" id="input1" placeholder="89991234567">
                </div>
            </div>
            <div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Название композиции</label>
                <div class="col-sm-10">
                    <input type="text" name="name_music" class="form-control" id="input2" placeholder="Например, Ленинград - Экспонат">
                </div>
            </div>
            <div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Примечание</label>
                <div class="col-sm-10">
                    <input type="text" name="prim" class="form-control" id="input2" placeholder="Например, с Днём Рождения Алёна! от Ивана">
                </div>
            </div>
            <div class="form-group">
                <label for="input3" class="col-sm-2 control-label">Дата и время воспроизведения</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="datatime_play" class="form-control" id="input3">
                </div>
            </div>
            <div class="form-group">
                <label for="input4" class="col-sm-2 control-label">Статус</label>
                <div class="col-sm-10">
                    <select name="statuses_id" class="form-control" id="input4">
                        <?php foreach($statuses as $s): ?>
                            <option value="<?=$s['statuses_id']?>"><?=$s['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="input5" class="col-sm-2 control-label">Сумма</label>
                <div class="col-sm-10">
                    <input type="text" name="sum" class="form-control" id="input5" placeholder="руб.">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Заказать</button>
                </div>
            </div>
        </form>

        <h3 class="sub-header">Плейлист</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Дата и время заказа</th>
                        <th>Статус</th>
                        <th>Телефон</th>
                        <th>Название</th>
                        <th>Примечание</th>
                        <th>Дата и время воспроизведения</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($playlist as $p): ?>
                        <tr>
                            <td><?=$p['orders_musics_id']?></td>
                            <td><?=$p['orders_musics_date']?></td>
                            <td>
                                <?php
                                    // устанавливаем цвет метки в зависимости от статуса заказанной музыки
                                    if ($p['statuses_id'] == 3 ) { // если в очереди, то зеленый
                                        $marker = "label-default";
                                    } elseif ($p['statuses_id'] == 2 ) {  // если оплачивается, то желтый
                                        $marker = "label-success";
                                    } elseif ($p['statuses_id'] == 1 ) {  // если новая, то синий
                                        $marker = "label-warning";
                                    }
                                ?>
                                <span class="label <?=$marker?>">
                                    <?=$p['statuses_name']?>
                                </span>
                            </td>
                            <td><?=$p['tel']?></td>
                            <td><?=$p['name_music']?></td>
                            <td><?=$p['prim']?></td>
                            <td><?=$p['datatime_play']?></td>
                            <td>
                                <a href="?view=musics_one&id=<?=$p['orders_musics_id']?>" class="btn btn-warning btn-sm btn-block" role="button">Изменить</a>
                                <a href="?view=musics_all&action=del&id=<?=$p['orders_musics_id']?>" class="btn btn-danger btn-sm btn-block" role="button">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>