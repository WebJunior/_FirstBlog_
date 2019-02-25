<?php $this->layout('layout', ['categories' => $data['categories']]) ?>


<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-12">
            <div class="u-info">
                 <?php
                    if ($data['authorName'] != null) {
                        echo '<h1>Информация о пользователе ' . $data['authorName'] . '</h1>';

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

                    }else {
                        echo 'Тут пусто -_-';
                    }
                    ?>

            </div>
        </div>

    </div>
</div>