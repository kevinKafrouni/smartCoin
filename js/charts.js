// Sample data for the chart
const bardata = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri','Sat','Sun'],
    datasets: [{
      data: [10, 20, 5, 30, 15,20, 5],
      backgroundColor: '#3CB548',
    }]
  };

  // Chart configuration options
  const options = {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
      legend: {
        display: false // Set to false to hide the legend
      }
    }
  };

  // Create the bar chart
  const ctx = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(ctx, {
    type: 'bar',
    data: bardata,
    options: options
  });


  const pieoptions = {
    responsive: true,
    plugins: {
        legend: {
          position: 'bottom' // Place the legend at the bottom
        }
      }
  };

const piedata= {
    labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
    datasets: [{
      data: [10, 20, 5, 30, 15],
      backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange'],
      borderColor: 'white',
      borderWidth: 1
    }]
  };

  const cty = document.getElementById('pieChart').getContext('2d');
  const pieChart = new Chart(cty, {
    type: 'pie',
    data: piedata,
    options: pieoptions
  });

