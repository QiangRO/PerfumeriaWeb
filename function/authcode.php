<?php
    include("dbconnect.php");

    if(isset ($_POST["register_btn"])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        
        //Validar que no exista email repetidos
        $check_email_query = "SELECT email FROM clientes WHERE correo = '$email'";
        $check_email_query_run = mysqli_query($con, $check_email_query);
        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $_SESSION['message'] = "El correo electronico ya fue registrado";
            header('Location: ../register.php');
        }
        else
        {
            //Validar que la contraseña se repita correctamente
        if($password == $cpassword)
        {
            $insert_query = "INSERT INTO clientes(nombre, correo, telefono, direccion, password) VALUES('$name', '$email', '$phone', '$address', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                $_SESSION['message'] = "El registro fue exitoso";
                header('Location: ../login.php');
            }else
            {
                $_SESSION['message'] = "Algo salio mal";
                header('Location: ../register.php');
            }
        }
        else
        {
            $_SESSION['message'] = "Las contraseñas no coinciden";
            header('Location: ../register.php');
        }
        }
    }
