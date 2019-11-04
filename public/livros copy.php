<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean('Sebo da Colina - livros');

$a_catalogo = array();

$a_campos = array();

$_resultado = calculaFrete(
        '41106',
        '11680000',
        '82220000',
        '1',
        '15', '22', '32', 0 );

define_campos($a_campos);

le_catalogo($a_catalogo,$a_campos);

inclui_principal_publicacoes($a_catalogo);

inclui_rodape_clean();



//------------------------------------------------
function inclui_principal_publicacoes($a_catalogo)
{

  echo '<div class="container" style="margin: 0 auto;line-height: 1.5em;letter-spacing:1px;font-size: 0.90em">';

  inclui_titulo("Livros","");

  exibe_catalogo($a_catalogo);

  echo '</div>';

}

//---------------------------------------------------------
//carrega o arquivo livros.csv para a array $a_lista_livros
function le_catalogo(&$a_catalogo,$a_campos)
{
  $lines = file ('./itens/livros.csv');

  //-- percorre a array $lines, que foi populada com as linhas do arquivo
  foreach ($lines as $line_num => $a_dados_item)
  {

    if($line_num==0){
    }
      else
    {
        $a_item = explode ( '|' , $a_dados_item );

        foreach($a_campos as $ind => $valor)
        {
          $ax[$valor]=$a_item[$ind];
        }

        $a_catalogo[$a_item[6]] = $ax;

    }

  }

}


//----------------------------------
function exibe_catalogo($a_catalogo)
{

  $filtro="personal";

  foreach ($a_catalogo as $line_num => $line)
  {

    $tem = strpos(strtoupper($line["Título"]),strtoupper($filtro));
    if($tem == false)
    {
      $tem = strpos(strtoupper($line["Sumário"]),strtoupper($filtro));

      if($tem == false)
      {
        $tem = strpos(strtoupper($line["Categorias"]),strtoupper($filtro));
      }
    }

    if ($tem == true )
    {


    $titulo = $line["Título"];
    $autor = $line["Autor"];
    $capa = $line["imagem"];
    $categoria = $line["Categorias"];
    $publicacao = $line["Data de publicação"];
   // $editora = $line[0][4];
    $paginas = $line["Páginas"];
   // $isbn = $line[0][6];
   // $sumario = $line[0][10];

    $arquivo="./capas/".rtrim($capa);

    //verifica se o arquivo da imagem da capa existe.
    if (!file_exists($arquivo)) {
        $capa="no_img.jpg";
    }

    echo '<div class="row">';

    echo '<div class="col s12 m4 l3"> ';
    echo '<img src="./capas/'.$capa.'" style="width:70%; display: block;  margin-top:20px;margin-left: 0;  margin-right: 0">';
    echo '</div>';

    echo '<div class="col s12 m8 l9">';
    echo '<p style="color:blue;font-size:1.2rem;font-weight:bold; margin:1rem 0rem 0;">' . ucwords(strtolower($titulo)) . '</p>';
    echo '<p style="margin:1rem 0rem 0;line-height:1rem;">' . ucwords(strtolower($autor)) . '</p>';
    echo '<p style="margin:1rem 0rem 0;line-height:1rem;">' . $paginas . ' paginas</p>';
    echo '<p style="margin:1rem 0rem 0;line-height:1rem;">Publicado em ' . $publicacao . '</p>';
    echo '<p style="margin:1rem 0rem 0;line-height:1rem;"><a  href="revistas.php">Detalhes...</a></p>';

    echo '</div>';

    echo '</div>';
    }
  }


}

//---------------------------------
function define_campos(&$a_campos)
{
  $a_campos=array(
  "Título",
  "Autor",
  "Categorias",
  "Data de publicação",
  "Editora",
  "Páginas",
  "ISBN",
  "Lido",
  "Período de leitura",
  "Comentários",
  "Sumário",
  "Caminho da capa",
  "imagem",
  "peso",
  "tam_altura",
  "tam_largura",
  "tam_espessura",
  "preço"
    );
}


//---------------------
function calculaFrete(
      $cod_servico, /* codigo do servico desejado */
      $cep_origem,  /* cep de origem, apenas numeros */
      $cep_destino, /* cep de destino, apenas numeros */
      $peso,        /* valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4 */
      $altura,      /* altura do produto em cm incluindo a embalagem */
      $largura,     /* altura do produto em cm incluindo a embalagem */
      $comprimento, /* comprimento do produto incluindo embalagem em cm */
      $valor_declarado='0' /* indicar 0 caso nao queira o valor declarado */
   ){

      $cod_servico = strtoupper( $cod_servico );
      if( $cod_servico == 'SEDEX10' ) $cod_servico = 40215 ;
      if( $cod_servico == 'SEDEXACOBRAR' ) $cod_servico = 40045 ;
      if( $cod_servico == 'SEDEX' ) $cod_servico = 40010 ;
      if( $cod_servico == 'PAC' ) $cod_servico = 41106 ;

      # ###########################################
      # Código dos Principais Serviços dos Correios
      # 41106 PAC sem contrato
      # 40010 SEDEX sem contrato
      # 40045 SEDEX a Cobrar, sem contrato
      # 40215 SEDEX 10, sem contrato
      # ###########################################

      $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado."&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml";

      $xml = simplexml_load_file($correios);

      $_arr_ = array();
      if($xml->cServico->Erro == '0'):
         $_arr_['codigo'] = $xml -> cServico -> Codigo ;
         $_arr_['valor'] = $xml -> cServico -> Valor ;
         $_arr_['prazo'] = $xml -> cServico -> PrazoEntrega .' Dias' ;
         // return $xml->cServico->Valor;
         return $_arr_ ;
      else:
         return false;
      endif;
   }


?>
