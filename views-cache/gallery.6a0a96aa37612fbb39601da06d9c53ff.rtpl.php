<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid" id="center-list-site-gallery">

    <div id="gallery">
        <h1>Galeria</h1>
        <div id="content-gallery">

            <?php if( $total>0 ){ ?>
            <div class="image-light">
                <?php $counter1=-1;  if( isset($photos) && ( is_array($photos) || $photos instanceof Traversable ) && sizeof($photos) ) foreach( $photos as $key1 => $value1 ){ $counter1++; ?>
                <a href="res/images/gallery/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["legphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="res/images/gallery/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Titulo"></a>
                <?php } ?>
            </div>
            
            <script>
            
                //new SimpleLightbox({elements: '.imageGallery1 a'});
            
                // or if using jQuery
                $('#gallery #content-gallery .image-light a').simpleLightbox();
            </script>
            <?php }else{ ?>
                <div class="alert alert-info" role="alert" id="no-info">
                    Não temos nenhum conteúdo para essa áre no momento. ;)
                </div>
            <?php } ?>
        </div>
    </div>
    
    <?php if( $total>0 ){ ?>
    <div id="pagination">
        <nav aria-label="Navegação da galeria">
            <ul class="pagination">
                <li class="page-item" aria-label="Anterior">
                    <a class="page-link" href="/photogallery/galeria?page=<?php echo htmlspecialchars( $anterior, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
                <li class="page-item" aria-label="Próximo">
                    <a class="page-link" href="/photogallery/galeria?page=<?php echo htmlspecialchars( $proximo, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php } ?>
</div>