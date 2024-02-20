<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <?php if($alerta) {
        include_once __DIR__ . '/../../templates/alertas.php';
    } ?>

    <div class="dashboard__cursos">

        <?php foreach($cursos as $curso) { ?>
            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <picture>
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                        <img class="tarjeta__face" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen curso">
                    </picture>
                    <div class="tarjeta__contenido">
                        <h3 class="tarjeta__nombre"><?php echo $curso->nombre ?></h3>
                        <p class="tarjeta__texto"><?php echo $curso->duracion ?></p>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg"></div>
                    <p class="tarjeta__descripcion"><?php if(strlen($curso->descripcion) < 1000) {
                        echo $curso->descripcion;
                    } else {
                        echo substr($curso->descripcion, 0, 1000) . "...";
                    } ?></p>
                    <form class="table__carrito" method="POST">
                        <input type="hidden" name="curso_id" value="<?php echo $curso->id ?>">
                        <button class="table__accion--carrito" type="submit">
                            <i class="fa-solid fa-cart-plus"></i>
                            Añadir a Carrito
                        </button>
                    </form>   
                </div>
            </div>
        <?php } ?> 

    </div>

    <h2 class="dashboard__h2">Nuestros Ponentes</h2>

    <div class="formulario-admin__grid">
        <?php foreach($ponentes as $ponente) { ?>
            <div class="card card__cursos">
                <div class="card__body card__body--cursos">
                    <div class="card__body--border-cursos">
                        <div class="card__img-body--cursos">
                            <picture>
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.webp'?>" type="image/webp">
                                <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" type="image/png">
                                <img class="card__img" src="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" alt="Imagen ponen$ponente">
                            </picture>
                        </div>
            
                        <p class="card__title"><?php echo $ponente->nombre . " " . $ponente->apellido ?? '' ?></p>
                        <p class="card__desc"><?php if(strlen($ponente->descripcion) < 250) {
                            echo $ponente->descripcion;
                        } else {
                            echo substr($ponente->descripcion, 0, 250) . "...";
                        } ?></p>

                        <div class="table__formulario">
                            <a class="admin__boton--cursos admin__boton--ponentes" href="/ponente-informacion?id=<?php echo $ponente->id ?>">
                                <i class="fa-solid fa-plus"></i>
                                Más Información
                            </a>
                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <h2 class="dashboard__h2">Donaciones Generosas</h3>
    <h3 class="dashboard__h3">Apoya nuestra misión fortalece la fe</h3>
    <p class="dashboard__p">Ayuda a fortalecer la fe y detener el cristianismo.Tu donación es fundamental para nuestra misión global.</p>

    <div class="dashboard__donaciones">
        <div class="dashboard__donaciones-posicion">
            <img class="dashboard__donaciones--imagen" src="" alt="">
        </div>

        <div class="dashboard__donaciones--contenido">

        </div>
    </div>

    <div>
        
    </div>
    
</main>


