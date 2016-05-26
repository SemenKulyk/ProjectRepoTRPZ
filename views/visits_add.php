
<h1 class="page-header">Регистрация визита</h1>

<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" role="form" method="post" action="">

            <h3><input type="radio" name="whatClient" value="new" id="inputRadio1" checked> <label for="inputRadio1">Регистрация нового клиента</label></h3>

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
                <label for="input4" class="col-sm-2 control-label">Дата рождения</label>
                <div class="col-sm-10">
                    <input type="date" name="data_rozhd" class="form-control" id="input4">
                </div>
            </div>

            <h3><input type="radio" name="whatClient" value="old" id="inputRadio2"> <label for="inputRadio2">Выбор зарегестрированного клиента</label></h3>

            <div class="form-group">
                <label for="inputText1" class="col-sm-2 control-label">Клиент</label>
                <div class="col-sm-10">
                    <select name="clients_id" class="form-control" id="inputSelect1">
                        <option value="0">Не выбран</option>
                        <?php foreach($clients as $c): ?>
                            <option value="<?=$c['clients_id']?>"><?=$c['fio']?>, <?=$c['tel']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3 class="sub-header">Информация о визите</h3>

            <div class="form-group">
                <label for="input5" class="col-sm-2 control-label">Тип визита</label>
                <div class="col-sm-10">
                    <select name="visits_type_id" class="form-control" id="input5">
                        <?php foreach($visits_type as $vt): ?>
                            <option value="<?=$vt['visits_type_id']?>"><?=$vt['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="input7" class="col-sm-2 control-label">Сумма</label>
                <div class="col-sm-10">
                    <input type="text" name="sum" class="form-control" id="input7" value="<?=DEFAULT_PRICE_VISIT?>" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTextarea1" class="col-sm-2 control-label">Примечание</label>
                <div class="col-sm-10">
                    <textarea name="note" class="form-control" id="inputTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Зарегистрировать</button>
                </div>
            </div>
        </form>

    </div>
</div>