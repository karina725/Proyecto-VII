<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Placas</title>
    <style>
        /* Estilo general para el cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Estilo del contenedor principal */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Título del formulario */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Etiqueta del campo de entrada */
        label {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
            text-align: left;
        }

        /* Campo de entrada */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Botón de validación */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Ajuste para pantallas móviles */
        @media (max-width: 600px) {
            form {
                width: 90%;
            }

            h1 {
                font-size: 20px;
            }

            label {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <h1>Validar Acceso de Vehículo</h1>
    <form action="validar_placa.php" method="POST">
        <label for="placa">Ingrese la placa del vehículo:</label>
        <input type="text" id="placa" name="placa" required>
        <button type="submit">Validar</button>
    </form>
</body>
</html>
