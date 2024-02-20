<?php

namespace Controllers;

use Classes\EmailContacto;
use MVC\Router;
use Model\Curso;
use Model\Medio;
use Model\Compra;
use Model\Ponente;
use Model\Usuario;
use Model\Articulo;
use Classes\Paginacion;

class DashboardController {
    public static function index(Router $router) {
        session_start();

        $id = $_SESSION['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $usuario = Usuario::find($id);
        $compras = Compra::where('usuario_id', $usuario->id);
        $cursos = Curso::get(6);

        $router->render('/dashboard/index', [
            'usuario' => $usuario,
            'cursos' => $cursos,
            'compras' => $compras
        ]);
    }

    public static function cursos(Router $router) {
        
        session_start();

        $id = $_SESSION['id'];

        $cursos = Curso::all();
        $usuario = Usuario::find($id);
        $compras = Compra::where('usuario_id', $usuario->id);

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        $registros_por_pagina = 3;
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /cursos?page=1');
        }
        
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(is_auth()) { 

                $compra = new Compra;

                $_POST['usuario_id'] = $_SESSION['id'];

                $compra->sincronizar($_POST);

                $resultado = $compra->guardar();

                if($resultado) {
                    header('Location: /cursos');
                }

            } else {
                header('Location: /auth/login?alerta=carrito');
            }
        }


        $router->render('/dashboard/cursos/index', [
            'titulo' => 'Nuestros Cursos',
            'cursos' => $cursos,
            'ponentes' => $ponentes,
            'alertas' => $alertas,
            'compras' => $compras,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function carrito(Router $router) { 

        session_start();

        $id = $_SESSION['id'];

        $usuario = Usuario::find($id);
        $compras = Compra::where('usuario_id', $usuario->id);

        $router->render('/dashboard/carrito/index', [
            'titulo' => 'Carrito de Compras',
            'compras' => $compras,
            'usuario' => $usuario
        ]);
    }

    public static function carrito_eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['curso_id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if(!$id) {
                header('Location: /carrito');
            }
            
            $compra = Compra::where('curso_id', $id);

            $compra = reset($compra);

            $resultado = $compra->eliminar();

            if($resultado) {
                header('Location: /carrito');
            }

        }

    }

    public static function quienes_somos(Router $router) {
        session_start();
        $id = $_SESSION['id'];

        $usuario = Usuario::find($id);
        $compras = Compra::where('usuario_id', $usuario->id);

        $router->render('/dashboard/quienes-somos/index', [
            'titulo' => 'Quienes somos - Milicia de la Inmaculada',
            'compras' => $compras
        ]);
    }

    public static function medios(Router $router) {

        session_start();

        $id = $_SESSION['id'];

        $medios = Medio::all();
        $articulos = Articulo::all();     
        $usuario = Usuario::find($id);
        $compras = Compra::where('usuario_id', $usuario->id);  

        $router->render('/dashboard/medios/index', [
            'titulo' => 'Medios San Miguel',
            'medios' => $medios,
            'articulos' => $articulos, 
            'compras' => $compras
        ]);
    }

    public static function medios_articulo(Router $router) {

        session_start();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);            

        if(!$id) {
            header('Location: /medios');
        }
        
        $articulo_id = Articulo::find($id);
        
        if(!$articulo_id) {
            header('Location: /medios');
        }

        $articulos = Articulo::diferent($id);

        $id_session = $_SESSION['id'];
        $usuario = Usuario::find($id_session);
        $compras = Compra::where('usuario_id', $usuario->id);

        $router->render('/dashboard/medios/articulo', [
            'titulo' => 'Medios San Miguel',
            'articulo_id' => $articulo_id,
            'articulos' => $articulos,
            'compras' => $compras
        ]);
    }

    public static function ponente(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /cursos');
        }

        $ponente = Ponente::find($id);

        $tags = explode(",", $ponente->tags);
        $redes = json_decode($ponente->redes);

        $router->render('dashboard/ponente/index', [
            'titulo' => 'Información Ponente',
            'ponente' => $ponente,
            'tags' => $tags,
            'redes' => $redes
        ]);
    }

    public static function contacto(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Enviar email
            $email = new EmailContacto($_POST['email'], $_POST['nombre'], $_POST['mensaje']);
            $resultado = $email->enviar();

            if($resultado) {
                
            }
        }

        $router->render('dashboard/contacto/index', [
            'titulo' => 'Contacto'
        ]);
    }
}