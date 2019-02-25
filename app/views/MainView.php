<?php
namespace App\MainView;

use League\Plates\Engine;

class MainView
{
    private $templates;
    public function __construct(Engine $engine) {
        $this->templates = $engine;
    }

    public function showRegistrationPage($data = null) {

        echo $this->templates->render('registration',['data'=>$data]);
    }
    public function showHomePageWithoutAuthorization($data = null,$paginator) {
        echo $this->templates->render('homepage',['data'=>$data,'paginator'=>$paginator]);
    }

    public function showHomePageWithAuthorization($data = null,$paginator) {
        echo $this->templates->render('homepageWithAuth',['data'=>$data,'paginator'=>$paginator]);
    }

    public function showPageAddPost($data = null) {
        echo $this->templates->render('add_post',['data'=>$data]);
    }

    public function showFullBlog($data = null) {
        echo $this->templates->render('full-view',['data'=>$data]);
    }

    public function show404Page($data = null) {
        echo $this->templates->render('404',['data'=>$data]);
        die();
    }

    public function showPageWithDefinitelyCategory($data = null) {
        echo $this->templates->render('category_list',['data'=>$data]);
    }

    public function showPageUsersBlogs($data = null) {
        echo $this->templates->render('user-info',['data'=>$data]);
    }

}