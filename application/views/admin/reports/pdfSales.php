<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de VENTAS</title>
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 15px;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        img {
            height: auto;
            width: 20%;
            /* Ajusta el tamaño según sea necesario */
            float: left;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            /* Ajusta según sea necesario */
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: rgba(0, 128, 0, 0.3);
        }

        .none-border {
            border: none;
            background-color: #0000;
        }

        .bg-danger {
            color: red;
            font-weight: bold;
        }

        .bg-warning {
            font-weight: bold;
            color: orange;
        }

        .bg-success {
            font-weight: bold;
            color: green;
        }
    </style>
</head>

<body>
    <?php
    $nombreImagen = "assets/images/logo/logo2.png";
    $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
    ?>
    <div class="container">
        <div class="row">
            <img src="<?php echo $imagenBase64 ?>" alt="Logo">
            <h1>REPORTE DE VENTAS: DESDE <?= $d1 ?> Hasta <?= $d2 ?></h1>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>COMPROBANTE</th>
                        <th>CLIENTE</th>
                        <th>DOCUMENTO</th>
                        <th>SUBTOTAL</th>
                        <th>IGV</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row) {
                    ?>
                        <tr>
                            <td><?= $row->formatted_date ?></td>
                            <td><?= $row->serie_comprobante . " - " . $row->num_comprobante  ?></td>
                            <td><?= $row->nombreCliente?></td>
                            <td><?= $row->num_documentoCliente ?></td>
                            <td><?php echo "S/. " . $row->total_venta - $row->impuesto ?></td>
                            <td><?php echo "S/. " . $row->impuesto ?></td>
                            <td><?php echo "S/. " . $row->total_venta ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>