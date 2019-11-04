function array_unique(array)
{
    return array.filter(function(el, index, arr) {
    return index == arr.indexOf(el);
    });
}

function validar_pontuacao()
{
    var pergunta = 1;
    var questao =  1;
    var a_respostas = [];
    var msg_erros="As seguintes questões estão com pontuacoes repetidas: ";
    var retorno= "ok"
        
    for (var i = 1; i <= 72; i++)
    {
        nome_campo="resp_"+i;

        valor_campo = document.forms["formulario"][nome_campo].value;
                    
        a_respostas[questao] = valor_campo;
                  
        questao++;

        if(questao==5)
        {
            msg="Pergunta "+pergunta+":";

            for(var x = 1;x<=4;x++)
            {
                msg=msg+a_respostas[x]+" / ";
            }

            a_teste=array_unique(a_respostas);

            if(a_teste.length<4)
            {
                msg_erros=msg_erros+pergunta+ " / ";
                retorno="erro";
            }

            questao = 1;
                 
            pergunta++;
                  
            a_respostas = [];
        }

    }

    if (retorno=="erro")
    {
        alert(msg_erros);
        return false;
    }
}

function check(input) {
if (input.value != "1" && input.value != "3" && input.value != "4" && input.value != "6") {
   input.setCustomValidity("Valores aceitos: 1, 3, 4 ou 6.");
} else {
 input.setCustomValidity("");
  }
}


function mostrar_form(id,id2) {
alert("teste");
document.getElementById(id2).style.display=('none');
document.getElementById(id).style.display=('block');


function abre(arq)
{window.open(arq,'1','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=100, height=100');}

}