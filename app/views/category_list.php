<?php $this->layout('layout', ['categories' => $data['categories']]) ?>
<div class="container" style="margin-top:30px">
    <div class="row">
        <?php

        if (is_array($data['data'])) {
            if (count($data['data']['blogs']) == 0) {
                echo '<h1>Блогов в этой категории нет</h1>';

            }else {
                echo '<div class="col-lg-8">';
                echo '<h1>Последние блоги  в категории ' . $data['data']['name'] .'</h1><br/>';
                foreach ($data['data']['blogs'] as $blog) {
                    $text = substr($blog['text'],0,70) . '...';
                    echo '<div class="blog_prev">
                <h2>'. $blog['title'] .'</h2>
                <h5>'. $blog['date_created'] .'</h5>
                <p>'. $text . '</p>
                <p class="category_blog"><b>Категория:&nbsp;' . $data['data']['name'] .'</b></p>
                <a class="btn btn-success" href="/blog/' . $blog['id'] .'">Читать далее</a>
            </div>
            <hr/>
            <br>';
                }



                echo ' <hr/>
            <!--<ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> -->
        </div>';
            }
        }
        ?>




    </div>
</div>