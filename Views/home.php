<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-heading">Ultimas Transacciones</div>

            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo transaccion</th>
                        <th>Cuenta Origen</th>
                        <th>Cuenta Destino</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaciones as $transaccion): ?>
                        <tr>
                            <td><?= $transaccion['tipo_transacion'] ?></td>
                            <td><?= $transaccion['cuenta_origen'] ?></td>
                            <td><?= $transaccion['cuenta_destino'] ?></td>
                            <td><?= $transaccion['monto'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>