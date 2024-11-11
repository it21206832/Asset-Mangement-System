document.addEventListener("DOMContentLoaded", function() {
    
    // Check if the data is correctly passed from PHP
    console.log('First Chart Labels:', labels1);
    console.log('First Chart Data:', data1);
    console.log('Second Chart Labels:', labels2);
    console.log('Second Chart Data:', data2);

    // Asset Types Distribution pie chart
    const ctx1 = document.getElementById('assetTypePieChart').getContext('2d');
    const assetTypePieChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Quantity',
                data: data1,
                backgroundColor: [
                    "#8BC1F7", "#519DE9", "#06C", "#004B95", "#002F5D"
                ],
                borderColor: [
                    "#8BC1F7", "#519DE9", "#06C", "#004B95", "#002F5D"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'right' },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    formatter: (value) => `${value}%`,
                    anchor: 'center',
                    align: 'center',
                    font: { weight: 'bold' }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

   // Usage Purpose of Assets  pie chart
    const ctx2 = document.getElementById('usageTypePieChart').getContext('2d');
    const usageTypePieChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: labels2,
            datasets: [{
                label: 'Quantity',
                data: data2,
                backgroundColor: [
                    "#A2D9D9", "#73C5C5", "#009596", "#005F60", "#003737"
                ],
                borderColor: [
                    "#A2D9D9", "#73C5C5", "#009596", "#005F60", "#003737"
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'right' },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    formatter: (value) => value,
                    anchor: 'center',
                    align: 'center',
                    font: { weight: 'bold' }
                }
            }
        },
        plugins: [ChartDataLabels]
    });


    console.log('Verified Assets Data:', verifiedcategories);
    console.log('Quantities :', quantitiesByCategory);
    console.log('Damaged Assets Data:', damagecategories);
    console.log('Quantities :', damagequantities);


    
    // verified assets bar chart
    const ctxbar1 = document.getElementById('verifiedAssetsChart').getContext('2d');
    const verifiedAssetsChart = new Chart(ctxbar1, {
        type: 'bar',
        data: {
            labels: verifiedcategories ,
            datasets: [{
                label: 'Total Quantity',
                data: quantitiesByCategory,
                backgroundColor: [
                "#BDE2B9", // --pf-v5-chart-color-green-100
                "#7CC674", // --pf-v5-chart-color-green-200
                "#4CB140", // --pf-v5-chart-color-green-300
                "#38812F", // --pf-v5-chart-color-green-400
                "#23511E"  // --pf-v5-chart-color-green-500
                ],
                borderColor: [
                "#BDE2B9", // --pf-v5-chart-color-green-100
                "#7CC674", // --pf-v5-chart-color-green-200
                "#4CB140", // --pf-v5-chart-color-green-300
                "#38812F", // --pf-v5-chart-color-green-400
                "#23511E"  // --pf-v5-chart-color-green-500
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    //Damage Assets bar chart
    const ctxbar2= document.getElementById('damageAssetChart').getContext('2d');
    const damageAssetChart= new Chart(ctxbar2, {
        type: 'bar',
        data: {
            labels: damagecategories,
            datasets: [{
                label: 'Total Quantity',
                data: damagequantities,
                backgroundColor: [
                "#E2B9E6", // Light purple
                "#D474B3", // Medium-light purple
                "#A84C8B", // Medium purple
                "#7E2A61", // Dark purple
                "#5D1E4E"  // Darker purple
            ],
            borderColor: [
                "#E2B9E6", // Light purple
                "#D474B3", // Medium-light purple
                "#A84C8B", // Medium purple
                "#7E2A61", // Dark purple
                "#5D1E4E"  // Darker purple
            ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

  

// Set up the line chart 

console.log('Line 1 Data:', line1Data);
console.log('Line 2 Data:', line2Data);
console.log('Line 3 Data:', line3Data);

const ctxLine = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: line1Labels, 
        datasets: [
            {
                label: 'Total Quantity',
                data: line1Data,
                borderColor: '#06C', // Blue
                backgroundColor: 'rgba(6, 108, 204, 0.2)', // Blue with transparency
                fill: true,
            },
            {
                label: ' Not Received Assets  ',
                data: line2Data,
                borderColor: '#E12200', // Red
                backgroundColor: 'rgba(225, 34, 0, 0.2)', // Red with transparency
                fill: true,
            },
            {
                label: ' Not  Verified Assets ',
                data: line3Data,
                borderColor: '#F0AB00', // Yellow
                backgroundColor: 'rgba(240, 171, 0, 0.2)', // Yellow with transparency
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
                    text: 'Date'
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

//table

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

//view button
document.querySelectorAll('.view-asset').forEach(button => {
    button.addEventListener('click', function() {
        // Get asset ID from the button's data attribute
        const assetNo = this.getAttribute('data-assetNo');

        // Fetch asset details from the server
        fetch(`/branchDashbord/showAssets/${assetNo}`)
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data); // Add this line
                if (data.status === 'success'&& data) {
                    // Populate the modal with asset details
                    document.getElementById('modalAssetNo').textContent = data.asset.AssetNo;
                    document.getElementById('modalAssetCategory').textContent = data.asset.AssetCategory;
                    document.getElementById('modalAssetClass').textContent = data.asset.AssetClass;
                    document.getElementById('modalBrand').textContent =data.asset.Brand;
                    document.getElementById('modalModel').textContent = data.asset.Model;
                    document.getElementById('modalSerialNumber').textContent = data.asset.SerialNumber;
                    document.getElementById('modalPurchaseDate').textContent = data.asset.PurchaseDate;
                    document.getElementById('modalProcurementDate').textContent = data.asset.ProcurementDate;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });
});


});
