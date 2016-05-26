

<div class="row">
    <div class="col-md-12">
        <?php if($playlist): ?>
            <h3 class="sub-header">Оплата музыки №<?=$playlist[0]['orders_musics_id']?></h3>

            <div class="jumbotron">
                <h1><?=$playlist[0]['name_music']?></h1>
                <p>Ваше примечание: <?=$playlist[0]['prim']?></p>
                <p>Ваш номер телефона: <?=$playlist[0]['tel']?></p>
                <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/small.xml?account=<?=ACCOUNT_YANDEX?>&quickpay=small&any-card-payment-type=on&button-text=01&button-size=m&button-color=orange&targets=<?=$desc?>&default-sum=<?=$sum?>&successURL=<?=URL_SUCCESS?>" width="186" height="42" style="margin:  0 0 0 7%"></iframe>
            </div>
        <?php else: ?>
            <h3 class="sub-header">Оплата музыки №</h3>

            <div class="jumbotron">
                <h1>Такой заказанной музыки нету.</h1>
            </div>
        <?php endif; ?>
    </div>
</div>