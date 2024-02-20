<main class="dashboard__color">

    <?php

use Model\Curso;

 include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div class="dashboard__color">

        <div class="carrito__grid">
    
            <div class="carrito__productos">
                
                <h3 class="carrito__h3">Sus Cursos</h3>
    
                <?php
                    foreach($compras as $compra) {
                        $cursos[] = Curso::find($compra->curso_id);
                    }
                ?>
    
                <?php foreach($cursos as $curso) { ?>
    
                    <div class="carrito__tarjeta">
                        <picture>
                            <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.webp'?>" type="image/webp">
                            <source srcset="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" type="image/png">
                            <img class="carrito__imagen" src="<?php echo '/build/img/cursos/' . $curso->imagen . '.png'?>" alt="Imagen curso">
                        </picture>
    
                        <div class="carrito__descripcion">
                            <div class="carrito__descripcion--caracteristicas">
                                <p class="carrito__descripcion--nombre"><?php echo $curso->nombre ?></p>
                                <p class="carrito__descripcion--duracion"><?php echo $curso->duracion ?></p>
                                <p><?php echo $curso->ponente_id ?></p>
                            </div>
                            <div class="carrito__descripcion--precio">
                                <p>$ <?php echo $curso->precio ?></p>
                                
                                <form action="/carrito-eliminar" method="POST">
                                    <input type="hidden" name="curso_id" value="<?php echo $curso->id ?>">
                                    <button class="carrito__descripcion--eliminar" type="submit">
                                        Eliminar
                                    </button>        
                                </form> 
                            </div>
                        </div>
                        
                        
                    </div>
                <?php } ?>
    
                <?php if(!$compras) { ?>
                    <p class="carrito__descripcion--nombre carrito__descripcion--centrar">No hay Ningun Curso por el Momento</p>
                <?php } ?>
    
            </div>
    
            <div class="carrito__pago">
    
            </div>
    
        </div>        
        
    </div>

    
</main>


