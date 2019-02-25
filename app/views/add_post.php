<?php $this->layout('layout', ['categories' => $data['categories']]) ?>
<?php

if (array_key_exists('access',$data)) {
    if ($data['access'] != true) {
        echo 'Для того чтобы опубликовать блог, пожалуйста, авторизуйтесь. <a href="/">На главную</a>';
        exit;
    }

}
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (array_key_exists('info',$data)) {
                echo '<div class="alert alert-'. $data['cssClass'] .'"><strong>' . $data['info'] .'</strong> </div>';
            }

            ?>
            <div class="create_blog_container">
                <h1>Опубликуйте свой блог</h1>
                <form action="/create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Выберете картинку:</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                        <input type="file" class="form-control" name="img" id="img">
                        <span>Максимальный размер файла 100 КБ</span><br/>
                    </div>
                    <div class="form-group">
                        <label for="title_blog"></label>
                        <input type="text" class="form-control" id="title_blog" name="title_blog" maxlength="150" placeholder="Заголовок" required>
                    </div>
                    <div class="form-group">
                        <label for="create_text_blog"></label>
                        <textarea class="form-control" id="create_text_blog"  rows="10"
                                  name="create_text_blog" placeholder="Напишите тут текст"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_choose">Выберете категорию:</label>
                        <select class="form-control" id="category_choose" name="category_choose">
                            <?php
                                if (array_key_exists('categories',$data)) {
                                    foreach ($data['categories'] as $category) {
                                        echo '<option value="' . $category['alias'] .'">' .$category['category_name'] . '</option>';
                                    }
                                }
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="send_blog">Опубликовать</button>
                </form>
                <br/>
                <hr/>
                <a class="btn btn-success" href="#">Назад</a><br /><br />
            </div>
        </div>

    </div>
</div>