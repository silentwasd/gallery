var options = {
	chart: {
		height: 301,
		type: "area",
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		width: 3,
	},
	series: [
		{
			name: "Sales",
			data: [10, 40, 17, 40, 20, 35, 20, 10, 46, 18, 30, 29],
		},
		{
			name: "Revenue",
			data: [6, 8, 25, 20, 55, 20, 32, 10, 27, 20, 20, 45],
		},
	],
	grid: {
		borderColor: "#dfd6ff",
		strokeDashArray: 5,
		xaxis: {
			lines: {
				show: true,
			},
		},
		yaxis: {
			lines: {
				show: false,
			},
		},
	},
	xaxis: {
		categories: [
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
			"Jul",
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec",
		],
	},
	yaxis: {
		labels: {
			show: false,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val + "k";
			},
		},
	},
	colors: ["#e22132", "#e93443", "#f1505d", "#f3737e", "#f2a1a8", "#f6bcc1", "#fbd7da", "#fff2f3"],
};

var chart = new ApexCharts(document.querySelector("#salesGraph"), options);

chart.render();
