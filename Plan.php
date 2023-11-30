<!DOCTYPE html>
<html>
<head>
    <title>Página de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
 
        label {
            font-size: 16px; 
        }
        p {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        button {
            background-color: #BF536C;
            border: none;
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button:hover {
            background-color: #BF536C;
        }
         /* Nuevos estilos para la imagen y el botón */
         .paypal-img {
            width: 50px; /* Ancho de la imagen */
            height: auto; /* Altura automática para mantener la proporción */
            margin-right: 10px; /* Espacio a la derecha de la imagen */
            float: left; /* Alinea la imagen a la izquierda */
        }

        button {
            /* Otros estilos... */
            display: inline-block; /* Hacer que el botón sea un bloque en línea */
            vertical-align: middle; /* Alinear verticalmente con la imagen */
            max-width: calc(100% - 100px); /* Ajustar el ancho máximo del botón */
        }

        


    </style>
    </style>
</head>
<body>
    <form id="paymentForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 style="color: #333; margin-bottom: 20px; font-size: 1.5em;">Plan de Pagos</h1>
        <label for="email">Correo electrónico:</label>
        
        <input type="email" id="email" name="email" required style="width: 60%; padding: 5px; box-sizing: border-box;">

        <input type="checkbox" id="news" name="news">
        <label for="news">Enviar novedades y ofertas por correo electrónico</label>

        <h1 style="color: #333; margin-bottom: 20px; font-size: 1.5em;">Entrega</h1>
        <label for="country">País / Región:</label>
        <select id="country" name="country" required style="width: 50%; padding: 10px; box-sizing: border-box;">
    <option value="" disabled selected>Selecciona un país</option>
    <option value="Argentina">Argentina</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Brasil">Brasil</option>
    <option value="Chile">Chile</option>
    <option value="Colombia">Colombia</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cuba">Cuba</option>
    <option value="Ecuador">Ecuador</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Honduras">Honduras</option>
    <option value="México">México</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Panamá">Panamá</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Perú">Perú</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Estados Unidos">Estados Unidos</option>
    <option value="Canadá">Canadá</option>
    <option value="España">España</option>
    <option value="Portugal">Portugal</option>
    <option value="Francia">Francia</option>
    <option value="Alemania">Alemania</option>
    <option value="Italia">Italia</option>
    <option value="Reino Unido">Reino Unido</option>
    <option value="Irlanda">Irlanda</option>
    <option value="Australia">Australia</option>
    <option value="Nueva Zelanda">Nueva Zelanda</option>
    <option value="Japón">Japón</option>
    <option value="Corea del Sur">Corea del Sur</option>
    <option value="China">China</option>
    <option value="India">India</option>
    <option value="Rusia">Rusia</option>
    <option value="Sudáfrica">Sudáfrica</option>
    <option value="Egipto">Egipto</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Kenia">Kenia</option>
    <option value="Argentina">Argentina</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Vietnam">Vietnam</option>
    <option value="Filipinas">Filipinas</option>
  
</select>

        <label for="name">Nombre Apellidos:</label>
        <input type="text" id="name" name="name" required style="width: 60%; padding: 10px; box-sizing: border-box;">
        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" required style="width: 80%; padding: 10px; box-sizing: border-box;">
        <label for="city">Ciudad:</label>
        <input type="text" id="city" name="city" required style="width: 100%; padding: 10px; box-sizing: border-box;">
        <label for="state">Estado:</label>
        <input type="text" id="state" name="state" required style="width: 100%; padding: 10px; box-sizing: border-box;">
        <label for="postal">Código postal:</label>
        <input type="text" id="postal" name="postal" required style="width: 100%; padding: 10px; box-sizing: border-box;">
        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" required style="width: 100%; padding: 10px; box-sizing: border-box;">
        <input type="checkbox" id="saveInfo" name="saveInfo">
        <label for="saveInfo">Guardar mi información y consultar más rápidamente la próxima vez</label>

        <h1>Métodos de envío</h1>
        <p>Ingresa tu dirección de envío para ver los métodos disponibles</p>

        <h1>Pago</h1>
        <p>Todas las transacciones son seguras y están encriptadas.</p>
        <input type="radio" id="paypal" name="paymentMethod" value="paypal" required>
        <label for="paypal">PayPal</label>
        <input type="radio" id="creditCard" name="paymentMethod" value="creditCard">
        <label for="creditCard">Tarjeta de Crédito contra entrega - Solo en LaPaz</label>
        <input type="radio" id="cash" name="paymentMethod" value="cash">
        <label for="cash">Efectivo - SOLO en LaPaz</label>

        <button type="submit" formaction="https://www.paypal.com/bo/welcome/signup/#/login_info">
        <img class="paypal-img" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png" alt="PayPal Logo"> Pagar
    </button>
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        } else {
            $email = "No proporcionado";
        }
        $news = isset($_POST['news']) ? 'Sí' : 'No';
        
       
        echo "<div style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);'>";
        echo "<h2>Datos recibidos:</h2>";
        echo "<p>Correo electrónico: $email</p>";
        echo "<p>Enviar novedades y ofertas: $news</p>";
        echo "</div>";
    
    }
    ?>

    <script>
      document.getElementById('paymentForm').addEventListener('submit', function(event) {
          event.preventDefault();
          var email = document.getElementById('email').value;
          if (!email.includes('@')) {
              alert('Por favor, introduce un correo electrónico válido.');
          } else {
              alert('Gracias por tu compra!');
              window.location.href = 'https://www.paypal.com/bo/home'; 
          }
      });
  </script>
</body>
</html>
