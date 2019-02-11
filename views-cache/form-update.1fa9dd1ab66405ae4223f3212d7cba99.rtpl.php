<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid" id="center-list">
    <form action="/photogallery/admin/alterar/<?php echo htmlspecialchars( $photo["idphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onSubmit="return validar(this);" name="frm-gallery-update" id="frm-gallery-update" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Seu Título" value="<?php echo htmlspecialchars( $photo["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <small id="titleHelp" class="form-text text-muted">Digite um texto interessante.</small>
        </div>
        <div class="form-group">
            <label for="desphoto">Foto para Galeria</label>
            <input type="file" class="form-control-file" id="desphoto" name="desphoto">
        </div>
        <div class="form-group">
            <label for="legphoto">Legenda</label>
            <input type="text" class="form-control" id="legphoto" name="legphoto" aria-describedby="legphotoHelp" placeholder="Sua Legenda" value="<?php echo htmlspecialchars( $photo["legphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <small id="legphotoHelp" class="form-text text-muted">Uma legenda para a foto.</small>
        </div>
        <div id="image-exemplo">
            <?php if( $photo["desphoto"]=='' ){ ?>
                <img src="/photogallery/res/images/image_default.jpg" id="image-select">
            <?php }else{ ?>
                <img src="/photogallery/res/images/gallery/<?php echo htmlspecialchars( $photo["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="image-select">
            <?php } ?>
        </div>
    <button type="submit" class="btn btn-primary">Alterar Foto Na Galeria</button>
    
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