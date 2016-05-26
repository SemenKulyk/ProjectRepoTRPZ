
<h1 class="page-header">Отчет о посещениях</h1>

<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Период с</label>
                <div class="col-sm-10">
                    <input type="date" name="date1" class="form-control" id="input1" value="<?=$date1?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Период по</label>
                <div class="col-sm-10">
                    <input type="date" name="date2" class="form-control" id="input2" value="<?=$date2?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Показать</button>
                </div>
            </div>
        </form>

        <h3 class="page-header">Танцпол</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Количество человек</th>
                    <th>Выручка, руб.</th>
                </tr>
                </thead>
                <tbody>
                <?php $report_data = select_visits_report(1, $date1, $date2);?>
                <?php foreach($report_data as $report): ?>
                    <?php $day1++?>
                    <tr>
                        <td><?=$report['date_add']?></td>
                        <td><?=$report['count_visits']?></td>
                        <td><?=$report['sum_visits']?></td>
                    </tr>
                    <?php
                    $count_visits_1+=$report['count_visits'];
                    $sum_visits_1+=$report['sum_visits'];
                    $categories .= "'".$report['date_add'] . "',";
                    $data1 .= $report['count_visits'] . ",";
                    ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h3 class="page-header">Ресторан</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Количество человек</th>
                    <th>Выручка, руб.</th>
                </tr>
                </thead>
                <tbody>
                <?php $report_data = select_visits_report(2, $date1, $date2);?>
                <?php foreach($report_data as $report): ?>
                    <?php $day2++?>
                    <tr>
                        <td><?=$report['date_add']?></td>
                        <td><?=$report['count_visits']?></td>
                        <td><?=$report['sum_visits']?></td>
                    </tr>
                    <?php
                    $count_visits_2+=$report['count_visits'];
                    $sum_visits_2+=$report['sum_visits'];
                    $data2 .= $report['count_visits'] . ",";
                    ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h3 class="page-header">Итого за период</h3>

        <?php
        if($day1>$day2) {
            $count_day = $day1;
        } else {
            $count_day = $day2;
        }
        $total_count_visits = $count_visits_1 + $count_visits_2;
        $total_sum_visits = $sum_visits_1 + $sum_visits_2;
        ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Количество человек</th>
                    <th>Выручка, руб.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Танцпол</td>
                    <td><?=$count_visits_1?></td>
                    <td><?=$sum_visits_1?></td>
                </tr>
                <tr>
                    <td>Ресторан</td>
                    <td><?=$count_visits_2?></td>
                    <td><?=$sum_visits_2?></td>
                </tr>
                <tr>
                    <th>Средняя за день</th>
                    <td><?=$total_count_visits/$count_day?></td>
                    <td><?=$total_sum_visits/$count_day?></td>
                </tr>
                <tr>
                    <th>Всего</th>
                    <td><?=$total_count_visits?></td>
                    <td><?=$total_sum_visits?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php
        $categories = substr($categories, 0, -1);
        $data1 = substr($data1, 0, -1);
        $data2 = substr($data2, 0, -1);
        ?>

        <div id="container_graphics" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <script type="text/javascript">
            $(function () {
                $('#container_graphics').highcharts({
                    title: {
                        text: 'Отчет посещаемости за <?=$date1?> - <?=$date2?>',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'АРМ Клуб Олимпус',
                        x: -20
                    },
                    xAxis: {
                        categories: [<?=$categories?>]
                    },
                    yAxis: {
                        title: {
                            text: 'Посещаемость, чел.'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: ' чел.'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                        name: 'Танцпол',
                        data: [<?=$data1?>]
                    }, {
                        name: 'Ресторан',
                        data: [<?=$data2?>]
                    }]
                });
            });
        </script>
    </div>
</div>