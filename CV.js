const config = {
    type: 'polarArea',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'CV.js Polar Area Chart'
        }
      }
    },
  };

const labels = ['Red', 'Orange', 'Yellow', 'Green', 'Blue'];
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Dataset 1',
      data: Utils.numbers(NUMBER_CFG),
      backgroundColor: [
        Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
        Utils.transparentize(Utils.CHART_COLORS.orange, 0.5),
        Utils.transparentize(Utils.CHART_COLORS.yellow, 0.5),
        Utils.transparentize(Utils.CHART_COLORS.green, 0.5),
        Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
      ]
    }
  ]
};