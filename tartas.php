<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=5493364019118&text=Bienvenido a MaraCake, haceme tu consulta." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>

    <?php
        include_once('layout/menu.php');
    ?>

    <main>
        <?php
            $response = json_decode(file_get_contents('http://localhost/ProyectosK/Shop/api/productos/api-productos.php?categoria=tarta'), true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    include('layout/items.php');
                }
             }else{
                echo $response['response'];
            }
        ?>
        
    </main>

    <script src="js/main.js"></script>
</body>
</html>