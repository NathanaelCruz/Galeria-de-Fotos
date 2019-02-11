<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid" id="center-list">
    <form action="" name="frm-gallery" id="frm-gallery" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Seu Título">
            <small id="titleHelp" class="form-text text-muted">Digite um texto interessante.</small>
        </div>
        <div class="form-group">
            <label for="desphoto">Foto para Galeria</label>
            <input type="file" class="form-control-file" id="desphoto" name="desphoto">
        </div>
        <div class="form-group">
            <label for="legphoto">Legenda</label>
            <input type="text" class="form-control" id="legphoto" name="legphoto" aria-describedby="legphotoHelp" placeholder="Sua Legenda">
            <small id="legphotoHelp" class="form-text text-muted">Uma legenda para a foto.</small>
        </div>
        <div id="image-exemplo">

            <img src="/photogallery/res/images/image_default.jpg" id="image-select">

        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Foto Na Galeria</button>
        
    </form>
</div>
<script>
    $("#desphoto").change(function(){
        var img = $('#image-exemplo');
        img.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image",
                "id": "image-select"
            }).appendTo(img);
        }
        img.show();
        reader.readAsDataURL($(this)[0].files[0]);
    });
</script>