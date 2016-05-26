
<h1 class="page-header">Визиты</h1>

<div class="row">
    <div class="col-md-12">

        <h3 class="sub-header">Список визитов</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Дата</th>
                        <th>Клиент</th>
                        <th>Пользователь</th>
                        <th>Тип визита</th>
                        <th>Примечание</th>
                        <th>Сумма</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($visits as $v): ?>
                    <tr>
                        <td><?=$v['visits_id']?></td>
                        <td><?=$v['dateAdd']?></td>
                        <td><?=$v['clients_fio']?>, <?=$v['clients_tel']?></td>
                        <td><?=$v['users_fio']?></td>
                        <td><?=$v['name_visits_type']?></td>
                        <td><?=$v['note']?></td>
                        <td><?=$v['sum']?> руб.</td>
                        <td>
                            <a href="?view=visits_one&id=<?=$v['visits_id']?>" class="btn btn-warning btn-sm btn-block" role="button">Изменить</a>
                            <a href="?view=visits_all&action=del&id=<?=$v['visits_id']?>" class="btn btn-danger btn-sm btn-block" role="button">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>