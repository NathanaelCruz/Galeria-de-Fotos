<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid" id="center-list">
    <?php if( $total>0 ){ ?>
        <?php $countPhotos = 1; ?>
        <?php $counter1=-1;  if( isset($photos) && ( is_array($photos) || $photos instanceof Traversable ) && sizeof($photos) ) foreach( $photos as $key1 => $value1 ){ $counter1++; ?>
            <?php $countPhotos += 1; ?>
            <div <?php if( $countPhotos%2==0 ){ ?>class="photo-item-transparent"<?php }else{ ?>class="photo-item-gray"<?php } ?>>
                <div class="photo-gallery">
                    <img src="/photogallery/res/images/gallery/<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="title-photo">
                    <p class="title"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    <p class="leg-photo"><?php echo htmlspecialchars( $value1["legphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div class="buttons-conjuct">
                    <p><a class="btn btn-primary btn-xs" href="/photogallery/admin/alterar/<?php echo htmlspecialchars( $value1["idphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fa fa-edit"></i> Alterar</a> <a class="btn btn-danger btn-xs" href="/photogallery/admin/excluir/<?php echo htmlspecialchars( $value1["idphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><i class="fa fa-trash"></i> Excluir</a></p>
                </div>
            </div>
        <?php } ?>
        
        <div id="pagination">
            <nav aria-label="Navegação da galeria">
                <ul class="pagination">
                    <li class="page-item" aria-label="Anterior">
                        <a class="page-link" href="/photogallery/admin/fotos?page=<?php echo htmlspecialchars( $anterior, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Anterior</span>
                        </a>
                    </li>
                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>
                    <li class="page-item" aria-label="Próximo">
                        <a class="page-link" href="/photogallery/admin/fotos?page=<?php echo htmlspecialchars( $proximo, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php }else{ ?>
        <div class="alert alert-info" role="alert" id="no-info">
            Não temos nenhum conteúdo para essa áre no momento. ;)
        </div>
    <?php } ?>
</div>
