<?php
    require_once 'model/modelo.php';
    require_once 'config/config.php';
    /**
     * Controlador para interactuar con la lógica de negocio y la presentación.
     */
    class Controlador{

        private $Modelo;
        public $vista;

        function __construct(){
            $this->Modelo = new Modelo();
            $this->vista = VistaPorDefecto;
        }
        /**
         * Método que devuelve la tabla de categorías.
         *
         * @return array Un array bidimensional con las filas de la tabla categoría.
         */
        function tablaCategoria(){
            $tabla=$this->Modelo->tablaCategoria();
            return $tabla;
        }
        /**
         * Método que devuelve el nombre de una categoría.
         *
         * @param int $id El ID de la categoría.
         * @return string El nombre de la categoría.
         */
        function nombreCategoria($id){
            $fila=$this->Modelo->verCategoria($id);
            return $fila['nombre'];
        }
        /**
         * Método que devuelve el nombre del tablero de una categoría.
         *
         * @param int $idCategoria El ID de la categoría.
         * @return string El nombre del tablero de la categoría.
         */
        function nombreTablero($idCategoria){
            $fila=$this->Modelo->verTablero($idCategoria);
            return $fila['nombre'];
        }
        /**
         * Método que devuelve la imagen de fondo del tablero de una categoría.
         *
         * @param int $idCategoria El ID de la categoría.
         * @return string La ruta de la imagen de fondo del tablero.
         */
        function fondoTablero($idCategoria){
            $fila=$this->Modelo->verTablero($idCategoria);
            return $fila['imagenFondo'];
        }
        /**
         * Método que devuelve las filas de las preguntas de una categoría.
         *
         * @param int $idCategoria El ID de la categoría.
         * @return array Un array bidimensional con las filas de la tabla pregunta.
         */
        function tablaPregunta($idCategoria){
            $tabla = $this->Modelo->verPreguntas($idCategoria);
            return $tabla;
        }
        /**
         * Método que devuelve las filas de los objetos de una categoría.
         *
         * @param int $idCategoria El ID de la categoría.
         * @return array Un array bidimensional con las filas de la tabla objeto.
         */
        function tablaObjeto($idCategoria){
            $tabla = $this->Modelo->verObjetos($idCategoria);
            return $tabla;
        }

        function addCategoria(){
            $categoria=$_POST['categoria'];
            $tablero=$_POST['tablero'];
            
            $fondo = $_FILES['img']['tmp_name'];
            $tipo = $_FILES['img']['type'];

            $error=1;

            if($tipo=='image/png' || $tipo=='image/jpg' || $tipo=='image/jpeg'){
                $contenido = file_get_contents($fondo);
                $base64 = base64_encode($contenido);
                $error=0;
            }

            if($error==0){
                $error=$this->Modelo->insertarCategoria($categoria,$tablero,$base64);
                if($error!=0){
                    $this->vista = 'addCategoria';
                    $datos=array("error"=>$error);
                }
                $datos = array("tabla"=>$this->tablaCategoria(),"error"=>$error);
            }
            return $datos;
        }

        function modTablero(){
            $this->vista = 'tablero';
            $id=$_POST['idCategoria'];
            $nombre=$_POST['tablero'];

            $fondo = $_FILES['img']['tmp_name'];
            $tipo = $_FILES['img']['type'];

            $error=1;

            if($tipo=='image/png' || $tipo=='image/jpg' || $tipo=='image/jpeg'){
                $contenido = file_get_contents($fondo);
                $base64 = base64_encode($contenido);
                $error=0;
            }

            if($error==0){
                $error=$this->Modelo->modificarTablero($id,$nombre,$base64);
                if($error!=0){
                    $this->vista = 'modTablero';
                    $datos=array(
                        "id"=>$id,
                        "error"=>$error
                    );
                }
                $datos = array(
                    "id"=>$id,
                    "nombreCategoria"=>$this->nombreCategoria($id),
                    "nombreTablero"=>$this->nombreTablero($id),
                    "fondoTablero"=>$this->fondoTablero($id),
                    "tablaPregunta"=>$this->tablaPregunta($id),
                    "tablaObjeto"=>$this->tablaObjeto($id)
                );
            }
            return $datos;
        }

        public function remCategoria(){
            $id=$_POST['idCategoria'];
            $this->Modelo->borrarCategoria($id);
            $datos=array(
                "tablaCategoria"=>$this->tablaCategoria()
            );
            return $datos;
        }

        public function admin(){
            $datos=array(
                "tablaCategoria"=>$this->tablaCategoria()
            );
            return $datos;
        }

        public function anadirCategoria(){
            $this->vista = 'addCategoria';
            $datos=array(
                "error"=>0
            );
            return $datos;
        }

        public function tablero(){
            $this->vista = 'tablero';
            $id = $_GET['id'];
            $datos = array(
                "id"=>$id,
                "nombreCategoria"=>$this->nombreCategoria($id),
                "nombreTablero"=>$this->nombreTablero($id),
                "fondoTablero"=>$this->fondoTablero($id),
                "tablaPregunta"=>$this->tablaPregunta($id),
                "tablaObjeto"=>$this->tablaObjeto($id)
            );
            return $datos;
        }

        public function eliminarCategoria(){
            $this->vista = 'removeCategoria';
            $id = $_GET['id'];
            $datos=array(
                "id"=>$id,
                "nombreCategoria"=>$this->nombreCategoria($id)
            );
            return $datos;
        }

        public function modificarTablero(){
            $this->vista = 'modTablero';
            $id = $_GET['id'];
            $datos=array(
                "id"=>$id,
                "error"=>0
            );
            return $datos;
        }
    }