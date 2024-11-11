document.addEventListener("DOMContentLoaded", function() {

// Check if the data is correctly passed from PHP
console.log('First Chart Labels:', labels1);
console.log('First Chart Data:', data1);
console.log('Second Chart Labels:', labels2);
console.log('Second Chart Data:', data2);
       

// Get context for the stock pie chart
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
                    return  `${value}%`;
                },
                anchor: 'center',
                align: 'center',
                font: {
                    weight: 'bold'
                }
            }
        }
    },
    plugins: [ChartDataLabels] // Add the datalabels plugin here
});

// Get context for the asset doughnut chart
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
                    return value;
                },
                anchor: 'center',
                align: 'center',
                font: {
                    weight: 'bold'
                }
            }
        }
    },
    plugins: [ChartDataLabels] // Add the datalabels plugin here
});


//line chart

console.log('Line 1 Data:', line1Data);
console.log('Line 2 Data:', line2Data);
console.log('Line 3 Data:', line3Data);

// Set up the line chart
const ctxLine = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: line1Labels, // Assuming all three datasets have the same dates
        datasets: [
            {
                label: 'Stock Quantities',
                data: line1Data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            },
            {
                label: 'Damage Assets Count',
                data: line2Data,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
            },
            {
                label: 'Authorized Assets',
                data: line3Data,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: 'Quantity / Count'
                }
            }
        }
    }
});

$(document).ready(function() {
    $('#assetsTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "lengthChange": true,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Positions elements at top and bottom
        "initComplete": function() {
            // Style the search input and 'Show entries' dropdown
            $('#assetsTable_filter input').addClass('form-control').attr('placeholder', 'Search assets...').css({
                'width': '200px',
                'display': 'inline-block',
                'margin-left': '10px'
            });
            $('#assetsTable_length select').addClass('form-control').css({
                'width': '80px',
                'display': 'inline-block'
            });
        }
    });

    // Add custom spacing between pagination buttons
    $('.dataTables_paginate').css({
        'margin-top': '20px'
    });
});

document.querySelectorAll('.view-asset').forEach(button => {
    button.addEventListener('click', function() {
        // Get asset ID from the button's data attribute
        const assetId = this.getAttribute('data-id');

        // Fetch asset details from the server
        fetch(`/dashboard/showAssets/${assetId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Populate the modal with asset details
                    document.getElementById('modalItemName').textContent = data.asset.item_name;
                    document.getElementById('modalItemCode').textContent = data.asset.item_code;
                    document.getElementById('modalItemType').textContent = data.asset.item_type;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });
});


});