<main class="dashboard__color">

    <?php include_once __DIR__ . '/../header-paginas.php'; ?> 

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    <h3 class="dashboard__h3">Conectando Corazones, Inspirando Almas.</h3>
    <p class="dashboard__p--nosotros">Descubre la verdadera Doctrina, Magisterio y Tradición de la Iglesia Católica, en cada video que elaboramos. Súmate a nuestra comunidad y ayúdanos a salvar alm</p>

    <div class="articulo__grid">
        <div class="articulo__contenido">
            <h2 class="articulo__h2"><?php echo $articulo_id->nombre ?></h2>

            <picture>
                <source srcset="<?php echo '/build/img/articulos/'. $articulo_id->imagen .'.webp'?>" type="image/webp">
                <source srcset="<?php echo '/build/img/articulos/'. $articulo_id->imagen .'.png'?>" type="image/png">
                <img src="<?php echo '/build/img/articulos/' . $articulo_id->imagen . '.png'?>" alt="Imagen recurso">
            </picture>

            <p class="articulo__texto"><?php echo $articulo_id->descripcion ?></p>
                
        </div>

        <div class="articulo__articulos">

            <h3 class="articulo__h3">Más Articulos de Interes</h3>

            <?php foreach($articulos as $articulo) { ?>

                <a class="articulo__tarjeta" href="/medios-articulo?id=<?php echo $articulo->id ?>">
                    <picture>
                        <source srcset="<?php echo '/build/img/articulos/'. $articulo->imagen .'.webp'?>" type="image/webp">
                        <source srcset="<?php echo '/build/img/articulos/'. $articulo->imagen .'.png'?>" type="image/png">
                        <img class="articulo__tarjeta--imagen" src="<?php echo '/build/img/articulos/' . $articulo->imagen . '.png'?>" alt="Imagen recurso">
                    </picture>

                    <div class="articulo__tarjeta--contenido">
                        <h3 class="articulo__nombre"><?php echo $articulo->nombre ?></h3>
                        <p class="articulo__fecha"><?php echo $articulo->fecha ?></p>
                    </div>
                </a>

            <?php } ?>

        </div>
    </div>
    
</main>