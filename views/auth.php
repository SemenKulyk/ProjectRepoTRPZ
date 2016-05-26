
            <h1>Вход для администратора</h1>

            <form class="form-horizontal" role="form" method="post" action="">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Введите логин" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Введите пароль" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit"name="enter" class="btn btn-success btn-lg">Войти</button>
                        <?php
                        if($_SESSION['message']){ // если есть сообщение в сессии
                            echo "<br/><br/>".$_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
                </div>
            </form>

            <h1>Вход для клиента</h1>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="?view=musics_guest" class="btn btn-primary btn-lg" role="button">Заказать музыку на танцпол</a>
                </div>
            </div>
