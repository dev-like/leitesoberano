/*
* Autor: Rodrigo Rocha Ramalho
* Version: 1.3
* Data da Versão: 27.02.2018
* Função para flutuar o Label(rótulo) em cima do Input(caixa de texto)
* Necessário que o Label esteja indicando o "for" para o Input
* Necessário que o "padding" o "margin" sejam definidos como pretende-se
*/

/*
* Histórioco:
* Version: 1.2
* Data da Versão: 28.08.2014
*/

$.jFlowLabel = function(dados)
{
	/*
	* Estrutura dos dados
	* id{string} = id do input
	* input{decimal} = label sobreposto
	* output{decimal} = label normal
	* icolor{hexadecimal} = cor do label sobreposto
	* ocolor{hexadecimal} = cor do label normal
	* icursor{hexadecimal} = cor do label sobreposto
	* ocursor{hexadecimal} = cor do label normal
	* texto{string} = texto padrão para sobrepor
	* tempo{decimal} = tempo de transição
	*/

	var id = (typeof dados == "object") ? dados.id : dados;

	// Valores para sobreposição
	var input   = (typeof dados == "object" && dados.input   != undefined) ? dados.input   : '100%';
	var icolor  = (typeof dados == "object" && dados.icolor  != undefined) ? dados.icolor  : '#aaa';
	var icursor = (typeof dados == "object" && dados.icursor != undefined) ? dados.icursor : 'text';

	// Valores para recolhimento
	var output  = (typeof dados == "object" && dados.output  != undefined) ? dados.output  : '0%';
	var ocolor  = (typeof dados == "object" && dados.ocolor  != undefined) ? dados.ocolor  : 'inherit';
	var ocursor = (typeof dados == "object" && dados.ocursor != undefined) ? dados.ocursor : 'pointer';

	// Valores de transição informações em porcentagem
	var i = 'translatey('+input+')';
	var o = 'translatey('+output+')';
	var t = (typeof dados == "object" && dados.texto != undefined) ? dados.texto : "";
	var r = (typeof dados == "object" && dados.tempo != undefined) ? 'all '+(dados.tempo/1000)+'s linear' : 'all .2s linear';

	//Valores para o elemento de foco
	var element   = (typeof dados == "object" && dados.element != undefined) ? dados.element : 'input';

	var transInTudo =
	{'-webkit-transform':i,'-moz-transform':i,'-ms-transform':i,'-o-transform':i,'transform':i,'color':icolor,'display':'inline-block',
	'-webkit-transition':r,'-moz-transition':r,'-ms-transition':r,'-o-transition':r,'transition':r,'cursor':icursor}

	var transOutTudo =
	{'-webkit-transform':o,'-moz-transform':o,'-ms-transform':o,'-o-transform':o,'transform':o,'color':ocolor,'display':'inline-block',
	'-webkit-transition':r,'-moz-transition':r,'-ms-transition':r,'-o-transition':r,'transition':r,'cursor':ocursor}

	$("label[for=\""+id+"\"]").css(transInTudo);

	$(element+"#"+id).focusin(function(event){ $("label[for=\""+id+"\"]").css(transOutTudo); });
	$(element+"#"+id).focusout(function(event){ if($(this).val()==t) $("label[for=\""+id+"\"]").css(transInTudo); });
}
