<?php

namespace App\MainController;

use App\lib\QueryBuilder\QueryBuilder;
use App\MainModel\MainModel;
use App\MainView\MainView;
use Delight\Auth\Auth;
use League\Plates\Engine;
use JasonGrimes\Paginator;

class MainController
{

    private $qb;
    private $template;
    private $auth;
    public function __construct(QueryBuilder $qb,Engine $engine,Auth $auth)
    {
        $this->qb = $qb;
        $this->template = $engine;
        $this->auth = $auth ;
    }

    public function controllerGetMorePosts($num) {
        $model = new MainModel($this->qb,$this->auth);
        $blogs = $model->getMorePosts('blogs',$num);
        self::index($blogs);
    }
    public function index($dataFromPaginator = null)
    {
        $view = new MainView($this->template);
        $model = new MainModel($this->qb,$this->auth);
        $popularBlogs = $model->getTopBlogsByViews();
        $lastComments = $model->getLastComments();
        $categoryList = $model->getAllCategories();
        if ($this->auth->isLoggedIn()) {
            if ($dataFromPaginator == null) {
                $posts = $model->getAllBlogs();
            }else {
                $posts = $dataFromPaginator;
            }

            $data = [
                'posts' => $posts,
                'userName' => $this->auth->getUsername(),
                'topBlogs' => $popularBlogs,
                'lastComments' => $lastComments,
                'categories' => $categoryList,
                'author_id' => $this->auth->getUserId()
            ];

            $totalItems = count($data['posts']);
            $itemsPerPage = 5;
            $currentPage = (int)$_GET['page'] ?? 1;
            $urlPattern = '/page/(:num)';
            $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
            $view->showHomePageWithAuthorization($data,$paginator);
        }else {
            if ($dataFromPaginator == null) {
                $posts = $model->getAllBlogs();
            }else {
                $posts = $dataFromPaginator;
            }
            $data = [
                'posts' => $posts,
                'topBlogs' => $popularBlogs,
                'lastComments' => $lastComments,
                'categories' => $categoryList
            ];
            $totalItems = count($data['posts']);
            $itemsPerPage = 5;
            $currentPage = (int)$_GET['page'] ?? 1;
            $urlPattern = '/page/(:num)';
            $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
            $view->showHomePageWithoutAuthorization($data,$paginator);
        }


    }

    public function controllerShowPageAddPost() {
        $view = new MainView($this->template);
        $model = new MainModel($this->qb,$this->auth);
        $categories = $model->getAllCategories();
        $data = [
            'categories' => $categories,
            'access' => $this->auth->isLoggedIn()
        ];

        $view->showPageAddPost($data);

    }

    public function controllerAddPost() {

        if (isset($_POST['title_blog']) && isset($_POST['create_text_blog'])) {
            $title = trim(htmlspecialchars(strip_tags($_POST['title_blog'])));
            $text = trim(htmlspecialchars(strip_tags($_POST['create_text_blog'])));
            $category = trim(htmlspecialchars(strip_tags($_POST['category_choose'])));
            $model = new MainModel($this->qb,$this->auth);
            $res = $model->addPost($title,$text,$category,$this->auth->getUserId(),$_FILES['img']);
            if ($res !== true) {
                $categories = $model->getAllCategories();
                $data = [
                    'info' => $res,
                    'categories' => $categories,
                    'cssClass' => 'danger'
                ];
                $view = new MainView($this->template);
                $view->showPageAddPost($data);
            }else {
                $categories = $model->getAllCategories();
                $data = [
                    'info' => 'Блог опубликован!',
                    'categories' => $categories,
                    'cssClass' => 'success'
                ];
                $view = new MainView($this->template);
                $view->showPageAddPost($data);
            }
        }



    }

    public function userLogOut() {
        if ($this->auth->isLoggedIn()) {
            $this->auth->logOut();
        }
        header('Location: /');

    }

    public function controllerRegistration()
    {
        $view = new MainView($this->template);
        $model = new MainModel($this->qb,$this->auth);
        $categories = $model->getAllCategories();
        $data = [
            'categories' => $categories
        ];
        $view->showRegistrationPage($data);
    }

    public function controllerLogin()
    {
        if (isset($_POST['login_in']) && isset($_POST['pass_in'])) {

            $login = trim(htmlspecialchars(strip_tags($_POST['login_in'])));
            $pass = trim(htmlspecialchars(strip_tags($_POST['pass_in'])));
            $model = new MainModel($this->qb,$this->auth);
            $res = $model->modelLoginUser($login,$pass);
            echo $res;
        }

    }

