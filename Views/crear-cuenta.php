<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Incio Sesion</title>
</head>
<body>
    <div class="container">
        <?php if(isset($error)): ?>

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><?= $error['titulo'] ?></strong> <?= $error['mensaje'] ?>
        </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label class="control-label">RUT:</label>
                <input type="text" name="rut" class="form-control" id="recipient-name" required="required">
            </div>
            <div class="form-group">
                <label class="control-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="recipient-name" required="required">
            </div>
            <div class="form-group">
                <label class="control-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" id="recipient-name" required="required">
            </div>
            <div class="form-group">
                <label class="control-label">Tipo Cuenta:</label>
                
                <select name="tipo_cuenta"  class="form-control" required="required">
                    <?php foreach($tipos_cuentas as $tipo_cuenta): ?>
                    <option value="<?= $tipo_cuenta['id'] ?>"><?= $tipo_cuenta['tipo'] ?></option>
                    <?php endforeach; ?>
                </select>
                
            </div>

            <div class="form-group">
                <label class="control-label">Clave:</label>
                <input type="password" name="clave" class="form-control" id="recipient-name" required="required">
            </div>

            <input type="submit" value="Crear Cuenta" class="btn btn-primary">
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>