<?php

namespace PhotoGallery;

use PhotoGallery\DB\Sql;

class Gallery extends Model
{

    public static function listAll()
    {
        
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM photos ORDER BY idphoto DESC");
        
        return $results;

    }

    public function create()
    {

        $sql = new Sql();

        $nameFile = substr(uniqid(rand(0,10), true), 0, 9) . ".jpg";

        $results = $sql->query("INSERT INTO photos (title, desphoto, legphoto, date) VALUES (:title, :desphoto, :legphoto, :datephoto)", array(
            ":title" => $this->gettitle(),
            ":desphoto" => $nameFile,
            ":legphoto" => $this->getlegphoto(),
            ":datephoto" => date("Y-m-d H:i:s")
        ));

        $this->listAll();

    }

    public function getLastId()
    {
        
        $sql = new Sql();
        
        $list = $sql->select("SELECT * FROM photos ORDER BY idphoto DESC LIMIT 1");

        $this->setData($list[0]);

    }

    public function update()
    {

        $sql = new Sql();

        $results = $sql->query("UPDATE photos SET title = :title, legphoto = :legphoto, date = :datephoto WHERE idphoto = :idphoto", array(
            ":idphoto" => $this->getidphoto(),
            ":title" => $this->gettitle(),
            ":legphoto" => $this->getlegphoto(),
            ":datephoto" => date("Y-m-d H:i:s")
        ));

        $this->listAll();

    }

    public function delete()
    {

        $sql = new Sql();

        $destinyPhoto = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR .
        "photogallery" . DIRECTORY_SEPARATOR .
        "res" . DIRECTORY_SEPARATOR .
        "images" . DIRECTORY_SEPARATOR .
        "gallery" . DIRECTORY_SEPARATOR . $this->getdesphoto();

        unlink($destinyPhoto);

        $results = $sql->query("DELETE FROM photos WHERE idphoto = :idphoto", array(
            ":idphoto" => $this->getidphoto()
        ));

        $this->listAll();

    }

    public function setPhoto($file)
    {

        $extension = explode('.', $file["name"]);
        $extension = end($extension);

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $img = imagecreatefromjpeg($file["tmp_name"]);
                break;
            case 'png':
                $img = imagecreatefrompng($file["tmp_name"]);
                break;
            case 'gif':
                $img = imagecreatefromgif($file["tmp_name"]);
                break;
        }

        $dist = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR .
            "photogallery" . DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "images" . DIRECTORY_SEPARATOR .
            "gallery" . DIRECTORY_SEPARATOR . $this->getdesphoto();

        imagejpeg($img, $dist);

        imagedestroy($img);
    }

    public function get($id)
    {
        
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM photos WHERE idphoto = :id", array(
            ":id" => $id
        ));

        $this->setData($results[0]);
    }

    public function getPhotosPage($page = 1, $itemsPerPage = 8)
    {
        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM photos LIMIT $start, $itemsPerPage");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

}

?>