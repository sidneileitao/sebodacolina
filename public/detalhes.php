<?php
session_start();
include_once('./common/layout_html.php');

inclui_cabecalho_clean('Sebo da Colina - livros');

$a_catalogo = $_SESSION['catalogo'];

$isbn=$_GET["isbn"];

echo '<div class="row">';

echo '<div class="col s12 m4 l3"> ';
echo '<img src="./capas/'.$a_catalogo[$isbn]["imagem"].'" style="width:90%; display: block;  margin-top:20px;margin-left: 0;  margin-right: 0">';
echo '</div>';

echo '<div class="col s12 m8 l9">';
echo '<p style="color:blue;font-size:1.5rem; margin:1rem 0rem 0;line-height:1.5rem;letter-spacing:0.03rem;text-transform: uppercase;">' . $a_catalogo[$isbn]["Título"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:1.5rem;">Autor:&nbsp' . ucwords(strtolower($a_catalogo[$isbn]["Autor"])) . '</p>';
echo '<br>';

echo '<p style="color:blue;margin:1rem 0rem 0;line-height:1rem;letter-spacing:0.1rem;font-weight:lighter;">SINOPSE'.'</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:1.5rem;">' . $a_catalogo[$isbn]["Sumário"] . '</p>';
echo '<br>';
echo '<p style="color:blue;margin:1rem 0rem 0;line-height:1rem;letter-spacing:0.1rem;font-weight:lighter;">DETALHES DO LIVRO'.'</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Ano de edição:&nbsp'.$a_catalogo[$isbn]["Data de publicação"] . '</p>';

echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Assunto:&nbsp' . $a_catalogo[$isbn]["Categorias"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Editora:&nbsp' . $a_catalogo[$isbn]["Editora"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">ISBN:&nbsp' . $a_catalogo[$isbn]["ISBN"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Páginas:&nbsp' . $a_catalogo[$isbn]["Páginas"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Peso:&nbsp' . $a_catalogo[$isbn]["peso"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Altura:&nbsp' . $a_catalogo[$isbn]["tam_altura"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Largura:&nbsp' . $a_catalogo[$isbn]["tam_largura"] . '</p>';
echo '<p style="color:#666666;font-size:1rem;margin:1rem 0rem 0;line-height:0.5rem;">Preço:&nbsp' . $a_catalogo[$isbn]["preço"] . '</p>';


echo '</div>';
echo '</div>';

inclui_rodape_clean();


?>
