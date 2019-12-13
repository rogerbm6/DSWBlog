<?php
 include __DIR__ . "/partials/inicio-doc.partials.php";
 include __DIR__ . "/partials/nav.partials.php"; ?>


  <section class="row featured-post-carousel">
    <div class="item post">
      <img src="images/featured-posts/1.jpg" alt="" class="img-responsive main-bg">
    </div>
    <div class="item post">
      <img src="images/featured-posts/1-1.jpg" alt="" class="img-responsive main-bg">
    </div>
    <div class="item post">
      <img src="images/featured-posts/1-2.jpg" alt="" class="img-responsive main-bg">
    </div>
  </section>

  <section class="row content-wrap">
    <div class="container">
      <div class="row" id="post-masonry">
        <!-- -->
        <!--Blog Post-->
        <?php foreach ($posts as $post): ?>


        <article class="col-sm-4 post post-masonry post-format-image">
          <div class="post-wrapper row">
            <div class="featured-content row">

                <form method="post" action="blog">
                    <input type="hidden" name="id_autor" value="<?= $post->getAutor() ?>">
                    <input type="hidden" name="id_post" value="<?= $post->getId() ?>">
                    <input type="image" class="img-responsive"src="<?=$post->getURLPosts()?>">
                  </form>
            </div>
            <div class="post-excerpt row">
              <h5 class="post-meta">
                <a class="date"><?=$post->getFecha()?></a>
                <span class="post-author"><i>by</i><a href="#"><?=$autorRepository->find($post->getAutor())->getNombre(); ?></a></span>
              </h5>
              <h3 class="post-title"><a href="blog"><?=
              $post->getTitulo() ?></a></h3>
              <p><?=$post->getContenido() ?></p>
            </div>
          </div>
        </article>
        <!-- -->
    <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php include __DIR__ . "/partials/fin-doc.partials.php"; ?>
