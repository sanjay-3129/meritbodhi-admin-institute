const labels_yg = [2001,2002,2003,2004,2006,2007,2008];
const data_yg = {
  labels: labels_yg,
  datasets: [{
    label: 'Income',
    data: [100,400,300,50,30,500,400],
    borderColor: 'rgb(35, 31, 242)',
    tension: 0.0,
    fill:false
  }]
};
new Chart("incomeAsPerYear", {
	 type: 'line',
	 data: data_yg,
});


//rating doughnut chart 
const data_rat = {
  //labels
  labels: ['1★', '2★', '3★', '4★', '5★'],
  datasets: [
    {
      label: 'Ratings',
      //members list per rating
      data: [300, 50, 100,10,10],
      //
      backgroundColor: ['rgb(255, 90, 124)',
                        'rgb(255, 178, 52)',
                        'rgb(255, 216, 52)',
                        'rgb(173, 214, 51)',
                        'rgb(159, 192, 90)']
    }
  ]
};

new Chart("ratingDougnetChart",{
    type: 'doughnut',
    data: data_rat,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
        },
        title: {
          display: true,
          text: 'Ratings'
        }
      }
    },
});

//purchases as per week 
/*
const data_purchase_week = {
  labels: ['Week 1','Week 2','Week 3','Week 4'],
  datasets: [{
    label: 'Purchases',
    data: [2,3,4,2,1],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)'
    ],
    borderWidth: 1
  }]
};

new Chart("Purchase_by_week_bar",{
 type: 'bar',
  data: data_purchase_week,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};*/