<?php

include_once('./common/layout_html.php');

inclui_cabecalho_clean('Sebo da Colina - livros');

$a_lista_livros = array();

$_resultado = calculaFrete(
        '41106',
        '11680000',
        '82220000',
        '1',
        '15', '22', '32', 0 );

//echo "Valor: ".$_resultado['valor'];
//echo "Prazo: ".$_resultado['prazo'];


le_catalogo($a_lista_livros);

//exibe_catalogo($a_lista_livros);


inclui_principal_publicacoes($a_lista_livros);

inclui_rodape_clean();



//----------------------------------------
function inclui_principal_publicacoes($a_lista_livros)
{

echo '<div class="container" style="margin: 0 auto;line-height: 1.5em;letter-spacing:1px;font-size: 0.90em">';

inclui_titulo("Livros","");

/*linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/como-equilibrar-nossas-escolhas/"><h5><b>Como Equilibrar Nossas Escolhas</b></h5></a>');
linha('Na correria em que a vida às vezes se torna, corremos o risco de perder o equilíbrio entre nossas escolhas.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/como-equilibrar-nossas-escolhas/">aqui</a> para ler o artigo.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/ebook/"><h5><b>5 Dicas Para a Sua Busca de Emprego</b></h5></a>');
linha('Eu selecionei 5 dicas poderosas que vão causar um grande impacto na sua busca por emprego.');
linha('São dicas sobre currículos, entrevistas, vagas, network e autoconhecimento.');
linha('Baixe o eBook gratuitamente <a style="color: blue;" href="http://www.sidneileitao.com.br/ebook/">aqui.</a>');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/como-desenvolver-a-autoconfianca/"><h5><b>Como desenvolver a autoconfiança</b></h5></a>');
linha('Quer ser mais autoconfiante? Então trabalhe no seu autoconhecimento.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/como-desenvolver-a-autoconfianca/">aqui</a> para saber mais.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/solucao-ou-problema/"><h5><b>Você é a solução ou o problema?</b></h5></a>');
linha('E se você, ao invés de pedir um emprego, começar a oferecer os seus serviços para ajudar as empresas?');
linha('Neste artigo eu proponho uma breve reflexão e uma mudança na maneira como você se apresenta.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/solucao-ou-problema/">aqui</a> para ler.');

linha('<a style="color: blue;" href="http://www.sidneileitao.com.br/busca-de-um-novo-emprego-a-abordagem-que-funciona/"><h5><b>Busca de um novo emprego. A abordagem que funciona.</b></h5></a> ');
linha('Para aumentar as suas chances na busca por oportunidades, você precisa adotar uma postura ativa, de protagonista e autor da própria história.');
linha('Clique <a style="color: blue;" href="http://www.sidneileitao.com.br/busca-de-um-novo-emprego-a-abordagem-que-funciona/">aqui</a> para entender como mudar.');
*/

exibe_catalogo($a_lista_livros);

echo '</div>';



}
//---------------------------------------------------------
//carrega o arquivo livros.csv para a array $a_lista_livros
function le_catalogo(&$a_lista_livros)
{
  $lines = file ('./itens/livros.csv');

  foreach ($lines as $line_num => $line)
  {

    if($line_num==0){
    }
      else
    {    $a_lista_livros[] = array(explode ( '|' , $line ));
       //$a_lista_livros[] = explode ( '|' , $line );
       //$a_livro = explode ( '|' , $line );
       //echo $a_livro[6];
       // print_r($a_livro);

    }

  }

  //print_r($a_lista_livros);

}


//--------------------------------------
function exibe_catalogo($a_lista_livros)
{

  $filtro="arte";

  foreach ($a_lista_livros as $line_num => $line)
  {

    $titulo = $line[0][0];
    $autor = $line[0][1];
    $capa = $line[0][12];
    $categoria = $line[0][2];
    $publicacao = $line[0][3];
    $editora = $line[0][4];
    $paginas = $line[0][5];
    $isbn = $line[0][6];
    $sumario = $line[0][10];

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

    echo '</div>';

    echo '  </div>';

  }


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
