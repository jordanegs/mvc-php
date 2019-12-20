<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 mol-md-8">
            <div class="card p-5 shadow">
                <h1 class="text-center pb-3">Cambiar Contraseña</h1>
                <form name="reset" action="./?c=auth&a=actualizarcontra" method="post">
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                    <input type="hidden" name="correo" value="<?php echo $correo ?>">
                    <div class="form-group">
                        <label>Nueva contraseña: </label>
                        <input type="password" class="form-control" name="clave" placeholder="Ingrese la contraseña" required>
                    </div>
                    <div class="form-group">
                        <label>Repita Nueva contraseña: </label>
                        <input type="password" class="form-control" name="clave2" placeholder="Ingrese nuevamente la contraseña" required>
                    </div>
                    <br />
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    with(document.reset){
        onsubmit = function(e){
            e.preventDefault();
            ok = true;
            if(ok && clave.value != clave2.value){
                ok=false;
                alert("Las contraseñas no coinciden");
                clave2.focus();
            }
            if(ok){ submit(); }
        }
    }
</script>