<?php

require __DIR__ . '/vendor/autoload.php';


use Slim\Factory\AppFactory;
use Dompdf\Dompdf;
use Dompdf\Options;

$app = AppFactory::create();

$app->get('/reporte', function ($request, $response, $args) {
    $fallos = [
        ['id' => 1, 'fecha' => '2025-03-19', 'error' => 'Fallo de conexión a la base de datos', 'descripcion' => 'La aplicación no pudo conectar con la base de datos debido a un error de autenticación.'],
        ['id' => 2, 'fecha' => '2025-03-20', 'error' => 'Error 500 en la API', 'descripcion' => 'La API respondió con un error 500 al procesar la solicitud.'],
        ['id' => 3, 'fecha' => '2025-03-21', 'error' => 'Fallo en la carga de recursos estáticos', 'descripcion' => 'Algunos recursos estáticos (como imágenes y archivos JS) no se cargaron correctamente debido a una configuración incorrecta.']
    ];

    $html = '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Reporte de Fallos</title>
                <link rel="stylesheet" href="/public/css/style.css">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
            </head>
            <body>
                <h1>Reporte de Fallos en la Aplicación</h1>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Error</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>';

    foreach ($fallos as $fallo) {
        $html .= '<tr>';
        $html .= '<td>' . $fallo['id'] . '</td>';
        $html .= '<td>' . $fallo['fecha'] . '</td>';
        $html .= '<td>' . $fallo['error'] . '</td>';
        $html .= '<td>' . $fallo['descripcion'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>
</body>
</html>';

    $response->getBody()->write($html);
    return $response;
});


$app->get('/reporte/pdf', function ($request, $response, $args) {
    $fallos = [
        ['id' => 1, 'fecha' => '2025-03-19', 'error' => 'Fallo de conexión a la base de datos', 'descripcion' => 'La aplicación no pudo conectar con la base de datos debido a un error de autenticación.'],
        ['id' => 2, 'fecha' => '2025-03-20', 'error' => 'Error 500 en la API', 'descripcion' => 'La API respondió con un error 500 al procesar la solicitud.'],
        ['id' => 3, 'fecha' => '2025-03-21', 'error' => 'Fallo en la carga de recursos estáticos', 'descripcion' => 'Algunos recursos estáticos (como imágenes y archivos JS) no se cargaron correctamente debido a una configuración incorrecta.']
    ];

    $html = '<h1>Reporte de Fallos en la Aplicación</h1><table border="1" cellpadding="5" cellspacing="0">';
    $html .= '<thead><tr><th>ID</th><th>Fecha</th><th>Error</th><th>Descripción</th></tr></thead><tbody>';

    foreach ($fallos as $fallo) {
        $html .= '<tr>';
        $html .= '<td>' . $fallo['id'] . '</td>';
        $html .= '<td>' . $fallo['fecha'] . '</td>';
        $html .= '<td>' . $fallo['error'] . '</td>';
        $html .= '<td>' . $fallo['descripcion'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $response->getBody()->write($dompdf->output());

    return $response->withHeader('Content-Type', 'application/pdf')
                    ->withHeader('Content-Disposition', 'attachment; filename="reporte_fallos.pdf"');
});

$app->run();
