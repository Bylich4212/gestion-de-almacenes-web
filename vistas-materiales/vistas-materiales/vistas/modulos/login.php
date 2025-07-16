<div class="login-desing">
  <div class="login-box" style="margin-top: -60px;">

  <div class="login-logo">
    <a href="../../index2.html"><b class="text-black-50">Control</b>Materiales</a>
  </div>  

  <div class="card">

    <div class="card-body login-card-body">

      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">

        <div class="input-group mb-3">

          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-user"></span>

            </div>

          </div>

        </div>

        <div class="input-group mb-3">

          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock"></span>

            </div>

          </div>

        </div>

        <div class="row">

          <div class="col-12">

            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

          </div>

        </div>

        <?php

          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();

        ?>

      </form>

      <div class="social-auth-links text-center mb-3">
      </div>
    </div>
  </div>
</div>
</div>

