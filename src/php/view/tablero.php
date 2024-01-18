<!-- Aarón Izquierdo Cordero y Oscar Arroyo Aguadero -->
		<title>
            <?php
                echo $datos['nombreCategoria'];
            ?>
        </title>
    </head>
    <body>
        <!--Cabecera de la página-->
		<header>
            <?php
                echo $datos['nombreCategoria'];
                include 'template/navegacion.php';
            ?>
        </header>
        <main>
            <form method='post'>
                <div id="contenido">
                <?php
                /* Nombre e imagen del Tablero */
                    echo '<p class="tamFuenteGrande">'.$datos['nombreTablero'].'</p>';
                    echo '<div id="imagenTabla">
                        <img src="data:image/jpeg;base64,'.$datos['fondoTablero'].'" alt="Fondo del tablero">
                    </div>';
                ?>
                    <a class="submit" href="index.php?controlador=Controlador&metodo=modificarTablero&id=<?php echo $datos['id']; ?>">Modificar</a>
                <!--Contenido de la tabla-->

                <table>
                    <tr>
                        <td colspan="6">Preguntas</td>
                    </tr>
                    <tr id="azul">
                        <td>Texto</td>
                        <td>Reflexión +</td>
                        <td>Reflexión -</td>
                        <td>Puntuación</td>
                    </tr>
                    <?php
                    /* Se cambió a utilizar la varible $datos en vez de un método */
                        foreach($datos['tablaPregunta'] as $fila){
                            echo '<tr>
                                <td>'.$fila['texto'].'</td>
                                <td>'.$fila['reflexionAcierto'].'</td>
                                <td>'.$fila['reflexionFallo'].'</td>
                                <td>'.$fila['puntuacion'].'</td>
                            </tr>';
                        }
                    ?>
                </table>
                <table>
                    <tr>
                        <td colspan="5">Objetos</td>
                    </tr>
                    <tr id="azul">
                        <td>Nombre</td>
                        <td>Imagen</td>
                        <td>Puntuación</td>
                    </tr>
                    <?php
                    /* Se cambió a utilizar la varible $datos en vez de un método */
                        foreach($datos['tablaObjeto'] as $fila){
                            $punt = (int)$fila['puntuacion'];

                            if(!$fila['valoracion']){
                                $punt=0-$punt;
                            }

                            echo '<tr>
                                <td>'.$fila['nombre'].'</td>
                                <td><img src="data:image/jpeg;base64,'.$fila['imagen'].'" alt="'.$fila['descripcion'].'"></td>
                                <td>'.$punt.'</td>
                            </tr>';
                        }
                    ?>
                </table>
                <a href="index.php?metodo=admin">Volver</a>
            </div>
            </form>
        </main>