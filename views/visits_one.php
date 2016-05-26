
<h1 class="page-header">Информация о визите №<?=$visits[0]['visits_id']?></h1>

<div class="row">
    <div class="col-md-12">

        <?php if($visits): ?>
            <form class="form-horizontal" role="form" method="post" action="">

                <input type="hidden" name="visits_id" value="<?=$visits[0]['visits_id']?>">

                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Клиент</label>
                    <div class="col-sm-10">
                        <select name="clients_id" class="form-control" id="inputSelect1">
                            <option value="0">Не выбран</option>
                            <?php foreach($clients as $c): ?>
                                <?php if($visits[0]['clients_id'] == $c['clients_id']): ?>
                                    <option value="<?=$c['clients_id']?>" selected><?=$c['fio']?>, <?=$c['tel']?></option>
                                <?php else: ?>
                                    <option value="<?=$c['clients_id']?>"><?=$c['fio']?>, <?=$c['tel']?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input5" class="col-sm-2 control-label">Тип визита</label>
                    <div class="col-sm-10">
                        <select name="visits_type_id" class="form-control" id="input5">
                            <?php foreach($visits_type as $vt): ?>
                                <?php if($visits[0]['visits_type_id'] == $vt['visits_type_id']): ?>
                                    <option value="<?=$vt['visits_type_id']?>" selected><?=$vt['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$vt['visits_type_id']?>"><?=$vt['name']?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input7" class="col-sm-2 control-label">Сумма</label>
                    <div class="col-sm-10">
                        <input type="text" name="sum" class="form-control" id="input7" value="<?=$visits[0]['sum']?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTextarea1" class="col-sm-2 control-label">Примечание</label>
                    <div class="col-sm-10">
                        <textarea name="note" class="form-control" id="inputTextarea1" rows="3"><?=$visits[0]['note']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="upd" class="btn btn-success">Сохранить</button>
                        <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                        <a href="?view=visits_all" class="btn btn-default" role="button">Назад</a>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <h3>Такого визита в системе нету.</h3>
        <?php endif; ?>
    </div>
</div>