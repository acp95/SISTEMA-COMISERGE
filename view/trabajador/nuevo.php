﻿<?php
	 session_start();
	
	if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
    header('location: ../login.php');
  }
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Trabajadores</title>

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">
    <link href="..\..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="..\..\assets\plugins\pace\pace.min.css" rel="stylesheet">
    <script src="..\..\assets\plugins\pace\pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">
    <style type="text/css">
        .error { 
 color: #ff0000;
 font-weight: normal;
}
.form-validate input{
  margin-top: 10px;
}
    </style>
   

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="pages-admin.php" class="navbar-brand">
                         <img src="..\..\assets\images\logo.png" alt="Ranger Logo" class="brand-icon">
                       
                        <div class="brand-title">
                            <span class="brand-text" style="font-size: 11px;">Comiserge S.R.Ltda.</span>
                        </div>
                    </a>
                </div>
                
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <i class="demo-pli-male"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                   
                                    <li>
                                        <a href="../logout.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Trabajadores</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="../admin/pages-admin.php"><i class="demo-pli-home"></i></a></li>
					<li><a href="mostrar.php">Trabajador</a></li>
					<li class="active">Nuevo</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<!--STATIC EXAMPLE-->
					<!--===================================================-->
					<div class="panel panel-trans">
					    <div class="panel-body demo-nifty-modal">
					        <!--Static Examplel-->
					        <div class="modal">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <div class="modal-header">
					                        
					                        <h4 class="modal-title">Nuevo Trabajador</h4>
					                    </div>
										<form method="POST"  autocomplete="off" name="register-form" enctype="multipart/form-data">
											<div class="panel-body">
												<div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">DNI</label>
                                                            <input type="text"  maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="dni"  class="form-control">
                                                        </div>
                                                    </div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Nombre</label>
															<input type="text" name="nombre"  class="form-control">
														</div>
													</div>
													
													
												</div>
												<div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Apellido</label>
                                                            <input type="text" name="apellido"  class="form-control">
                                                        </div>
                                                    </div>

													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Correo</label>
															<input type="email" name="correo"  class="form-control">
														</div>
													</div>
												</div>
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Telefono</label>
                                                            <input type="text" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="telefono"  class="form-control">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
											</div>
											<div class="panel-footer text-right">
                                                <button class="btn btn-danger" onclick="window.location.href='mostrar.php'" type="button">Cancelar</button>
												<button class="btn btn-success" type="submit" name="agregar">Guardar</button>

                                                
											</div>
					            		</form>     
					                </div>
					            </div>
					        </div>
					
					    </div>
					</div>					
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
        
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
								<div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="..\..\assets\images\7.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo ucfirst($_SESSION['nombre']); ?></p>
                                            <span class="mnp-desc"><?php echo ucfirst($_SESSION['correo']); ?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        
                                        <a href="../logout.php" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>

                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->
  							

                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Navigation</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="..\admin\pages-admin.php">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Dashboard</span>
											<i class="arrow"></i>
						                </a>
						
						            </li>

						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Components</li>

                                    <!--Menu list item-->
                                    <li>
						                <a href="#">
						                    <i class="ti-package"></i>
						                    <span class="menu-title">Articulos</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../articulo/mostrar.php">Mostrar</a></li>
											<li><a href="../articulo/nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>            
						
						            <!--Menu list item-->
						            <li class="active-sub">
						                <a href="#">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Trabajadores</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="mostrar.php">Mostrar</a></li>
											<li class="active-link"><a href="nuevo.php">Nuevo</a></li>
						                </ul>
										
						            </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i>
                                            <span class="menu-title">Usuarios</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../usuarios/mostrar.php">Mostrar</a></li>
                                            <li><a href="../usuarios/nuevo.php">Nuevo</a></li>
                                        </ul>   
                                    </li>

									<li>
						                <a href="#">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Proveedores</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../proveedor/mostrar.php">Mostrar</a></li>
											<li><a href="../proveedor/nuevo.php">Nuevo</a></li>
						                </ul>
										
						            </li>
                                    <li>
						                <a href="#">
						                    <i class="ti-tag"></i>
						                    <span class="menu-title">Categoría</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../categoria/mostrar.php">Mostrar</a></li>
											<li><a href="../categoria/nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>
                                    <li>
						                <a href="#">
						                    <i class="ti-envelope"></i>
						                    <span class="menu-title">Pedidos</span>
											<i class="arrow"></i>
						                </a>

                                         <ul class="collapse">
                                            <li><a href="../pedido/mostrar.php">Mostrar</a></li>
                                            <li><a href="../pedido/nuevo.php">Nuevo</a></li>
                                        </ul>  
						            </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-shopping-cart"></i>
                                            <span class="menu-title">Compra</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../compra/mostrar.php">Mostrar</a></li>
                                            <li><a href="../compra/nuevo.php">Nuevo</a></li>
                                        </ul>                    
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-bookmark-alt"></i>
                                            <span class="menu-title">Kardex</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../kardex/kardexgeneral.php">Kardex en general</a></li>
                                           
                                        </ul>                    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="..\..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>
   
   

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--------------------------------script nuevo----------------------------->
<?php
if(isset($_POST["agregar"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ranger_security";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];


// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "select * from trabajador where dni='$dni' or correo='$correo'  or telefono='$telefono'";
$result = mysqli_query($conn, $sql);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe el registro a agregar!'
 
})


        </script>

    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2="INSERT INTO trabajador(nombre,apellido,dni,correo,telefono)VALUES ('$nombre','$apellido','$dni','$correo','$telefono')";

if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  icon: 'info',
  title: 'Registro',
  text: 'Datos registrados correctamente'
  
}).then(function() {
            window.location = "mostrar.php";
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se pudo guardar!'
 
})
       </script>
       <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>
<script type="text/javascript">
   $(document).ready(function(){
  $(function() {
 
 $("form[name='register-form']").validate({   
rules: {
     nombre: "required", 
     apellido: "required", 
      dni: {
        required: true,
        minlength: 8
      },
  
         correo: {              
             required: true,
             email: true
         },

         telefono: {
        required: true,
        minlength: 9
      },
 },
     
messages: {
         nombre: "Digitar nombre valido",
         apellido: "Digitar apellido valido",
         dni: "Digitar dni valido",
         correo: "Digitar correo valido",
         telefono: "Digitar telefono valido"
     },
     submitHandler: function(form) {
         form.submit();
     }
 });

  });
}) 
</script>
</body>
</html>
