<?php
include __DIR__ . "/partials/inicio-doc.partials.php";
include __DIR__ . "/partials/nav.partials.php";
?>


<section class="row page-content-wrap">
    <div class="container">
        <h2 class="page-title text-center">Iniciar sesion</h2>
        <div class="row">
            <div class="col-md-8 page-contents">
                <div class="row page-content">
                    <div class="contents row">
                        <br>
                         <!-- Verificamos que nos llegue información de un formularo en el metodo post -->
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                          <!-- Muestra info si mensajes está vacia, si no lo esta imprime danger-->
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
                        <?php endif; ?>

                        <hr>
                        <form method="post" class="contact-form row" action="<?=$_SERVER["REQUEST_URI"] ?>" enctype="multipart/form-data">
                            <div class="form-group col-sm-6">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuario" class="form-control" name="usuario"placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="contra">Contraseña</label>
                                <input type="password" id="contra" class="form-control" name="contra"placeholder="Palabra secreta" required>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn-primary"><span>Enviar</span></button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--Footer-->
<?php include __DIR__ . "/partials/fin-doc.partials.php"; ?>
