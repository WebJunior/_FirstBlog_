<?php $this->layout('layout', ['categories' => $data['categories']]) ?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-8">
            <h1>Регистрация нового пользователя</h1>
            <div class="form-group">
                <label for="email_reg">Email:</label>
                <input type="email" class="form-control" id="email_reg" name="email_reg" required>
            </div>
            <div class="form-group">
                <label for="login_reg">Логин:</label>
                <input type="text" class="form-control" id="login_reg" name="login_reg" required>
            </div>
            <div class="form-group">
                <label for="pwd_reg">Пароль:</label>
                <input type="password" class="form-control" id="pwd_reg" name="pwd_reg" required>
            </div>
            <div class="form-group">
                <label for="pwd_reg_re">Повторите пароль:</label>
                <input type="password" class="form-control" id="pwd_reg_re" name="pwd_reg_re"
                       required>
            </div>
            <br /><span id="reg_error" class="alert alert-danger"></span><br />
            <br /><span id="reg_succ" class="alert alert-success"></span><br /><br />
            <button type="submit" class="btn btn-primary" name="reg_user" id="reg_user">Отправить</button>
        </div>
    </div>
</div>
<br />

