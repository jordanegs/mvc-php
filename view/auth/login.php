<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 mol-md-8">
            <div class="card p-5 shadow">
                <h1 class="text-center pb-3">Inicio de Sesión</h1>
                <form action="./?c=auth&a=acceso" method="post">
                    <div class="form-group">
                        <label>Correo: </label>
                        <input type="email" class="form-control" name="correo" placeholder="Ingrese el correo" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Contraseña: </label>
                        <input type="password" class="form-control" name="clave" placeholder="Ingrese la contraseña" required>
                    </div>
                    <div class="text-center">
                        <a href="./?c=auth&a=restablacer">¿Olvidaste Contraseña?</a>
                    </div>
                    <br />
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Acceder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>