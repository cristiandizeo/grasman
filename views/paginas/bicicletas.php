   <!-- Page Content -->
   <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-banner.jpg);">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="text-content">
             <h2>Nuestras bicicletas</h2>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="products">
     <div class="container">
       <div class="row">
         <div class="col-md-3">
           <div class="contact-form">
             <form action="/bicicletas" method="GET" id="formb">
               <?php include __DIR__ . '/buscar.php'; ?>
               <button type="submit" class="filled-button btn-block" id="buscar">Buscar</button>
               <button class="filled-button btn-block bg-danger" id="limpiar">Limpiar</button>
             </form>
           </div>
         </div>
         <div class="col-md-9">
           <div class="row">
            
             <div <?php //Si no hay resultados de bicicletas mostrar mensaje
              if ($consultas != null) echo 'hidden'; ?>>No se encontraron resultados</div>
             <?php require 'listadob.php'; ?>
             <div class="col-md-12">
               <ul class="pages">

                 <?php
  // Si la página solicitada es mayor a la cantidad, 404
                  if (isset($args['pagina'])) {
                    if ($args['pagina'] > $paginas) {
                      header('Location: /404');
                    }
                  };
                  // Quitar del arr la página para crear los proximos links
                  unset($args['pagina']);
                  // Codificar arr
                  $args = http_build_query($args);
                  //si la página es mayor a 1, muestra el link para retroceder 
                   if ($pagina > 1) { ?>
                   <li><a href="<?php echo "bicicletas?" . $args . "&pagina=" . $pagina - 1; ?>"><i class="fa fa-angle-double-left"></i></a></li>
                 <?php } 
                 //links de las páginas
              for ($i = 1; $i <= $paginas; $i++) { ?>

                   <li class="<?php if ($i == $pagina) echo 'active'; ?>"><a href="<?php echo "bicicletas?" . $args . "&pagina=" . $i; ?>"><?php echo $i; ?></a></li>

                 <?php }
                 // Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante 
                 if ($pagina < $paginas) { ?>
                   <li>
                     <a href="<?php echo "bicicletas?" . $args . "&pagina=" . $pagina + 1; ?>">
                       <i class="fa fa-angle-double-right"></i>
                     </a>
                   </li>
                 <?php } ?>
                 <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>