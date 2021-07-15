google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var mensalBIData = google.visualization.arrayToDataTable([
    ['Mês', 'Receitas', 'Despesas'],
    ['Jan',  1400,      1350],
    ['Fev',  1350,      1300],
    ['Mar',  1900,       1100],
    ['Abr',  1030,      900]
  ]);

  var anualBIData = google.visualization.arrayToDataTable([
    ['Anos', 'Receitas', 'Despesas'],
    ['2017',  14000,      13500],
    ['2018',  13500,      13000],
    ['2019',  19000,       20000],
    ['2020',  10300,      9000]
  ]);

  var mensalOptions = {
    title: 'Controle Financeiro Mensal',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var anualOptions = {
    title: 'Controle Financeiro Anual',
    curveType: 'function',
    legend: { position: 'bottom' }
  };


  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(mensalBIData, mensalOptions);

  var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

  chart2.draw(anualBIData, anualOptions);

}

