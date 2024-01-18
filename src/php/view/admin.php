<!--Aarón Izquierdo Cordero y Leandro José Paniagua Balbuena-->
        <title>Administración</title>
    </head>
    <body>
        <header>
            Administración
            <?php
                include 'template/navegacion.php';
            ?>
        </header>
		<main>
            <form>
                <div id="contenido">
                        <!--Contenido de la tabla-->
                    <table>
                        <tr id="azul">
                            <td>Nombre</td>
                            <td>Ver</td>
                            <td>Borrar</td>
                        </tr>
                        <?php
                            foreach($datos['tablaCategoria'] as $fila){
                                ?>
                                    <tr>
                                        <td id=azul><?php echo $fila['nombre']; ?> </td>
                                        <td><a href='index.php?id=<?php echo $fila['idCategoria']; ?>&controlador=Controlador&metodo=tablero' class=sinEstilo><img src=../img/IonEye.svg class=icono></a></td>
                                        <td><a href='index.php?id=<?php echo $fila['idCategoria']; ?>&controlador=Controlador&metodo=eliminarCategoria' class=sinEstilo><img src=../img/IonIosRemoveCircle.svg class=icono></a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </table>
                    <a href="index.php?controlador=Controlador&metodo=anadirCategoria" class="submit">Añadir Categoría</a>
                </div>
            </form>
		</main>