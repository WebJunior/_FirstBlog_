<?php $this->layout('layout', ['title' => 'User Profile']) ?>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-12">
            <div class="admin-block">
                <h1>Святая святых. Админка.</h1><br />
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#categories">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#blogs">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#comments">Комментарии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#users">Пользователи</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="categories" class="container tab-pane active"><br>
                        <h3>Категории</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="blogs" class="container tab-pane fade"><br>
                        <h3>Статьи</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="comments" class="container tab-pane fade"><br>
                        <h3>Комментарии</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="users" class="container tab-pane fade"><br>
                        <h3>Пользователи</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>