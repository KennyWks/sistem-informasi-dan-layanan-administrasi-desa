// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
let data1, data2, data3, data4, data5, data6, data7;
data1 = $('.data1').data('sk1'); //sk tidak mampu
data2 = $('.data2').data('sk2'); //sk susunan k
data3 = $('.data3').data('sk3'); //sk kematian
data4 = $('.data4').data('sk4'); //sk domisili
data5 = $('.data5').data('sk5'); //sk usaha
data6 = $('.data6').data('sk6'); //sk jb ternak

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: ["SK Tidak Mampu", "SK Susunan Keluarga", "SK Kematian", "SK Domisili", "SK Usaha", "SK Penjualan Ternak"],
		datasets: [{
			data: [data1, data2, data3, data4, data5, data6, data7],
			backgroundColor: ['#4E73DF', '#1CC88A', '#F6C23E', '#5A5C69', '#E74A3B', '#36B9CC'],
			hoverBackgroundColor: ['#4E73DF', '#1CC88A', '#F6C23E', '#5A5C69', '#E74A3B', '#36B9CC'],
			hoverBorderColor: "rgba(234, 236, 244, 1)",
		}],
	},
	options: {
		maintainAspectRatio: false,
		tooltips: {
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
		},
		legend: {
			display: false
		},
		cutoutPercentage: 80,
	},
});
