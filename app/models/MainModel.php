<?php

namespace App\MainModel;

use App\lib\Image\Image;
use App\lib\QueryBuilder\QueryBuilder;
use Delight\Auth\Auth;
use SimpleMail;


class MainModel
{
    private $qb;
    private $auth;

    public function __construct(QueryBuilder $qb,Auth $auth)
    {
        $this->qb = $qb;
        $this->auth = $auth ;
    }

    public function getAllBlogs() {
        return $this->qb->getAllFromTable('blogs','date_created');
    }

    public function modelRegistrationUser($email, $login, $pass)
    {
        try {
            $userId = $this->auth->register($email, $pass, $login, function ($selector, $token) {
                $msg = 'Для подтверждения регистрации перейдите по <a href="http://myblog.ru/emailverif/selector=' . $selector . '&token=' . $token .'">ссылке</a>';
                $isEmailSend = $this->sendEmail('some@example.ru','Подтверждение регистрации',$msg);
            });
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            return ['isReg' => false,
                'isEmailSend' => false,
                'statusRegError' => 'Укажите корректный E-mail',
                'ajaxError' => 'email__error'
            ];
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            return ['isReg' => false,
                'isEmailSend' => false,
                'statusRegError' => 'Укажите корректный пароль',
                'ajaxError' => 'password__error'
            ];
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            return ['isReg' => false,
                'isEmailSend' => false,
                'statusRegError' => 'Такой пользователь уже зарегистрирован',
                'ajaxError' => 'user__error'
            ];
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            return ['isReg' => false,
                'isEmailSend' => false,
                'statusRegError' => 'Слишком много запросов',
                'ajaxError' => 'request__error'
            ];
        }
        return ['isReg' => true];

    }

    public function sendEmail($receiverEmail,$subject,$message,$receiverName = '' ) {

        $checkSendMail = SimpleMail::make()
            ->setTo($receiverEmail, $receiverName)
            ->setSubject($subject)
            ->setMessage($message)
            ->setHtml()
            ->send();

        return $checkSendMail;
    }

    public function verifiedEmail($selector,$token) {
        try {
            $this->auth->confirmEmail($selector, $token);

            echo 'Email address has been verified';
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

    public function modelLoginUser($login,$pass) {
        try {
            $this->auth->loginWithUsername($login, $pass);

            return 'login__ok';
        }
        catch (\Delight\Auth\UnknownUsernameException $e) {
            return 'error__user__not_found';
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            return 'error__pass';
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            return 'error__verif';
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            return 'error__attempts';
        }
    }

    public function getAllCategories() {
        return $this->qb->getAllFromTable('categories');
    }

    public function addPost($title,$text,$category,$userId,$img) {

        if (mb_strlen($title) <= 1 && mb_strlen($title) < 150 ) {
            return 'Заголовок должен быть от 2-ух до 150 символов';
        }

        if (mb_strlen($text) <= 70 && mb_strlen($title) < 30000 ) {
            return 'Текст должен быть от 70-ми до 30 000 символов';
        }

        if (empty($category)) {
            return 'Выберете категорию';
        }

        $imgClass = new Image($this->qb);
        if ($imgClass->checkUploadImageOnSize($img) == false) {
            return 'Размер картинки должен быть от 1 до 100 КБ';
        }

        if ($imgClass->checkUploadImageOnType($img) == false) {
            return 'Разрешенный тип картинки: image/jpeg, image/png';
        }


        $result = $imgClass->uploadImage($img,DIRECTORY_FOR_IMAGES,$userId);

        if (is_array($result)) {
            //path_img
            $categoryInfo = $this->qb->getRowsByCondition(
                ['alias'=>$category],
                'categories',
                'alias'
            );

            if (count($categoryInfo) > 0) {
                $categoryId = $categoryInfo[0]['id'];
                $data = [
                  'title' => $title,
                  'text' => $text,
                  'date_created' => date('Y-m-d H:i:s',time()),
                  'id_img' => $result['path_id'],
                  'id_category' =>  $categoryId,
                  'id_author' => $userId,
                   'published_ip' => $_SERVER['REMOTE_ADDR'],
                   'count_view' => 0,
                   'count_comments' => 0,
                ];
                $this->qb->insertData($data,'blogs');
                return true;
            }else {
                return 'Ошибка при публикации блога';
            }
        }else {
            return 'Ошибка при загрузке картинки';
        }



    }

    public function getBlog($blogId) {
        $blog = $this->qb->getRowsByCondition(['id'=>$blogId],'blogs','id');
        return $blog;
    }

    public function getAuthorNameById($authorId) {
        $author = $this->qb->getRowsByCondition(['id'=>$authorId],'users','id');
        return $author[0]['username'];
    }

    public function getImagePathById($pathId) {
        $image = $this->qb->getRowsByCondition(['id'=>$pathId],'images','id');
        return $image[0]['path_img'];
    }

    public function getCategoryNameById($categotyId) {
        $category = $this->qb->getRowsByCondition(['id'=>$categotyId],'categories','id');
        return $category[0]['category_name'];
    }

    public function getCategoryIdByName($categotyName) {
        $category = $this->qb->getRowsByCondition(['alias'=>$categotyName],'categories','alias');
        return $category[0]['id'];
    }

    public function isHaveBlogById($id) {
        $blog = $this->qb->getRowsByCondition(['id'=>$id],'blogs','id');
        if (count($blog) === 1) {
            return true;
        }else {
            return false;
        }
    }

    public function insertCommentToDb($data) {
        $this->qb->insertData($data,'comments');
    }

    public function getCommentsByBlogId($blogId) {
        $comemnts = $this->qb->getRowsByCondition(['id_blog'=>$blogId],'comments','id_blog');
        if (count($comemnts) == 0) {
            return false;
        }else {
            $data = array();
            foreach ($comemnts as $comment) {
                $authorName = self::getAuthorNameById($comment['author_id']);
                array_push($data,
                    [
                    'author' => $authorName,
                    'date_created' => $comment['date_created'],
                     'text' => $comment['text'],
                     'id' => $comment['id'],
                     'author_id' => $comment['author_id']
                    ]);
            }

            return $data;
        }
    }

    public function updateCountInfoBlogById($id,$comments) {
        $blog = $this->qb->getRowsByCondition(['id'=>$id],'blogs','id');

        if ($comments != false) {
            $countComment = count($comments);
            $this->qb->updateData(['count_comments' => $countComment],$id,'blogs');
        }

        $countViewsOld = $blog[0]['count_view'];
        $countViewsNew = $countViewsOld + 1;
        $this->qb->updateData(['count_view' => $countViewsNew],$id,'blogs');

    }

    public function getTopBlogsByViews() {
        $blogs = $this->qb->getDataOrderByAndLimit('blogs','count_view');
        return $blogs;
    }

    public function getLastComments() {
        $comments = $this->qb->getDataOrderByAndLimit('comments','date_created');
        return $comments;
    }

    public function getBlogForCategory($category) {
        $categoryId = self::getCategoryIdByName($category);
        $categoryName = self::getCategoryNameById($categoryId);
        $blogs = $this->qb->getRowsByCondition(['id_category'=>$categoryId],'blogs','id_category');
        $arrayBlogs['name'] = $categoryName;
        $arrayBlogs['blogs'] = $blogs;
        return $arrayBlogs;
    }

    public function getBlogsByAuthorId($id) {
        $blogs = $this->qb->getRowsByCondition(['id_author'=>$id],'blogs','id_author');
        return $blogs;
    }

    public function getMorePosts($table,$page) {
        $blogs = $this->qb->getNextPosts($table,$page);
        return $blogs;
    }
}

