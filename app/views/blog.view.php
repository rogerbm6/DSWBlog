<?php
include __DIR__ . "/partials/inicio-doc.partials.php";
include __DIR__ . "/partials/nav.partials.php";
?>


<section class="row content-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8 single-post-contents">
                <article class="single-post-content row m0 post">
                    <header class="row">
                        <h5 class="post-meta">
                            <a class="date"><?= $post->getFecha() ?></a>
                            <span class="post-author"><i>by</i><a><?=$autorRepository->find($post->getAutor())->getNombre(); ?></a></span>
                        </h5>
                        <h2 class="post-title"><?= $post->getTitulo() ?></h2>
                        <div class="row">
                            <h5 class="taxonomy pull-left"><i>in</i><a href="#"><?= $categoriaRepository->find($post->getCategoria())->getNombre() ?></a></h5>
                        </div>
                    </header>
                    <div class="featured-content row m0">
                        <a href="#"><img src="<?=$post->getURLPosts()?>" alt=""></a>
                    </div>
                    <div class="post-content row">
                        <?=$post->getContenido()?>
                    </div>

                </article>
            </div>
            <div class="col-md-4 sidebar">
                <!--Author Widget-->
                <aside class="row m0 widget-author widget has-pt">
                    <div class="widget-author-inner row">
                        <div class="author-avatar row"><a href="#"><img class="img-circle fotoAutor" src="<?= $autor->getUrlFoto() ?>"> </a></div>
                        <a href="#"><h2 class="author-name"><?= $autor->getNombre() ?></h2></a>

                    </div>

                </aside>
            </div>
        </div>
    </div>
</section>

<!--Footer-->
<?php include __DIR__ . "/partials/fin-doc.partials.php"; ?>
