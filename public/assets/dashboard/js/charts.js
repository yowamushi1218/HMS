document.addEventListener('DOMContentLoaded', function () {
    function fetchAndDisplayDefaultCharts() {
        const fetchUrl = '/default-charts';
        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                const barChartLabels = data.default_bar_chart_data.map(item => item.eqp_name);
                const barChartValues = data.default_bar_chart_data.map(item => item.total_quantity);

                displayBarChart(barChartLabels, barChartValues);
            })
            .catch(error => {
                console.error('Error fetching default data:', error);
            });
    }

    function displayBarChart(labels, values) {
        const ctx = document.getElementById('barChart').getContext('2d');
        if (window.barChartInstance) {
            window.barChartInstance.destroy();
        }
        window.barChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Top Busies Schedules',
                    data: values,
                    backgroundColor: '#662C91',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
