<main class="dashboard__color">

<?php include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>
    
    <div class="dashboard__nosotros">

        <div class="auth__3d">
            <model-viewer
                class="dashboard__3d--tamaño"
                id="modelViewer"
                src= "/build/img/modelos_3d/prueba.glb"  
                camera-controls
                camera-orbit="40deg 80deg 35m"
                auto-rotate
                ar
                shadow-intensity="2"
            ></model-viewer>
        </div>
        
        <div class="dashboard__contenido-nosotros">
            
            <div class="card__img-body--cursos">
                <picture>
                    <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.webp'?>" type="image/webp">
                    <source srcset="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" type="image/png">
                    <img class="card__img" src="<?php echo '/build/img/speakers/' . $ponente->imagen . '.png'?>" alt="Imagen ponen$ponente">
                </picture>
            </div>

            <div class="dashboard__contenido-ponente">
                <h2 class="dashboard__ponente-nombre"><?php echo $ponente->nombre . " " . $ponente->apellido ?? '' ?></h2>
                <p class="dashboard__ponente-desc"><?php echo $ponente->descripcion ?></p>
            </div>

            <h3 class="dashboard__h3--ponente">Habilidades</h3>

            <ul class="listados">
                <?php foreach($tags as $tag) { ?>

                    <li><i class="fa-solid fa-check"></i><p><?php echo $tag ?></p></li>
                    
                <?php } ?>
            </ul>

            <?php if($redes) { ?>

                <h3 class="dashboard__h3--ponente">Redes</h3>
    
                <a class="redes <?php echo (!$redes->facebook) ? 'redes__display' : '' ?>" href="<?php echo $redes->facebook ?? '#' ?>">
            
                    <div class="formulario-admin__contenedor-icono">
                        <div class="redes__icono">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
    
                        <div class="redes__enlace">Facebook</div>
                    </div>
    
                </a>
    
                <a class="redes <?php echo (!$redes->twitter) ? 'redes__display' : '' ?>" href="<?php echo $redes->twitter ?? '#' ?>">
            
                    <div class="formulario-admin__contenedor-icono">
                        <div class="redes__icono">
                            <i class="fa-brands fa-twitter"></i>
                        </div>
    
                        <div class="redes__enlace">Twitter</div>
                    </div>
    
                </a>
    
                <a class="redes <?php echo (!$redes->youtube) ? 'redes__display' : '' ?>" href="<?php echo $redes->youtube ?? '#' ?>">
            
                    <div class="formulario-admin__contenedor-icono">
                        <div class="redes__icono">
                            <i class="fa-brands fa-youtube"></i>
                        </div>
    
                        <div class="redes__enlace">Youtube</div>
                    </div>  
                    
                </a>
    
                <a class="redes <?php echo (!$redes->instagram) ? 'redes__display' : '' ?>" href="<?php echo $redes->instagram ?? '#' ?>">
            
                    <div class="formulario-admin__contenedor-icono">
                        <div class="redes__icono">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
    
                        <div class="redes__enlace">Instagram</div>
                    </div>
                    
                </a>
    
                <a class="redes <?php echo (!$redes->tiktok) ? 'redes__display' : '' ?>" href="<?php echo $redes->tiktok ?? '#' ?>">
            
                    <div class="formulario-admin__contenedor-icono">
                        <div class="redes__icono">
                            <i class="fa-brands fa-tiktok"></i>
                        </div>
    
                        <div class="redes__enlace">Tiktok</div>
                    </div>
    
                </a>

            <?php } ?>

            
        </div>        
    </div>

    
</main>

