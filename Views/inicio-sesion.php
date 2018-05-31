

<?php if(isset($error)): ?>

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong><?= $error['titulo'] ?></strong> <?= $error['mensaje'] ?>
</div>
<?php endif; ?>

<form method="post">
    <div class="form-group">
        <label for="recipient-name" class="control-label">RUT:</label>
        <input type="text" name="rut" class="form-control" id="recipient-name">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="control-label">Clave:</label>
        <input type="password" name="clave" class="form-control" id="recipient-name">
    </div>

    <input type="submit" value="Enviar" class="btn btn-primary">
</form>