<?php

namespace PhotoGallery;

session_start();

require_once("vendor/autoload.php");

Use Slim\Slim;
Use PhotoGallery\Page;
Use PhotoGallery\PageAdmin;
Use PhotoGallery\Gallery;
Use PhotoGallery\User;
Use PhotoGallery\Mailer;

$app = new Slim();

$app->get("/", function(){

    $page = new Page();
    
    $page->setTpl("index");

});

$app->get("/quem-somos", function(){

    $page = new Page();
    
    $page->setTpl("about");

});

$app->get("/galeria", function(){

    $pageSelect = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $gallery = new Gallery();

    $pagination = $gallery->getPhotosPage($pageSelect);
    
    $prev = ($pageSelect==1) ? $pageSelect : $pageSelect - 1;
    $next = ($pageSelect==$pagination['pages']) ? $pagination['pages'] : $pageSelect + 1;

    $pages = [];

    for ($i=1; $i <= $pagination['pages']; $i++) { 
        array_push($pages, [
            'link'=>'/photogallery/galeria?page=' . $i,
            'page'=> $i
        ]);
    }

    $page = new Page();

    $page->setTpl("gallery", array(
        'photos'=>$pagination['data'],
        'pages'=>$pages,
        'anterior' => $prev,
        'proximo' => $next,
        'total' => $pagination['total']
    ));

});

$app->get("/contato", function(){

    $page = new Page();
    
    $page->setTpl("contact");

});

$app->get("/admin", function(){

    $status = (isset($_GET['s'])) ? $_GET['s'] : "";

    $page = new PageAdmin([
		"header"=>false,
        "footer"=>false
    ]);

    $page->setTpl("index", array("status" => $status));

});

$app->get("/admin/alterar/:id", function($id){

    User::verifyLogin();

    $page = new PageAdmin();

    $gallery = new Gallery();

    $gallery->get((int)$id);

    $page->setTpl("form-update", array("photo" => $gallery->getValues()));

});

$app->get("/admin/fotos", function(){

    User::verifyLogin();
    
    $pageSelect = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $gallery = new Gallery();

    $pagination = $gallery->getPhotosPage($pageSelect, 5);
    
    $prev = ($pageSelect==1) ? $pageSelect : $pageSelect - 1;
    $next = ($pageSelect==$pagination['pages']) ? $pagination['pages'] : $pageSelect + 1;

    $pages = [];

    for ($i=1; $i <= $pagination['pages']; $i++) { 
        array_push($pages, [
            'link'=>'/photogallery/admin/fotos?page=' . $i,
            'page'=> $i
        ]);
    }

    $page = new PageAdmin();

    $page->setTpl("list", array(
        'photos'=>$pagination['data'],
        'pages'=>$pages,
        'anterior' => $prev,
        'proximo' => $next,
        'total' => $pagination['total']
    ));

});

$app->get("/admin/cadastrar", function(){

    User::verifyLogin();
    
    $page = new PageAdmin();
    
    $page->setTpl("form-create");

});

$app->get("/admin/excluir/:id", function($id){

    User::verifyLogin();
    
    $gallery = new Gallery();

    $gallery->get((int)$id);

    $gallery->delete();

    header("Location: /photogallery/admin/fotos");
    exit;

});


$app->get("/admin/logout", function(){

    User::logout();

    header("Location: /photogallery/admin");
    exit;

});

$app->post("/admin/alterar/:id", function($id){

    $gallery = new Gallery();

    $gallery->get((int)$id);

    $gallery->setData($_POST);

    $gallery->update();

    var_dump($_FILES["desphoto"]);

    if ($_FILES["desphoto"]["tmp_name"] != "") {
        $gallery->setPhoto($_FILES["desphoto"]);
    }

    header("Location: /photogallery/admin/fotos");
    exit;

});

$app->post("/admin/cadastrar", function(){

    $gallery = new Gallery();

    $gallery->setData($_POST);

    $gallery->create();

    $gallery->getLastId();

    $gallery->setPhoto($_FILES["desphoto"]);

    header("Location: /photogallery/admin/fotos");
    exit;

});

$app->post("/admin", function(){

    User::loginUser($_POST["deslogin"], $_POST["despassword"]);
    
    header("Location: /photogallery/admin/fotos");
    exit;

});

$app->post("/contato", function(){

    $mailer = new Mailer($_POST["email"], $_POST["name"], $_POST["subject"], "contactEmail", $_POST["menssage"]);
    
    $mailer->send();

    header("Location: /photogallery/contato");
    exit;

});

$app->run();

?>