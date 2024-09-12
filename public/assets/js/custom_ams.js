
document.addEventListener('DOMContentLoaded', function () {
    console.log('Asset Labels:', labels2);
    console.log('Asset Data:', data2);

    const ctx2 = document.getElementById('assetTypePieChart').getContext('2d');
    const anotherDoughnutChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels2,
            datasets: [{
                label: 'Quantity',
                data: data2,
                backgroundColor: [
                    "#34495E",
                    "#B370CF",
                    "#CFD4D8",
                    "#36CAAB",
                    "#49A9EA"
                ],
                borderColor: [
                    "#34495E",
                    "#B370CF",
                    "#CFD4D8",
                    "#36CAAB",
                    "#49A9EA"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const label = tooltipItem.label || '';
                            const value = tooltipItem.raw;
                            return `${label}: ${value}`;
                        }
                    }
                },
                datalabels: {
                    color: '#000',
                    font: {
                        weight: 'bold'
                    },
                    formatter: (value, context) => {
                        return `${context.chart.data.labels[context.dataIndex]}: ${value}`;
                    }
                }
            }
        }
    });
});
