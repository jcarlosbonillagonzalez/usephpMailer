<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio correo PHPMailer</title>
</head>

<body>
    <form action="email.php" method="post">
        <label for="asunto">
            Asunto: <input type="text" name="asunto" id="">
        </label>
        <label for="email">
            Email: <input type="email" name="email" id="email">
        </label>
        <label for="descripcion">
            Descripcion: <input type="text" name="descripcion" id="descripcion">
        </label>
        <button type="submit">Enviar E-Mail</button>
    </form>

</body>

</html>