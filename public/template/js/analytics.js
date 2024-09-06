
<!-- ============================================================== -->
<!-- DADO01 -->
<!-- ============================================================== -->


var crescimento = (c.totalsForAllResults["ga:organicSearches"] - d.totalsForAllResults["ga:organicSearches"]);
var crescimentoAlcance = parseFloat(c.totalsForAllResults["ga:percentNewSessions"]).toFixed(2);
  document.getElementById("organico").innerHTML = c.totalsForAllResults["ga:organicSearches"];
if (crescimento < 0){
  document.getElementById("crescimento").innerHTML = "+" + crescimento;
}else if (crescimento > 0){
  document.getElementById("crescimento").innerHTML = crescimento;
}else{
  document.getElementById("crescimento").innerHTML = "0 novos";
}
document.getElementById("tempoAcessos").innerHTML = parseFloat(c.totalsForAllResults["ga:avgTimeOnPage"]).toFixed(2) + "s";
var aux = crescimentoAlcance.concat("%");
document.getElementById("crescimentoAlcance").innerHTML = aux;



<!-- ============================================================== -->
<!-- GRÁFICO1 -->
<!-- ============================================================== -->
document.getElementById("acessosHoje").innerHTML = a[7].pageViews;
// console.log(a[].visitors);
var rotuloG1 = [];
for(var i = 0;i < a.length; i++){
  var dt = new Date(a[i].date.date);
  rotuloG1.push(dt.getDate()+'/'+(dt.getMonth()+1));
}

var visitantes = [];
for(var i = 0;i < a.length; i++)
visitantes.push(a[i].visitors);

var visualizacoes = [];
for(var i = 0;i < a.length; i++)
visualizacoes.push(a[i].pageViews);

var graficoVisitantes = document.getElementById("visitantes").getContext('2d');
var g1 = new Chart(graficoVisitantes, {
  type: 'line',
  data:
  {
    labels: rotuloG1,
    datasets: [
      {
        label: "Visitantes",
        data: visitantes,
        backgroundColor: '#3c3e96',
        borderColor: '#3c3e96',
        fill: false
      },
      {
        label: "Visualizações",
        data: visualizacoes,
        backgroundColor: '#ed2f33',
        borderColor: '#ed2f33',
        fill: false
      }
    ]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  }
});

<!-- ============================================================== -->
<!-- GRÁFICO2 -->
<!-- ============================================================== -->
// '#D2AE6D',
// '#e6ab41',
// '#f5a71b',
// 'rgb(255, 205, 86)',
// '#e1e624',
// '#fcfa00'

// 'rgb(75, 192, 192)',
var cores = [
  '#ed2f33',
  '#3c3e96',
  'rgb(54, 162, 235)',
  '#33E1E1',
  'rgb(75, 192, 192)',

]
  var pagina = [];
  console.log(b.length);
  for(var i = 0;i < b.length; i++){
      pagina.push(b[i].url);
  }

  var dadosPagina = [];
  for(var i = 0;i < b.length; i++){
    dadosPagina.push(b[i].pageViews);

  }
  var dadosg2 = {
    labels: pagina,
    datasets: [
      {
        label: pagina,
        data: dadosPagina,
        backgroundColor:cores,
        borderColor: '#fff',
        fill: false
      }

    ]
  }
  var graficoPaginas = document.getElementById("paginas").getContext('2d');
  var g2 = new Chart(graficoPaginas, {

    type: 'pie',
    data: dadosg2,
    options: {
      elements: {
        rectangle: {
          borderWidth: 2,
        }
      },legend: {
        position: 'right',
      }
    }

  });
