<?php
include __DIR__ . "/partials/inicio-doc.partials.php";
include __DIR__ . "/partials/nav.partials.php";
?>


<section class="row page-content-wrap">
    <div class="container">
        <h2 class="page-title text-center">Actualizar post</h2>
        <div class="row">
            <div class="col-md-10 page-contents">
              <a href="admin"><button type="button" class="btn btn-primary"><span>volver</span></button></a>
                <div class="row page-content">
                    <div class="contents row">
                        <br>

                        <form method="post" class="contact-form row" action="actualizarPost" enctype="multipart/form-data">
                          <input hidden name="imagen" value="<?=$postActual->getImagen()?>">
                          <input hidden name="id_post" value="<?=$postActual->getId()?>">
                            <div class="form-group col-sm-6">
                                <label for="titulo">Titulo del nuevo post</label>
                                <input type="text" id="titulo" class="form-control" name="titulo"placeholder="Título del post"value="<?=$postActual->getTitulo()?>" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="select">CATEGORÍA DEL POST</label>
                                <select name="categoria"class="form-control" id="select">
                                  <option selected value="<?=$categoriaActual->getId()?>"><?=$categoriaActual->getNombre()?></option>
                                  <?php foreach ($categorias as $categoria) : ?>
                                  <option value="<?= $categoria->getId()?>"><?= $categoria->getNombre();?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="imagen">SELECCIONA UNA IMAGEN</label>
                              <input class="form-control-file" name="imagen" type="file">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="contenido">CONTENIDO DEL NUEVO POST</label>
                                <textarea name="contenido" id="contenido"  class="form-control" placeholder="Descripción"><?=$postActual->getContenido()?></textarea>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn-primary"><span>Enviar</span></button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-2 sidebar">
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
    </div>
</section>

<!--Footer-->
<?php include __DIR__ . "/partials/fin-doc.partials.php"; ?>
