<?php $this->layout('layout', ['categories' => $data['blogData']['categories']]) ?>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-12">
            <div class="blog_full_container">

                <?php
                if (array_key_exists('blogData', $data)) {
                    echo '<h1>' . $data['blogData']['title'] . '</h1>';
                    echo '<p class="author_blog">Автор:&nbsp;<a href="/user/' . $data['blogData']['author_id'] . ' ">' . $data['blogData']['author'] . '</a></p>';
                    echo '<i class="fas fa-eye"></i> ' . $data['blogData']['count_view'];
                    echo '<p class="date_blog">Дата создания:&nbsp; ' . $data['blogData']['date_created'] . '</p>';
                    echo '<div class="blogimg"><img src="/imgs' . $data['blogData']['path_img'] . '" /></div>';
                    echo '<p>' . $data['blogData']['text'] . '</p><br />';
                    echo '<p><b>Категория: ' . $data['blogData']['category'] . '</b></p><br />';
                    echo '<a class="btn btn-success" href="/">На главную</a>';
                }
                ?>

            </div>
            <hr/>

            <?php
            if (array_key_exists('access', $data)) {
                if ($data['access'] == true) {
                    echo '<h3>Написать комментарий:</h3><br />
                    <form  action="/add_comment" method="post">
                        <input type="hidden" value="' . $data['blogData']['blog_id'] . '" name="blogId" />
                        <label for="send_text_comment"></label>
                        <textarea class="form-control" id="send_text_comment" name="send_text_comment"></textarea><br />
                        <button type="submit" class="btn btn-primary" name="send_comment">Опубликовать</button>
                    </form><br /><hr />';
                    if ($data['blogData']['commentError'] !== null) {
                        echo '<div class="alert alert-danger"><b>' . $data['blogData']['commentError'] . '</b></div>';
                    }
                } else {
                    echo '<div class="jumbotron">
                    <p>Чтобы оставлять комментарии Вы должны быть авторизованы</p> 
                    </div>';
                }
            }

            ?>


            <h3>Комментарии пользователей:</h3>

            <?php
            if (array_key_exists('blogData', $data)) {
                if ($data['blogData']['comments'] === false) {
                    echo '<div class="jumbotron"><p>Тут пока никто не оставил комментарий. Вы можете сделать это первым.</p></div>';
                } else {
                    foreach ($data['blogData']['comments'] as $comment) {
                        echo ' <div class="comment_container border rounded" id="comm' . $comment['id'] . '">
                        <a name="comm' . $comment['id'] . '"></a>
                <p class="author_comment"><a href="/user/' .$comment['author_id'] .'">' . $comment['author'] . '</a> в ' . $comment['date_created'] . '</p>
                <p class="text_comment">' . $comment['text'] . '</p>
            </div><br/>';
                    }
                }
            }
            ?>

        </div>

    </div>
</div>