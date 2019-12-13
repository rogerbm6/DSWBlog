<?php
include __DIR__ . "/partials/inicio-doc.partials.php";
include __DIR__ . "/partials/nav.partials.php";
 ?>
<section class="row page-content-wrap">
    <div class="container">
        <h2 class="page-title text-center">Tus blogs</h2>
        <div class="row">
            <div class="col-md-10 page-contents">
              <a href="autor"><button type="button" class="btn btn-primary"><span>Nuevo Post</span></button></a>
              <?php if(isset($posts)){ ?>
                <div class="row page-content">
                    <div class="contents row">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>fecha</th>
                            <th>titulo</th>
                            <th>contenido</th>
                            <th>categoria</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($posts as $value): ?>
                          <tr>
                              <td><img class="img-rounded fotoAutor" src="<?= $value->getURLPosts(); ?>"></td>
                              <td><?= $value->getFecha() ?></td>
                              <td><?= $value->getTitulo() ?></td>
                              <td><?= $value->getContenido()?></td>
                              <td><?= $postRepository->getCategoria($value)->getNombre()?></td>
                              <td><form method="post" action="actualizar">
                                    <input type="hidden" name="id_actualizar" value="<?= $value->getId() ?>">
                                    <input type="submit" class="btn btn-success"value="actualizar">
                                  </form>
                              </td>
                              <td><form method="post">
                                    <input type="hidden" name="id_borrar" value="<?= $value->getId() ?>">
                                    <input type="submit" class="btn btn-danger"value="eliminar">
                                  </form>
                              </td>
                          </tr>
                         <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                </div>
              <?php }else { ?>
                <div class="row page-content">
                    <div class="contents row">
                      <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                          <button type="button" class="clase" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">x</span>
                          </button>
                          <!-- Si no hay errores muestra un mensaje de informacion aceptada -->
                          <?php if(empty($errores)) : ?>
                          <p><?= $mensaje ?></p>
                          <!-- Si hay errores los muestra todos con un foreach -->
                          <?php else : ?>
                          <ul>
                              <?php foreach($errores as $error) : ?>
                              <li><?= $error ?></li>
                              <?php endforeach; ?>
                          </ul>
                          <?php endif; ?>
                      </div>
                    </div>
                </div>
              <?php } ?>
              </div>

            <div class="col-md-2 sidebar">
                <!--Author Widget-->
                <aside class="row m0 widget-author widget has-pt">
                    <div class="widget-author-inner row">
                        <div class="author-avatar row"><a href="#"><img class="img-circle fotoAutor" src="<?= $autor->getUrlFoto() ?>"> </a></div>
                        <a href="#"><h2 class="author-name"><?= $autor->getNombre() ?></h2></a>
                        <p><a href="logout"><button type="button" class="btn btn-danger"><span>cerrar sesion</span></button></a></p>
                    </div>

                </aside>
            </div>
            </div>
        </div>
    </div>
</section>
 <!--Footer-->
 <?php include __DIR__ . "/partials/fin-doc.partials.php"; ?>
