<!--Aarón Izquierdo Cordero y Oscar Arroyo Aguadero-->
        <title>Eliminar Categoría</title>
    </head>
    <body>
        <header>
            Eliminar Categoría
            <?php
                include 'template/navegacion.php';
            ?>
        </header>
        <main>
            <form action="index.php?controlador=Controlador&metodo=remCategoria" method="post">
                <div>
                    <p class="tamFuenteGrande">¿Desea eliminar la categoría 
                        <?php
                            echo $datos['id'];
                        ?>
                    </p>
                    <input type="hidden" name="idCategoria" value=<?php echo $datos['id']; ?>>
                    <div id="botones">
                        <input type='submit' value='Eliminar'>
                        <a href="index.php?metodo=admin">Volver</a>
                    </div>
                </div>
            </form>
        </main>