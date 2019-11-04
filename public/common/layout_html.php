<?php
//-------------------------------------------
function inclui_cabecalho_clean($title)
{

  $servidor = $_SERVER['SERVER_NAME'];

  if($servidor == "localhost")
  {
    $home = "/sebodacolina/public/";
  }
  else
  {
    $home="https://sebodacolina.herokuapp.com/";
  }

	echo '<!DOCTYPE html>';
	echo '<html lang="pt-br">';

	echo '<head>';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>';
  echo '<title>'.$title.'</title>';

  echo '<!-- CSS  -->';
  echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
  echo '<link href="./css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>';
  echo '<link href="./css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>';

  echo '<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">';
  echo '<link href="./css/sltools.css" rel="stylesheet">';

  echo '<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Cinzel|Handlee|Italianno|Old+Standard+TT|Poiret+One|Quattrocento" rel="stylesheet">    ';
  echo '<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">';
  echo '<style>';
	echo '*{';
	echo 'margin:0;';
	echo 'padding:0;';
	echo '}	';
	echo '#suadiv{';
	echo 'top:0;';
	echo 'left:0;';
	echo 'background-color:#00897b;';
	echo 'width:100%;';
	echo 'height:100%;';

	echo 'filter: alpha(opacity=65);';
	echo 'padding: 10px;';
	echo 'margin:0,0,0;';
	echo '}';
  echo '#all{';
  echo '          width: 580px;';
  echo '          height: 20px;';
  echo '          line-height: 20px; /* centraliza na vertical */';
  echo '          background-color: white;';
  echo '          margin: 0 auto;';
  echo '      }';



  echo 'ul.menu{';
  echo '          text-align: center; /* centraliza na horizontal */';
  echo '      }';
  echo '      ul.menu li{';
  echo '          display: inline-block; /* centraliza na horizontal */';
  echo '         margin: 0 -3px;';
  echo '        font-size:13px;     ';
  echo '      }';
  echo '      ul.menu li a{';
  echo '          background-color: white;';
  echo '          border-radius: 6px;';
  echo '          padding: 6px 10px;';
  echo '          color: #fff;';
  echo '          color:teal;';
  echo '      }';
  echo '      ul.menu li a:hover{';
  echo '          background-color: #8BBADC;';
  echo '      }';

	echo '</style>   	';

	echo '</head>';
	echo '<body>';

  echo '<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>';
  echo '<script src="http://'.$servidor.'/v3/js/materialize.js"></script>';
  echo '<script src="http://'.$servidor.'/v3/js/init.js"></script>';

  echo '<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>';
  echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>';
  echo '<script type="text/javascript" src="./v3/js/materialize.min.js"></script>  ';
  echo '<script type="text/javascript" src="./v3/common/funcoes_JS.js"></script>';


  echo '<script>';
  echo '$(document).ready(function() {';
  echo '    Materialize.updateTextFields();';
  echo '  });';
  echo '</script>';

  echo '<script>';

  echo '$(document).ready(function() {';
  echo '    $('."'select'".').material_select();';
  echo '  });';
  echo '</script>';

  echo '<div class="container" style="border-bottom: 1px solid #b2dfdb; margin: 0 auto;">';
  echo '<a href="'.$home.'"><img src="./imagens/sebodacolina.jpg" style="width:70%; display: block;  margin-top:20px;margin-left: auto;  margin-right: auto">';
  echo '</div>';

  echo '<div class="container" >';
  echo '  <ul class="menu" style="font-family: Raleway, sans-serif;font-size:2px;text-transform: uppercase;letter-spacing:2px">';
  echo '         <li><a href="sobre.php">: sobre</a></li>';
  echo '         <li><a href="contato.php">: contato</a></li>';
  echo '       </ul>';
  echo '</div>';


  echo '<div class="container" style="font-family: Lato, sans-serif;font-size:18px">';
  echo '<br>';
}

//----------------------------
function inclui_rodape_clean()
{
  echo '</div>';
  echo '</div>';

  echo '<br><br>';
  echo '<div class="container" style="border-top: 1px solid #b2dfdb;">';
  echo '<br>';

  echo '  <p style="color:#757575;">Copyright © 2017 Sidnei Leitão. All rights reserved. </p>';
  echo '</div>';
  echo '</body>';
  echo '</html>';

}


//--------------------
function linha($linha)
{

echo '<p style="margin:1rem 0rem 0;">' . $linha . '</p>';

}

//-----------------------------------------
function inclui_titulo($titulo,$subtitulo)
{

  echo '<h3 style="color:#00bfa5;font-family: Raleway;font-weight:bold;">'.$titulo.'</h3>';
  echo '<h5 style="color:#00bfa5;font-family: Raleway;">'.$subtitulo.'</h5>';
  //echo '<br>';

}
?>
