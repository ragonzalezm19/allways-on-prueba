<?php if(isset($datos_transaccion)): ?>
    <div class="row">
      <?php if($datos_transaccion['status']): ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?= $datos_transaccion['titulo'] ?></strong> <?= $datos_transaccion['mensaje'] ?>
      </div>
      <?php else: ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?= $datos_transaccion['titulo'] ?></strong> <?= $datos_transaccion['mensaje'] ?>
      </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

<div class="row">
  <div class="col-md-6">
    <h1> Su saldo es de: $ <?= number_format($saldo, 2, ',', '.') ?></h1>
  </div>

  <div class="col-md-6">
  
  
  <form method="POST" role="form">

    <div class="form-group">
      <label for="monto">Monto a Transferir</label>
      <input type="number" class="form-control" name="monto" id="monto" placeholder="Monto a transferir" min="1" max="<?= $saldo ?>" required="required">
    </div>
  
    <div class="form-group">

      <label for="cuenta">Cuenta a Trnasferir</label>
      
      <select name="cuenta" id="cuenta" class="form-control" required="required">
        <?php foreach($cuentas as $cuenta): ?>
        <option value="<?= $cuenta['id'] ?>"> <?= "$cuenta[cuenta] - $cuenta[nombre] $cuenta[apellido]" ?></option>
        <?php endforeach; ?>
      </select>
      
    </div>
  
    <button type="submit" class="btn btn-primary">Transferir</button>
  </form>
  
  </div>

</div>