<?php
$this->layout('layout', ['categories' => $data['categories']]);

?>

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

            <hr/>
            <b>Привет,
                <?php
                    if (array_key_exists('userName',$data)) {
                        echo $data['userName'];
                    }
                ?>


                </b><br />
            <span class="date-info">Дата: <?=date('Y-m-d H:i:s',time())?></span><br />
            <a href="add_post" class="text-info">Добавить блог</a> | <a href="/user/<?=$data['author_id']?>" class="text-primary">Мои блоги</a><br /><br />
            <a href="exit" class="btn btn-dark">Выйти</a>
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

