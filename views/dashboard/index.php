<div class="dashboard__color">
    <div class="dashboard">
        <?php include_once 'header-dashboard.php'; ?>
    </div>
    
    <main class="dashboard__main">
        <div class="dashboard__etiquetas dashboard__etiquetas--disabled">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-quote-left"></i></p>
            <p class="dashboard__etiquetas--texto">"Los Cristianos hemos nacido para el combate"</p>
            <p class="dashboard__etiquetas--texto2">- Papa León XIII -</p>
        </div>
        
        <a class="dashboard__etiquetas" href="/quienes-somos">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-church"></i></p>
            <p class="dashboard__etiquetas--texto1">Restaurar la Cultura Católica</p>
        </a>
        
        <a class="dashboard__etiquetas" href="/quienes-somos">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-book-bible"></i></p>
            <p class="dashboard__etiquetas--texto1">Defender la Tradición Católica</p>
        </a>
        
        <a class="dashboard__etiquetas" href="/quienes-somos">
            <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-hands-praying"></i></p>
            <p class="dashboard__etiquetas--texto1">Confirmar la Fé Católica</p>
        </a>
    </main>

    <h2 class="dashboard__h2">Conoce Sobre Nosotros</h2>

    <div class="dashboard__nosotros">

        <div class="dashboard__imagen-nosotros"></div>

        <div class="dashboard__contenido-nosotros--disabled">
            <h3 class="dashboard__h3--nosotros">Revitalizando la Fé Católica desde una Perspectiva Completa</h3>
            <p class="dashboard__p--nosotros">promovemos la Fé católica desde una perspectiva integral, abordando Cultura, Economía y Religión. Buscamos transmitir la verdad profética y apostólica, promoviendo una vida coherente con el Cristianismo frente al Nuevo Orden Mundial y su falsa promoción en la China Comunista</p>

            <h3 class="dashboard__h3--nosotros-2">¿Cómo Ganar la Batalla Contracultural?</h3>
            <p class="dashboard__p--nosotros">“Estamos en guerra” Para ganar cualquier guerra y toda clase de guerra , las tres cosas más necesarias que debemos conocer son:</p>
            <ul class="listados">
                <li>que estamos en guerra</li>
                <li>quien es nuestro enemigo, y</li>
                <li>que armas o estrategias pueden derrotarlo</li>
            </ul>
            <p class="dashboard__p--nosotros">No podemos ganar una guerra en primer lugar, si dichosamente cosemos banderas de paz sobre el campo de batalla, o segundo, si estamos demasiado ocupados luchando guerras civiles en contra de nuestros aliados, o bien, en tercer lugar, si estamos usando las armas equivocadas . Bienvenido.</p>
        </div>        
    </div>

    <div class="dashboard__etiquetas dashboard__etiquetas--disabled">
        <p class="dashboard__etiquetas--simbolos"><i class="fa-solid fa-quote-left"></i></p>
        <p class="dashboard__etiquetas--texto">"La vida del hombre sobre la tierra es milicia"</p>
        <p class="dashboard__etiquetas--texto2">Job (Jb 7,1-4.6-7)</p>
    </div>

    <h2 class="dashboard__h2">Nuestros Cursos</h2>

    <h3 class="dashboard__h3">Fortaleciendo y Guiando tu Fe católica</h3>
    <p class="dashboard__p">Nutre tu fe y prepárate para cambios espirituales y sociales. Descubre cómo podemos guiarte en este viaje de transformación espiritual.</p>

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
                    <form class="table__carrito" action="/" method="POST">
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

    <div class="dashboard__cursos--enlace">
        <a class="admin__boton--cursos" href="/cursos">
            <i class="fa-solid fa-graduation-cap"></i>
            Ver todos los cursos
        </a>
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


</div>