    public function controllerAjaxRegistrationUser() {

        if(isset($_POST['reg_new_user'])) {
            $email = trim(strip_tags($_POST['email']));
            $login = trim(strip_tags($_POST['login']));
            $pass = trim(strip_tags($_POST['pass']));

            $preg = preg_match('/^.+@.+\..{2,}+/Us',$email);
            if ($preg == 0) {
                echo 'email__error';
                return false;
            }

            $model = new MainModel($this->qb,$this->auth);
            $reg_status = $model->modelRegistrationUser($email,$login,$pass);
            if ($reg_status['isReg'] === true) {
                    echo 'reg__ok';
            }else if($reg_status['isReg'] === false) {
                echo $reg_status['ajaxError'];
            }
        }
    }

    public function controllerEmailVerif($selector,$token) {
        try {
            $this->auth->confirmEmail($selector, $token);

            echo 'Email адрес был подтвержден! <a href="/">Вернуться на главную</a>';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function controllerGetUserInfo($id)
    {
        $view = new MainView($this->template);
        $model = new MainModel($this->qb, $this->auth);
        $categoryList = $model->getAllCategories();
        $blogs = $model->getBlogsByAuthorId($id);
        $authorName = $model->getAuthorNameById($id);
            $data = [
                'posts' => $blogs,
                'categories' => $categoryList,
                'authorName' => $authorName
            ];
            $view->showPageUsersBlogs($data);
    }

    public function controllerGetFullBlog($id,$commentError = null) {
        $model = new MainModel($this->qb,$this->auth);
        $view = new MainView($this->template);
        $blog = $model->getBlog($id);
        if (is_array($blog)) {
            if (count($blog) != 0) {
                if($blog[0]['is_hide'] != null) {
                    $view->show404Page();
                }
                    $authorName = $model->getAuthorNameById($blog[0]['id_author']);
                    if ($authorName != null || $authorName != '') {
                        $imagePath = $model->getImagePathById($blog[0]['id_img']);
                        if ($imagePath != null || $imagePath != '') {
                            $categoryName = $model->getCategoryNameById($blog[0]['id_category']);
                            if ($categoryName != null || $categoryName != '') {
                                $commentsData = $model->getCommentsByBlogId($id);
                                $model->updateCountInfoBlogById($id,$commentsData);
                                $categories = $model->getAllCategories();
                                $data = [
                                    'blogData' => [
                                        'author' => $authorName,
                                        'author_id' => $blog[0]['id_author'],
                                        'title' => $blog[0]['title'],
                                        'category' => $categoryName,
                                        'text' => $blog[0]['text'],
                                        'date_created' => $blog[0]['date_created'],
                                        'path_img' => $imagePath,
                                        'count_view' => $blog[0]['count_view'],
                                        'count_comments' => $blog[0]['count_comments'],
                                        'blog_id' => $id,
                                        'commentError' => $commentError,
                                        'comments' => $commentsData,
                                        'categories' => $categories
                                    ],
                                    'access' => $this->auth->isLoggedIn()
                                ];
                                $view->showFullBlog($data);
                                die();
                            }
                        }
                    }
            }else {
                $view->show404Page();
            }
        }

        $view->showFullBlog();
    }

    public function controllerAddComment() {
        if (isset($_POST['send_text_comment']) && $this->auth->isLoggedIn()) {
            $model = new MainModel($this->qb,$this->auth);
            $view = new MainView($this->template);
            $text = trim(htmlspecialchars(strip_tags($_POST['send_text_comment'])));
            $blogId = (int)$_POST['blogId'];

            if((mb_strlen($text) < 5) || (mb_strlen($text) > 5000) ) {
                self::controllerGetFullBlog($blogId,'Длина комментария должна быть от 5 до 5000 символов');
            }else {
                $isHaveThisBlog = $model->isHaveBlogById($blogId);
                if ($isHaveThisBlog) {
                    $data = [
                        'author_id' => $this->auth->getUserId(),
                        'text' => $text,
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'date_created' => date('Y-m-d H:i:s',time()),
                        'id_blog' => $blogId
                    ];
                    $model->insertCommentToDb($data);
                    header('Location: /blog/' . $blogId);
                }else {
                    self::controllerGetFullBlog($blogId,'Такого блога не существует (-.-)');
                }

            }

        }
    }

    public function controller404() {
        $view = new MainView($this->template);
        $view->show404Page();
    }

    public function controllerShowBlogsFromCategory($category) {
        $view = new MainView($this->template);
        $model = new MainModel($this->qb,$this->auth);
        $blogs = $model->getBlogForCategory($category);
        $categories = $model->getAllCategories();
        if ($blogs['name'] == null) {
            $view->show404Page();
            die();
        }
        $data = [
            'categories' => $categories,
            'data' => $blogs
        ];
        $view->showPageWithDefinitelyCategory($data);
    }
}