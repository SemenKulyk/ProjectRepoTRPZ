
<h1 class="page-header">Информация о столе №<?=$tables[0]['tables_id']?></h1>

<div class="row">
    <div class="col-md-12">

        <?php if($tables): ?>
            <form class="form-horizontal" role="form" method="post" action="">

                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">№ стола</label>
                    <div class="col-sm-10">
                        <input type="text" name="tables_id" class="form-control" id="inputText1" value="<?=$tables[0]['tables_id']?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputText1" value="<?=$tables[0]['name']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Вместимость</label>
                    <div class="col-sm-10">
                        <input type="text" name="count_seats" class="form-control" id="inputText1" value="<?=$tables[0]['count_seats']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="upd" class="btn btn-success">Сохранить</button>
                        <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                        <a href="?view=service_restaurant" class="btn btn-default" role="button">Назад</a>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <h3>Такого стола в системе нету.</h3>
        <?php endif; ?>
    </div>
</div>