$(document).ready(function() {
    // Initialize the stock pie chart
    const ctx1 = document.getElementById('stockTypePieChart').getContext('2d');
    const stockTypePieChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Quantity',
                data: data1,
                backgroundColor: [
                    "#455C73", 
                    "#483D8B", 
                    "#191970", 
                    "#000080", 
                    "#002366"
                ],
                borderColor: [
                    "#455C73", 
                    "#483D8B", 
                    "#191970", 
                    "#000080", 
                    "#002366"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: '#333', // Optional: Customize legend text color
                    },
                    title: {
                        display: true, // Display the legend title
                        text: 'Stock Types', // Custom legend title
                        color: '#000', // Optional: Customize title color
                        font: {
                            size: 14, // Customize title font size
                            weight: 'bold' // Customize title font weight
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    formatter: (value, context) => {
                         // Calculate the total sum of all data points
                         const total = context.chart.data.datasets[0].data.reduce((acc, val) => acc + Number(val), 0);
                        // Calculate the percentage
                        const percentage = ((value / total) * 100).toFixed(1); // Adjust decimal places as needed
                        // Return the formatted percentage string
                        return `${percentage}%`;
                    },
                    anchor: 'center',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // Initialize the asset doughnut chart
    const ctx2 = document.getElementById('assetTypePieChart').getContext('2d');
    const assetTypePieChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels2,
            datasets: [{
                label: 'Quantity',
                data: data2,
                backgroundColor: [
                    "#36A2EB", 
                    "#87CEEB", 
                    "#4169E1", 
                    "#4682B4", 
                    "#1E90FF"
                ],
                borderColor: [
                    "#36A2EB", 
                    "#87CEEB", 
                    "#4169E1", 
                    "#4682B4", 
                    "#1E90FF"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: '#333', // Optional: Customize legend text color
                    },
                    title: {
                        display: true, // Display the legend title
                        text: 'Asset Types', // Custom legend title
                        color: '#000', // Optional: Customize title color
                        font: {
                            size: 14, // Customize title font size
                            weight: 'bold'// Customize title font weight
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    formatter: (value, context) => {
                         // Calculate the total sum of all data points
                         const total = context.chart.data.datasets[0].data.reduce((acc, val) => acc + Number(val), 0);
                        // Calculate the percentage
                        const percentage = ((value / total) * 100).toFixed(1); // Adjust decimal places as needed
                        // Return the formatted percentage string
                        return `${percentage}%`;
                    },
                    anchor: 'center',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // Initialize DataTable
    $('#assetsTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "lengthChange": true
    });
});
