
<h1 class="page-header">Информация о заказанной музыке №<?=$playlist[0]['orders_musics_id']?></h1>

<div class="row">
    <div class="col-md-12">

        <?php if($playlist): ?>
            <form class="form-horizontal" role="form" method="post" action="">

                <input type="hidden" name="orders_musics_id" value="<?=$playlist[0]['orders_musics_id']?>">

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Телефон</label>
                    <div class="col-sm-10">
                        <input type="text" name="tel" class="form-control" id="input1" placeholder="89991234567" value="<?=$playlist[0]['tel']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input2" class="col-sm-2 control-label">Название композиции</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_music" class="form-control" id="input2" placeholder="Например, Ленинград - Экспонат" value="<?=$playlist[0]['name_music']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input2" class="col-sm-2 control-label">Примечание</label>
                    <div class="col-sm-10">
                        <input type="text" name="prim" class="form-control" id="input2" placeholder="Например, с Днём Рождения Алёна! от Ивана" value="<?=$playlist[0]['prim']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input3" class="col-sm-2 control-label">Дата и время воспроизведения</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="datatime_play" class="form-control" id="input3" value="<?=$playlist[0]['datatime_play']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input4" class="col-sm-2 control-label">Статус</label>
                    <div class="col-sm-10">
                        <select name="statuses_id" class="form-control" id="input4">
                            <?php foreach($statuses as $s): ?>
                                <?php if($s['statuses_id'] == $playlist[0]['statuses_id']): ?>
                                    <option value="<?=$s['statuses_id']?>" selected><?=$s['name']?></option>
                                <?php else: ?>
                                    <option value="<?=$s['statuses_id']?>"><?=$s['name']?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input5" class="col-sm-2 control-label">Сумма</label>
                    <div class="col-sm-10">
                        <input type="text" name="sum" class="form-control" id="input5" placeholder="руб." value="<?=$playlist[0]['sum']?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="upd" class="btn btn-success">Сохранить</button>
                            <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                            <a href="?view=musics_all" class="btn btn-default" role="button">Назад</a>
                            <?php
                            if($_SESSION['message']){ // если есть сообщение в сессии
                                echo '<br/><br/>'.$_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <h3>Такого музыкального заказ нету.</h3>
        <?php endif; ?>
    </div>
</div>