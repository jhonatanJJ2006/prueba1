<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?> 
    <?php include_once __DIR__ . '/../AppPlayer/index.php'; ?> 

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    <h3 class="dashboard__h3">Conectando Corazones, Inspirando Almas.</h3>
    <p class="dashboard__p--medios">Descubre la verdadera Doctrina, Magisterio y Tradición de la Iglesia Católica, en cada video que elaboramos. Súmate a nuestra comunidad y ayúdanos a salvar alm</p>
    
    <div class="dashboard__cursos">
   
        <?php foreach($medios as $medio) { ?>
            <tr class="table__tr">
                <td class="table__td">
                    <div class="formulario-admin__video--tamaño">
                        <?php if(strlen(trim($medio->url)) === 32) { ?>
                            <video class="formulario-admin__video--block" src="<?php echo '/build/videos/' . trim($medio->url) . '.mp4'?>" controls></video>
                        <?php } else { ?>
                            <iframe class="formulario-admin__video--block" src="https://www.youtube.com/embed/<?php echo trim($medio->url) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        
    </div>

    <h2 class="dashboard__h2">Entradas Recientes</h2>
    <h3 class="dashboard__h3">Artículos de Interés</h3>

    <div class="dashboard__cursos dashboard__cursos--transparente">

        <?php foreach($articulos as $articulo) { ?>

            <div class="tarjeta">
                <div class="tarjeta__face tarjeta__front">
                    <picture>
                        <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" type="image/png">
                        <img class="tarjeta__face" src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen articulo">
                    </picture>
                    <div class="tarjeta__contenido tarjeta__centrar">
                        <h3 class="tarjeta__nombre"><?php echo $articulo->nombre ?></h3>
                        <p class="tarjeta__texto"><?php echo $articulo->fecha ?></p>
                    </div>
                </div>

                <div class="tarjeta__face tarjeta__back dashboard__tarjeta-bg">
                    <div class="tarjeta__face tarjeta__contenido tarjeta__bg tarjeta__contenido tarjeta__centrar"></div>
                    <p class="tarjeta__descripcion"><?php if(strlen($articulo->descripcion) < 1000) {
                        echo $articulo->descripcion;
                    } else {
                        echo substr($articulo->descripcion, 0, 1000) . "...";
                    } ?></p>
                    <div class="table__carrito">
                        <input type="hidden" name="id" value="<?php echo $articulo->id ?>">
                        <a class="admin__boton--contacto" href="/medios-articulo?id=<?php echo $articulo->id ?>">
                            <i class="fa-solid fa-square-plus"></i>
                            Más Información
                        </a>
                </div>  
                </div>
            </div>

        <?php } ?> 

    </div>

</main>