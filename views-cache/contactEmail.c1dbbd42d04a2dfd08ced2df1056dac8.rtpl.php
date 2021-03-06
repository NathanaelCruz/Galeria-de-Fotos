<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contato</title>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
      <style type="text/css">
      
        *
        {
            margin:0;
            padding:0;
            font-family: Helvetica, Arial, sans-serif;
        }
        body
        {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%!important;
            height: 100%;
            text-align: center;
            color:rgb(97, 97, 97);
            background-image: url('https://wallpapertag.com/wallpaper/full/8/b/a/456256-amazing-mountain-background-images-1920x1080-for-macbook.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #center,
        #body-menssage
        {
            height: auto;
            display: block;

        }
        #center
        {   
            width: 50%;
            margin: 20px auto;
            padding: 10px;
            background-color: rgba(236, 236, 236, 0.404);
            overflow: hidden;
        }
        #center h1
        {
            font-family: 'Lobster', cursive;
            font-size: 50px;
        }
        #body-menssage
        {
            width: 100%;

        }
        #center h3
        {
            font-size: 20px;
            margin: 10px auto;
        }
        #body-menssage
        {
            width: 70%;
            margin: 0 auto;
        }
        #body-menssage p
        {
            text-align: justify;
        }
        #footer-menssage
        {
            margin: 10px auto;
        }
        #center h1,
        #center h3,
        #footer-menssage p,
        {
            text-align: center;
        }
      </style>
</head>
<body>
    <div id="center">
        <h1>&#167; Contato &#167;</h1>
        <h3>Mensagem de <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        <h3>Email: <a href="mailto:<?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h3>
        <div id="body-menssage">
            <p><?php echo htmlspecialchars( $mensagem, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>
        <div id="footer-menssage">
            <p>&copy; Copyright Nathanael Cruz Alves. 2019.</p>
        </div>
    </div>
    
</body>
</html>