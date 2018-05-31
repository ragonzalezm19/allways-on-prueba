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
      <label for="monto">Cantidad a Retirar</label>
      <input type="number" class="form-control" id="monto" name="monto" placeholder="Monto a retirar" min="1" max="<?= $saldo ?>">
    </div>
  
    <button type="submit" class="btn btn-primary">Retirar</button>
  </form>
  

  </div>


</div>