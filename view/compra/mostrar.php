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

    <title>Compras</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">
    <link href="..\..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="..\..\assets\plugins\pace\pace.min.css" rel="stylesheet">
    <script src="..\..\assets\plugins\pace\pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">


        
    <!--DataTables [ OPTIONAL ]-->
    <link href="..\..\assets\plugins/DataTables/css/datatables.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--================================-->
                <div class="navbar-header">
                    <a href="pages-admin.php" class="navbar-brand">
                         <img src="..\..\assets\images\logo.png" alt="Ranger Logo" class="brand-icon">
                       
                        <div class="brand-title">
                            <span class="brand-text" style="font-size: 11px;">Comiserge S.R.Ltda.</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
              
                <!--================================-->
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
                        <h1 class="page-header text-overflow">Compras</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="../admin/pages-admin.php"><i class="demo-pli-home"></i></a></li>
					<li><a href="mostrar.php">Compras</a></li>
					<li class="active">Mostrar</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<!--===================================================-->
					<div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">Listado de compras</h3>
					    </div>
                         <a href="reporte.php"  class="btn btn-default" title="PDF" type="button"><i class="demo-pli-printer"></i>Export to PDF</a>
  						<?php 
    
    if(isset($_SESSION['message'])){
        ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b><?php echo $_SESSION['message']; ?></span>
                  </div>
        
        <?php

        unset($_SESSION['message']);
    }
?>
					    <div class="panel-body">
							<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "ranger_security";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("SELECT  compra.fecha, compra.id_compra,compra.estado, GROUP_CONCAT( articulo.nomar, '..', articulo.detalle, '..', productos_comprados.canti SEPARATOR '__') AS articulo FROM compra INNER JOIN 

productos_comprados ON productos_comprados.id_compra = compra.id_compra INNER JOIN articulo ON articulo.id_art = productos_comprados.id_art GROUP BY compra.id_compra ORDER BY compra.id_compra;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
					        <table id="myTable" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>#</th>
					                    <th class="min-tablet">Fecha</th>
					                    <th class="min-tablet">Productos comprados</th>
                                        <th class="min-tablet">Estado</th>
                                      
					                </tr>
					            </thead>
					            <tbody>
                                    <?php foreach($compras as $compra){ ?>
									<tr>
									<td><?php echo $compra->id_compra ?></td>
                                    <td><?php echo $compra->fecha ?></td>
                                    <td>
                                       

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Nombre</th>

                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(explode("__", $compra->articulo) as $articulosConcatenados){ 
                                $articulo = explode("..", $articulosConcatenados)
                                ?>
                                <tr>
                                  
                                    <td><?php echo $articulo[0] ?></td>
                                    <td><?php echo $articulo[2] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table> 

                                    </td>
                                    <td>
                <?php    

                if($compra->estado==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $compra->id_compra; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $compra->id_compra; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Pendiente</button>
                     </form>
                        <?php  } ?>                         
            </td>

                        			
									</tr>
                                     <?php } ?>
					            </tbody>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        
                                    </tr>
                                </tfoot> 
								
					        </table>
					    </div>
					</div>
                </div>
            </div>
  
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
						            <li>
						                <a href="#">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Trabajadores</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../trabajador/mostrar.php">Mostrar</a></li>
											<li><a href="../trabajador/nuevo.php">Nuevo</a></li>
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
						                <ul class="collapse" >
						                    <li><a href="mostrar.php">Mostrar</a></li>
											<li><a href="nuevo.php">Nuevo</a></li>
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
                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-shopping-cart"></i>
                                            <span class="menu-title">Compra</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="../compra/mostrar.php">Mostrar</a></li>
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
                </div>
            </nav>
            <!--===================================================-->

        </div>

        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
  
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="..\..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>

    
    <!--Demo script [ DEMONSTRATION ]-->
    
  
    <!--DataTables [ OPTIONAL ]-->
    <script src="../../assets/plugins/DataTables/js/datatables.min.js"></script>
     <script type="text/javascript">
    $(document).ready(function() {
    $('#myTable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option style="color:black;" value="'+d+'">'+d+'</option>' )




                } );
            } );
        }
    } );
} );
</script>

<script>


// Editar estado inactivo
function inactivo(id_compra)
{
    var id=id_compra;
    $.ajax({
        type:"GET",
        url:"../../assets/ajax/editar_estado_inactivo_compra.php?id="+id,
    }).done(function(data){
        window.location.href ='mostrar.php';
    })
}
</script>

</body>
</html>

