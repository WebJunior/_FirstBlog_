<?php
namespace App\lib\Image;
use App\lib\QueryBuilder\QueryBuilder;

class Image {
    //максимальный размер картинки ( 100 КБ)
    private $maxSize = 100000;
    //разрешенные типы для загрузки
    private $arrayTypes = ['image/jpeg','image/png'];
    private $qb;
    public function __construct(QueryBuilder $qb) {
        $this->qb = $qb;
    }
    // метод проверки нашей картинки на размер.
    public function checkUploadImageOnSize($file) {
        if ( ($file['size'] > $this->maxSize) || $file['size'] == 0) {
            return false;
        }else {
            return true;
        }
    }
    // метод проверки нашей картинки на тип.
    public function checkUploadImageOnType($file) {
        if (!in_array($file['type'],$this->arrayTypes)) {
            return false;
        } else {
            return true;
        }
    }
    public function uploadImage($file,$dir,$userId) {
        $randValue = time() . '' . rand(10,999999);
        $img_name = $randValue . '_' .$file['name'];
        $destionation = $dir .'/' . $img_name;
        $pathImgForBD = '/' . $img_name;
        if(move_uploaded_file($file['tmp_name'], $destionation)) {
            $data = [
                'path_img' => $pathImgForBD,
                'date_upload' => date('Y-m-d H:i:s',time()),
                'author_id' => $userId
            ];
            $this->qb->insertData($data,'images');
            $pathInfo = $this->qb->getRowsByCondition(
                ['path_img' => $pathImgForBD],
                'images',
                'path_img');

            return [
                'status' => true,
                'path_img' => $pathImgForBD,
                'path_id' => $pathInfo[0]['id']
            ];
        }else {
            return false;
        }
    }

}