<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(function(){
        
        var json_text = $.ajax({url: "getDadosGrafico.php", dataType:"json", async: false}).responseText;
        var json = eval("(" + json_text + ")");
        //var dados = new google.visualization.DataTable(json.dados);
        var dados = google.visualization.arrayToDataTable (json.dados);
        var configuracoes = json.config;
                              
        var options = {
        	hAxis: {	minValue: 0, textPosition:'none',
   					gridlines: {
     					color:'transparent'
   									},
					} ,
        	title : configuracoes['title'],
        	width :800,
         height: 500
          } ;      	
 
        // 'bhg' parâmetro para um gráfico horizontal agrupado de barras.
        // 'bvg' parâmetro para um gráfico vertical agrupado de barras.
        // Para este exemplo é irrelevante que seja um gráfico agrupado, pois temos apenas uma série.
        options.cht = 'bhg';
 
        //Alterando o range dos dados
        var min = 0;
        var max = 35000000;
        options.chds = min + ',' + max;
 
        //Ajustando os valores dos rótulos das colunas de acordo com o Range dos eixos
        options.chxr='1,0,35000000';
 
        // Agora as definições de configurações para exibir os rótulos das barras.
 
        //Define os valores como do tipo Numérico
        var tipoValor = 'N';
 
        // Definindo as cores dos Labels.
        var cor = '2c689f';
 
        // Precisamos indicar sobre qual coluna queremos o label.
        // Como neste exemplo só temos uma série,
        // a coluna de dados é a coluna 0.
        var indice = 0;
 
        // -1 indica que os labels serão apresentados sobre todas as colunas
        var mostrarBarras = -1;
 
        // 10 pixels tamanho da fonte dos Labels.
        var tamanhoFonte = 10;
 
        // Para este exemplo a prioridade não é importante, mas é um aprâmetro obrigatório
        var prioridade = 0;
        		         
        options.chm = [tipoValor, cor, indice, mostrarBarras, tamanhoFonte, prioridade].join(',');
 
        var chart = new google.visualization.BarChart(document.getElementById(configuracoes['nome_area']));
     
        //chart.draw(dados, json.config);
        chart.draw(dados, options);
        
      });
</script>  