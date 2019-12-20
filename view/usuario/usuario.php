<div class="container">
    <h1 class="text-center pt-4 text-primary">Usuarios Registrados</h1>

    <div class="table-responsive pt-3">
        <table class="table table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($usuarios as $index => $usuario) {
                echo "<tr class='text-center'>";
                echo "<th scope='row'>". ($index+1) ."</th>";
                echo "<td>$usuario->nombre</td>";
                echo "<td>$usuario->apellido</td>";
                echo "<td>$usuario->correo</td>";
                echo "<td>********</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>