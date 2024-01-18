<!--Aarón Izquierdo Cordero y Oscar Arroyo Aguadero-->
        <title> Modificar Tablero</title>
    </head>
    <body>
        <header>
            Modificar Tablero
            <?php
                include 'template/navegacion.php';
            ?>
        </header>
        <main>
            <form action="index.php?controlador=Controlador&metodo=modTablero" method="post" enctype="multipart/form-data">
                <div>
                    <label for='tablero'>Nombre del tablero:</label>
                    <input type='text' id='tablero' name='tablero' required><br>
                    <?php
                        if($datos['error']=='2'){
                            echo "<p>El nombre del tablero no puede ser uno existente.</p>";
                        }
                            
                    ?>
                    <label for='img'>Fondo:</label>
                    <input type='file' id='img' name='img' required><br>
                    <?php
                        
                        if($datos['error']=='1'){
                            echo "<p>El archivo debe de ser una imagen de tipo PNG, JPG o JPEG.</p>";
                        }
                        elseif($datos['error']=='3'){
                            echo "<p>Ha habido un error inexperado al realizar la acción, pruebe en otro momento. Si el problema persiste, contacta a un administrador.</p>";
                        }
                    ?>
                    <input type="hidden" name="idCategoria" value=<?php echo $datos['id']; ?>>
                    <input type="hidden" name="tipo" value="mod">
                    <div id="botones">
                        <input type='submit' value='Añadir'>
                        <a href="index.php?id=<?php echo $datos['id'];?>&controlador=Controlador&metodo=tablero">Volver</a>
                    </div>
                </div>
            </form>
        </main>