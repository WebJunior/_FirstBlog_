<?php $this->layout('layout', ['categories' => $data['categories']]) ?>
<div class="container" style="margin-top:30px">
    <div class="row">

        <div class="col-lg-8">
            <h1>Последние блоги</h1><br/>
            <?php

            foreach ($data['posts'] as $post) {
                $text = substr($post['text'],0,70) . '...';
                echo' <div class="blog_prev">
                <h2>' . $post['title'] .'</h2>
                <h6>'. $post['date_created']. '</h6>
                <p>' . $text .'</p>
                <a class="btn btn-success" href="/blog/' .$post['id'] .'">Читать далее</a>
            </div>
            <hr/>';
            }
            
            ?>

            <?php
            echo $paginator;
            ?>
           <!-- <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> -->
        </div>
        <div class="col-lg-4">
            <h6 class="rounded shadow bg-white">Ещё не зарегистрированы? <a href="registration" >Время пришло!</a>
            </h6>
            <hr/>
            <h4>Авторизация:</h4>
                <div class="form-group">
                    <label for="login_in">Логин:</label>
                    <input type="text" class="form-control" id="login_in" name="login_in" required>
                </div>
                <div class="form-group">
                    <label for="pwd_in">Пароль:</label>
                    <input type="password" class="form-control" id="pwd_in" name="pwd_in" required>
                </div>

                <button type="submit" class="btn btn-primary" name="enter_user">Войти</button><br />
                <br /><span id="reg_error" class="alert alert-danger"></span><br />
            <hr/>
            <h4>Популярные блоги</h4>
            <?php
                foreach ($data['topBlogs'] as $post) {
                    echo '<p class="top_news"><a href="/blog/' .$post['id'] .'">' . $post['title'] .'</a>&nbsp;<i class="fas fa-eye">&nbsp;' . $post['count_view'] .'</i></p>';
                }
            ?>


            <hr/>
            <h4>Последние комментарии</h4>
            <?php
            foreach ($data['lastComments'] as $comment) {
                $text = substr($comment['text'],0,20) . '...';
                echo '<p class="last_comments"><a href="/blog/' . $comment['id_blog'] .'#comm' .$comment['id'] .'">' . $text .'</a></p>';
            }
            ?>


            <hr/>
            <hr class="d-sm-none">
        </div>
    </div>
</div>

