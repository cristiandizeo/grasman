<?php

function paginacion($_pagi_sql, $_pagi_cuantos, $_pagi_nav_num_enlaces,$_pagi_separador, $_pagi_enlace, $_pagi_conteo_alternativo, $numPagina, $link){
                           
                           /**
                            * Variables que se pueden definir antes de incluir el script via include():
                            * ------------------------------------------------------------------------
                            * $_pagi_sql                   OBLIGATORIA.        Cadena. Debe contener una sentencia sql valida (y sin la clausula "limit").
                            
                            * $_pagi_cuantos               OPCIONAL.       Entero. Cantidad de registros que contendra como maximo cada pagina.
                                                           Por defecto esta en 20.
                                                                       
                            * $_pagi_nav_num_enlaces       OPCIONAL        Entero. Cantidad de enlaces a los numeros de pagina que se mostraran como 
                                                           maximo en la barra de navegacion.
                                                           Por defecto se muestran todos.
                                                                       
                            * $_pagi_mostrar_errores       OPCIONAL        Booleano. Define si se muestran o no los errores de MySQL que se puedan producir.
                                                           Por defecto esta en "true";
                                                                       
                            * $_pagi_propagar              OPCIONAL        Array de cadenas. Contiene los nombres de las variables que se quiere propagar
                                                           por el url. Por defecto se propagaran todas las que ya vengan por el url (GET).
                            * $_pagi_conteo_alternativo    OPCIONAL        Booleano. Define si se utiliza mysql_num_rows() (true) o COUNT(*) (false).
                                                           Por defecto esta en false.
                            * $_pagi_separador             OPCIONAL        Cadena. Cadena que separa los enlaces numericos en la barra de navegacion entre paginas.
                                                           Por defecto se utiliza la cadena " | ".
                            * $_pagi_nav_estilo            OPCIONAL        Cadena. Contiene el nombre del estilo CSS para los enlaces de paginacion.
                                                           Por defecto no se especifica estilo.
                            * $_pagi_nav_anterior          OPCIONAL        Cadena. Contiene lo que debe ir en el enlace a la pagina anterior. Puede ser un tag <img>.
                                                           Por defecto se utiliza la cadena "&laquo; Anterior".
                            * $_pagi_nav_siguiente         OPCIONAL        Cadena. Contiene lo que debe ir en el enlace a la pagina siguiente. Puede ser un tag <img>.
                                                           Por defecto se utiliza la cadena "Siguiente &raquo;"
                           --------------------------------------------------------------------------
                           */
                           
                           
                           /*
                            * Verificacion de los parametros obligatorios y opcionales.
                            *------------------------------------------------------------------------
                            */
                            if(empty($_pagi_sql)){
                               // Si no se defini� $_pagi_sql... grave error!
                               // Este error se muestra si o si (ya que no es un error de mysql)
                               die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");
                            }
                            
                            if(empty($_pagi_cuantos)){
                               // Si no se ha especificado la cantidad de registros por pagina
                               // $_pagi_cuantos sera por defecto 20
                               $_pagi_cuantos = 20;
                            }
                            
                            if(!isset($_pagi_mostrar_errores)){
                               // Si no se ha elegido si se mostrara o no errores
                               // $_pagi_errores sera por defecto true. (se muestran los errores)
                               $_pagi_mostrar_errores = true;
                            }
                           
                            if(!isset($_pagi_conteo_alternativo)){
                               // Si no se ha elegido el tipo de conteo
                               // Se realiza el conteo dese mySQL con COUNT(*)
                               $_pagi_conteo_alternativo = false;
                            }
                            
                            if(!isset($_pagi_separador)){
                               // Si no se ha elegido un separador
                               // Se toma el separador por defecto.
                               $_pagi_separador = " | ";
                            }
                            
                             if(isset($_pagi_nav_estilo)){
                               // Si se ha definido un estilo para los enlaces, se genera el atributo "class" para el enlace
                               $_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
                            }else{
                               // Si no, se utiliza una cadena vacia.
                               $_pagi_nav_estilo_mod = "";
                            }
                            
                            if(!isset($_pagi_nav_anterior)){
                               // Si no se ha elegido una cadena para el enlace "siguiente"
                               // Se toma la cadena por defecto.
                               $_pagi_nav_anterior = "<i class='fa fa-chevron-left'></i> ";
                            } 
                            
                            if(!isset($_pagi_nav_siguiente)){
                               // Si no se ha elegido una cadena para el enlace "siguiente"
                               // Se toma la cadena por defecto.
                               $_pagi_nav_siguiente = "<i class='fa fa-chevron-right'></i>"; 
                            } 
                            
                           //------------------------------------------------------------------------
                           
                           
                           /*
                            * Establecimiento de la pagina actual.
                            *------------------------------------------------------------------------
                            */
                            if (empty($numPagina)){
                               // Si no se ha hecho click a ninguna pagina especifica
                               // O sea si es la primera vez que se ejecuta el script
                                   // $_pagi_actual es la pagina actual-->sera por defecto la primera.
                               $_pagi_actual = 1;
                            }else{
                               // Si se "pidi�" una pagina especifica:
                               // La pagina actual sera la que se pidi�.
                                   $_pagi_actual = $numPagina;
                            }
                           //------------------------------------------------------------------------
                           
                           
                           /*
                            * Establecimiento del numero de paginas y del total de registros.
                            *------------------------------------------------------------------------
                            */
                            // Contamos el total de registros en la BD (para saber cuantas paginas seran)
                            // La forma de hacer ese conteo dependera de la variable $_pagi_conteo_alternativo
                            if($_pagi_conteo_alternativo == false){
                                $_pagi_sqlConta = str_replace("select (.*) from", "SELECT COUNT(*) FROM", $_pagi_sql);
                               $_pagi_result2 = mysqli_query($_pagi_sqlConta);
                               
                               // Si ocurri� error y mostrar errores esta activado
                               if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
                                   die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysql_error()."</b>");
                               }
                               $_pagi_totalReg = mysqli_result($_pagi_result2,0,0);//total de registros
                            }else{
                               $_pagi_result3 = mysqli_query($link, $_pagi_sql);
                               // Si ocurri� error y mostrar errores esta activado
                               if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
                                   die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. Mysql dijo: <b>".mysql_error()."</b>");
                               }
                              $_pagi_totalReg = mysqli_num_rows($_pagi_result3);
                                
                            }
                            // Calculamos el numero de paginas (saldra un decimal)
                            // con ceil() redondeamos y $_pagi_totalPags sera el numero total (entero) de paginas que tendremos
                            $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);
                           
                           //------------------------------------------------------------------------
                           
                           
                           /*
                            * Propagacion de variables por el URL.
                            *------------------------------------------------------------------------
                            */
                            // La idea es pasar tambien en los enlaces las variables hayan llegado por url.
                            //$_pagi_enlace = $_SERVER['PHP_SELF'];
                            
                            
                            $_pagi_query_string = "?";
                            
                            if(!isset($_pagi_propagar)){
                               //Si no se defini� que variables propagar, se propagara todo el $_GET (por compatibilidad con versiones anteriores)
                               $_pagi_propagar = array_keys($_GET);
                            }elseif(!is_array($_pagi_propagar)){
                               // si $_pagi_propagar no es un array... grave error!
                               die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
                            }
                            // Este foreach esta tomado de la Clase Paginado de webstudio
                            // (http://www.forosdelweb.com/showthread.php?t=65528)
                            foreach($_pagi_propagar as $var){
                               if(isset($GLOBALS[$var])){
                                   // Si la variable es global al script
                                   $_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
                               }elseif(isset($_REQUEST[$var])){
                                   // Si no es global (o register globals esta en OFF)
                                   $_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
                               }
                            }
                           
                            // A�adimos el query string a la url.
                            //$_pagi_enlace .= $_pagi_query_string;
                           // echo "<p>_pagi_enlace = $_pagi_enlace</p>";
                           //------------------------------------------------------------------------
                           
                           
                           //MIGUEL esto lo hago para saber si estoy en una pagina con el htaccess. 
                           //porque entonces la propagacion de las variables para los enlaces de paginacion seria distinta
                           if (!$_pagi_htaccess){
                           
                           
                           
                               /*
                                * Generacion de los enlaces de paginacion.
                                *------------------------------------------------------------------------
                                */
                                // La variable $_pagi_navegacion contendra los enlaces a las paginas.
                                $_pagi_navegacion_temporal = array();
                                if ($_pagi_actual != 1){
                                   // Si no estamos en la pagina 1. Ponemos el enlace "anterior"
                                   $_pagi_url = $_pagi_actual - 1; //sera el numero de pagina al que enlazamos
                                   $_pagi_navegacion_temporal[] = "<li><a class='prev-next prev' ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_url."'>$_pagi_nav_anterior</a></li>";
                                }
                                
                                // La variable $_pagi_nav_num_enlaces sirve para definir cuantos enlaces con 
                                // numeros de pagina se mostraran como maximo.
                                // Ojo: siempre se mostrara un numero impar de enlaces. Mas info en la documentacion.
                                
                                if(!isset($_pagi_nav_num_enlaces)){
                                   // Si no se defini� la variable $_pagi_nav_num_enlaces
                                   // Se asume que se mostraran todos los numeros de pagina en los enlaces.
                                   $_pagi_nav_desde = 1;//Desde la primera
                                   $_pagi_nav_hasta = $_pagi_totalPags;//hasta la ultima
                                }else{
                                   // Si se defini� la variable $_pagi_nav_num_enlaces
                                   // Calculamos el intervalo para restar y sumar a partir de la pagina actual
                                   $_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
                                   
                                   // Calculamos desde que numero de pagina se mostrara
                                   $_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;
                                   // Calculamos hasta que numero de pagina se mostrara
                                   $_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;
                                   
                                   // Ajustamos los valores anteriores en caso sean resultados no validos
                                   
                                   // Si $_pagi_nav_desde es un numero negativo
                                   if($_pagi_nav_desde < 1){
                                       // Le sumamos la cantidad sobrante al final para mantener el numero de enlaces que se quiere mostrar. 
                                       $_pagi_nav_hasta -= ($_pagi_nav_desde - 1);
                                       // Establecemos $_pagi_nav_desde como 1.
                                       $_pagi_nav_desde = 1;
                                   }
                                   // Si $_pagi_nav_hasta es un numero mayor que el total de paginas
                                   if($_pagi_nav_hasta > $_pagi_totalPags){
                                       // Le restamos la cantidad excedida al comienzo para mantener el numero de enlaces que se quiere mostrar.
                                       $_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
                                       // Establecemos $_pagi_nav_hasta como el total de paginas.
                                       $_pagi_nav_hasta = $_pagi_totalPags;
                                       // Hacemos el ultimo ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no valido.
                                       if($_pagi_nav_desde < 1){
                                           $_pagi_nav_desde = 1;
                                       }
                                   }
                                }
                           
                                for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde pagina 1 hasta ultima pagina ($_pagi_totalPags)
                                   if ($_pagi_i == $_pagi_actual) {
                                       // Si el numero de pagina es la actual ($_pagi_actual). Se escribe el numero, pero sin enlace y en negrita.
                                       $_pagi_navegacion_temporal[] = "<li class='active'><a class='active'".$_pagi_nav_estilo_mod.">$_pagi_i</a></li>";
                                   }else{
                                       // Si es cualquier otro. Se escibe el enlace a dicho numero de pagina.
                                       $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_i."'>".$_pagi_i."</a></li>";
                                   }
                                }
                               
                                if ($_pagi_actual < $_pagi_totalPags){
                                   // Si no estamos en la ultima pagina. Ponemos el enlace "Siguiente"
                                   $_pagi_url = $_pagi_actual + 1; //sera el numero de pagina al que enlazamos
                                   $_pagi_navegacion_temporal[] = "<li > <a class='prev-next next' ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_url."'>$_pagi_nav_siguiente</a></li>";
                                }
                                $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
                           
                                
                                
                                
                                
                           }else{
                               //ESTOY EN UN HTACCESS
                               //MIGUEL voy a propagar las variables de paginacion de una manera distinta
                               // La variable $_pagi_navegacion contendra los enlaces a las paginas.
                               //echo "<p>_pagi_enlace = $_pagi_enlace</p>";
                                if (isset($_pagi_htaccess_termina_html)){
                                   $_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".html"));
                                   $_pagi_ext_terminacion = "html";
                                }else{
                                   if (strpos($_pagi_enlace,"index.php")===false){
                                       $_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".php"));
                                       $_pagi_ext_terminacion = "php";
                                       //echo "<p>_pagi_enlacex = $_pagi_enlace</p>";
                                   }else{
                                       $_pagi_enlace = "index";
                                       $_pagi_ext_terminacion = "php";
                                   }
                                }
                                //voy a ver si tenemos un pg_x porque esto no me interesa que este en la variable $_pagi_enlace
                                if (strpos($_pagi_enlace,"_pg"))
                                   $_pagi_enlace = substr($_pagi_enlace,0,strpos($_pagi_enlace,"_pg"));
                               // echo "<p>_pagi_enlace = $_pagi_enlace</p>";
                               
                                $_pagi_navegacion_temporal = array();
                                if ($_pagi_actual != 1){
                                   // Si no estamos en la pagina 1. Ponemos el enlace "anterior"
                                   $_pagi_url = $_pagi_actual - 1; //sera el numero de pagina al que enlazamos
                                   if ($_pagi_url!=1)
                                       $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a></li>";
                                   else
                                       $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a></li>";
                                }
                                
                                // La variable $_pagi_nav_num_enlaces sirve para definir cuantos enlaces con 
                                // numeros de pagina se mostraran como maximo.
                                // Ojo: siempre se mostrara un numero impar de enlaces. Mas info en la documentacion.
                                
                               // ASUMO QUE no se defini� la variable $_pagi_nav_num_enlaces
                               // Se asume que se mostraran todos los numeros de pagina en los enlaces.
                               $_pagi_nav_desde = 1;//Desde la primera
                               $_pagi_nav_hasta = $_pagi_totalPags;//hasta la ultima
                                
                                for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde pagina 1 hasta ultima pagina ($_pagi_totalPags)
                                   if ($_pagi_i == $_pagi_actual) {
                                       // Si el numero de pagina es la actual ($_pagi_actual). Se escribe el numero, pero sin enlace y en negrita.
                                       $_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
                                   }else{
                                       // Si es cualquier otro. Se escibe el enlace a dicho numero de pagina.
                                       if ($_pagi_i!=1)
                                           $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_i."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a></li>";
                                       else
                                           $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a></li>";
                                   }
                                }
                               
                                if ($_pagi_actual < $_pagi_totalPags){
                                   // Si no estamos en la ultima pagina. Ponemos el enlace "Siguiente"
                                   $_pagi_url = $_pagi_actual + 1; //sera el numero de pagina al que enlazamos
                                   $_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_siguiente</a></li>";
                                }
                                $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
                           }
                           //------------------------------------------------------------------------
                           
                           
                           /*
                            * Obtencion de los registros que se mostraran en la pagina actual.
                            *------------------------------------------------------------------------
                            */
                            // Calculamos desde que registro se mostrara en esta pagina
                            // Recordemos que el conteo empieza desde CERO.
                            $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
                            
                            // Consulta SQL. Devuelve $cantidad registros empezando desde $_pagi_inicial
                            $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
                            $_pagi_result = mysqli_query($link, $_pagi_sqlLim);
                            // Si ocurri� error y mostrar errores esta activado
                            if($_pagi_result == false && $_pagi_mostrar_errores == true){
                               die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
                            }
                           
                           //------------------------------------------------------------------------
                           
                           
                           /*
                            * Generacion de la informacion sobre los registros mostrados.
                            *------------------------------------------------------------------------
                            */
                            // Numero del primer registro de la pagina actual
                            $_pagi_desde = $_pagi_inicial + 1;
                            
                            // Numero del ultimo registro de la pagina actual
                            $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
                            if($_pagi_hasta > $_pagi_totalReg){
                               // Si estamos en la ultima pagina
                               // El ultimo registro de la pagina actual sera igual al numero de registros.
                               $_pagi_hasta = $_pagi_totalReg;
                            }
                            
                            $_pagi_info = " <span class=fuente8><b>Productos del $_pagi_desde hasta el $_pagi_hasta de $_pagi_totalReg Productos</b></span>";
                            $_pagi_info_scripts = " <span class=fuente8><b>Encontrados $_pagi_totalReg scripts. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
                            $_pagi_info_articulos = " <span class=fuente8><b>Encontrados $_pagi_totalReg articulos. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
                           //------------------------------------------------------------------------
                           
                           
                           /**
                            * Variables que quedan disponibles despues de incluir el script via include():
                            * ------------------------------------------------------------------------
                            
                            * $_pagi_result        Identificador del resultado de la consulta a la BD para los registros de la pagina actual. 
                                           Listo para ser "pasado" por una funcion como mysql_fetch_row(), mysql_fetch_array(), 
                                           mysql_fetch_assoc(), etc.
                                                       
                            * $_pagi_navegacion        Cadena que contiene la barra de navegacion con los enlaces a las diferentes paginas.
                                           Ejemplo: "<<anterior 1 2 3 4 siguiente>>".
                                                       
                            * $_pagi_info          Cadena que contiene informacion sobre los registros de la pagina actual.
                                           Ejemplo: "desde el 16 hasta el 30 de un total de 123";              
                           
                           */ 
                           $_pagi_navegacion= '<li><a href="'.$_pagi_enlace.'1">Inicio</a></li>'.$_pagi_navegacion.'<li><a href="'.$_pagi_enlace.$_pagi_totalPags.'">Ultima</a></li>';               
                           return $d= array("datos"=>$_pagi_result, "paginacion"=> $_pagi_navegacion, "info"=>$_pagi_info);
                            
                        }

?>