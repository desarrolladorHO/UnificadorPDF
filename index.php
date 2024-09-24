<?php
require_once 'vendor/autoload.php'; // Cargar las dependencias de Composer

use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdfs'])) {
    $pdf = new Fpdi();
    $uploads_dir = 'uploads/';
    $file_name = isset($_POST['file_name']) && !empty($_POST['file_name']) ? $_POST['file_name'] : 'pdf_combined_' . time();
    
    // Asegurarse de que el nombre del archivo no contenga caracteres no permitidos
    $file_name = preg_replace('/[^A-Za-z0-9_-]/', '', $file_name);
    $output_file = $file_name . '.pdf';

    // Verificar si se subieron archivos
    if (!empty($_FILES['pdfs']['tmp_name'][0])) {
        // Procesar cada archivo PDF subido
        foreach ($_FILES['pdfs']['tmp_name'] as $file) {
            if (is_uploaded_file($file)) {
                // Añadir cada página del PDF al nuevo documento
                $page_count = $pdf->setSourceFile($file);
                for ($i = 1; $i <= $page_count; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);

                    // Crear nueva página con el tamaño de la original
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            }
        }

        // Guardar el PDF combinado en el servidor con el nombre elegido por el usuario
        $pdf->Output($uploads_dir . $output_file, 'F');

        // Enviar el archivo PDF al navegador para su descarga
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="' . $output_file . '"');
        readfile($uploads_dir . $output_file);
        
        header("location: index.php");
        exit;
        
    } else {
        echo "No se han subido archivos PDF.";
    }
}
?><!DOCTYPE html>
<html lang="en">

<head>
    
    <!--font awesome con CDN-->
    <script src="https://kit.fontawesome.com/bae058ac53.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Custom File Upload Button</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <img src="img/logo_ho_fondo_o.png" width="40%" alt="">
    <div class="main-container" style="margin-top:-50px">

        <!-- Columna izquierda para la imagen -->
        <div class="image-container">
            <img src="img/RHIO_2_0.jpeg" alt="RHIO">
        </div>

        <!-- Columna derecha para el formulario -->
        <div class="form-container">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <p class="" style="font-size:25px; font-weight:800 ;font-family: 'Calligraffitti', cursive; font-family: 'Croissant One', cursive; color:#2B455C" >Unificador de PDF's || Hernán Ocazionez<p>
                </div>
                <br>
                <br>
                <div class="container">
                    <input type="file" name="pdfs[]" id="file-input" accept="application/pdf" multiple required />
                    <label for="file-input" class="file-input">
                        <i class="fa-solid fa-upload"></i> 
                        Subir PDF a unificar
                    </label>
                    <div id="num-of-files">Aún no se han seleccionado archivos.</div>
                    <ul id="files-list"></ul>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="button1" type="submit">
                                    <label for="file-input-1" class="file-input-1">
                                        <i class="fa-solid fa-check"></i> Unificar archivos
                                    </label>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a class="button2" href="index.php">
                                    <label for="file-input-1" class="file-input-1">
                                        <i class="fa-solid fa-broom"></i> Limpiar selección
                                    </label>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Script -->
    <script src="script.js"></script>
     
</body>

</html>