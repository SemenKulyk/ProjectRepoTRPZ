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
                <label for="input5" class="col-sm-2 control-label">Сумма</label>
                <div class="col-sm-10">
                    <input type="hidden" name="statuses_id" value="1">
                    <input type="text" name="sum" class="form-control" id="input5" placeholder="руб." value="100" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add" class="btn btn-success">Заказать</button>
                </div>
            </div>
        </form>
    </div>
</div>