<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/ico" />

    <title>AMS-BOC</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset('assets/css/nprogress.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/css/green.css') }}">
	
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <!-- JQVMap -->
     <link rel="stylesheet" href="{{ asset('assets/css/jqvmap.min.css') }} ">

    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('assets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>Asset Management System</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/img.jpg') }}" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

<!-- Page content -->
<div class="right_col" role="main">
  <!-- Top tiles -->
  
        <div class="row" style="display: inline-block;">
            
        </div>
 
  <!-- /Top tiles -->


  
  <div class="row">
    <!-- Card for Stocks Types Distribution -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="x_title">
                    <h2> Asset Distribution by Category </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div>
                        <canvas id="stockTypePieChart" class="pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card for Asset Types Distribution -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="x_title">
                    <h2> Usage Purpose of Assets </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div>
                        <canvas id="assetTypePieChart" class="pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Card for Asset Distribution by Branch -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h2 class="x_title">Asset Distribution by Branch</h2>
                <canvas id="assetsByBranchChart" class="bar-chart" ></canvas>
            </div>
        </div>
    </div>

    <!-- Card for Stock Levels by Category -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h2 class="x_title">Stock Levels by Category</h2>
                <canvas id="stockLevelsByCategoryChart" class="bar-chart" ></canvas>
            </div>
        </div>
    </div>
</div>




<div class="col-md-12 col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="x_title">
                <h2> Comparison of Asset Trends</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div>
                    <canvas id="lineChart"  width="300" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

   
<div class="row">
    <!-- Card for Branch Asset Distribution -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="x_title">
                    <h2>Branch Asset Distribution</h2>
                    <div class="clearfix"></div>
                </div>

<table id="assetsTable" class="display table-bordered">
    <thead>
        <tr>
            <th style="background-color: #bccad6;">Branch No</th> <!-- Light Gray Blue -->
            <th style="background-color: #8d9db6;">Asset No</th> <!-- Medium Gray Blue -->
            <th style="background-color: #667292;">Branch</th> <!-- Dark Gray Blue -->
            <th style="background-color: #b2c2bf;">Release To</th> <!-- Light Blue -->
            <th style="background-color: #b7d7e8;">Receive Status</th> <!-- Light Blue Green -->
            <th style="background-color: #87bdd8;">Action</th> <!-- Medium Blue Green -->
        </tr>
    </thead>
    <tbody>
        @foreach($assets as $asset)
        <tr>
            <td style="background-color: #bccad6;">{{ $asset->BranchNo }}</td>
            <td style="background-color: #8d9db6;">{{ $asset->AssetNo }}</td>
            <td style="background-color: #667292;">{{ $asset->Branch }}</td>
            <td style="background-color: #b2c2bf;">{{ $asset->ReleaseTo }}</td>
            <td style="background-color: #b7d7e8;">{{ $asset->ReceiveStatus }}</td>
            <td style="background-color: #87bdd8;">{{ $asset->Action }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>  
</div>  
</div>
<!-- /page content -->

   <!-- Correct Script Loading Order -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>



<script>
    // Data for the stock pie chart
    const labels1 = @json($Slabels);
    const data1 = @json($Sdata);     

    // Data for the asset pie chart
    const labels2 = @json($Alabels); 
    const data2 = @json($Adata);     

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
              "#8BC1F7", // --pf-v5-chart-color-blue-100
              "#519DE9", // --pf-v5-chart-color-blue-200
              "#06C",    // --pf-v5-chart-color-blue-300
              "#004B95", // --pf-v5-chart-color-blue-400
              "#002F5D"  // --pf-v5-chart-color-blue-500
            ],
            borderColor: [
              "#8BC1F7", // --pf-v5-chart-color-blue-100
              "#519DE9", // --pf-v5-chart-color-blue-200
              "#06C",    // --pf-v5-chart-color-blue-300
              "#004B95", // --pf-v5-chart-color-blue-400
              "#002F5D"  // --pf-v5-chart-color-blue-500
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
                    return `${value}%`;
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
              "#A2D9D9", // --pf-v5-chart-color-cyan-100
              "#73C5C5", // --pf-v5-chart-color-cyan-200
              "#009596", // --pf-v5-chart-color-cyan-300
              "#005F60", // --pf-v5-chart-color-cyan-400
              "#003737"  // --pf-v5-chart-color-cyan-500
            ],
            borderColor: [
              "#A2D9D9", // --pf-v5-chart-color-cyan-100
              "#73C5C5", // --pf-v5-chart-color-cyan-200
              "#009596", // --pf-v5-chart-color-cyan-300
              "#005F60", // --pf-v5-chart-color-cyan-400
              "#003737"  // --pf-v5-chart-color-cyan-500
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

</script>

<script>
    // Assuming you have already passed $branches, $quantitiesByBranch, $categories, and $quantitiesByCategory to this view
    const branches = @json($branches);
    const quantitiesByBranch = @json($quantitiesByBranch);
    const categories = @json($categories);
    const quantitiesByCategory = @json($quantitiesByCategory);
    
    console.log('Branches Data:', branches);
    console.log('Quantities by Branch:', quantitiesByBranch);
    console.log('Categories Data:', categories);
    console.log('Quantities by Category:', quantitiesByCategory);

 
// Chart for Asset Distribution by Branch
const ctx3 = document.getElementById('assetsByBranchChart').getContext('2d');
const assetsByBranchChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: branches,
        datasets: [{
            label: 'Total Quantity',
            data: quantitiesByBranch,
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
// Chart for Stock Levels by Category
const ctx4 = document.getElementById('stockLevelsByCategoryChart').getContext('2d');
const stockLevelsByCategoryChart = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: categories,
        datasets: [{
            label: 'Total Quantity',
            data: quantitiesByCategory,
            backgroundColor: [
              "#B2B0EA", // --pf-v5-chart-color-purple-100
              "#8481DD", // --pf-v5-chart-color-purple-200
              "#5752D1", // --pf-v5-chart-color-purple-300
              "#3C3D99", // --pf-v5-chart-color-purple-400
              "#2A265F"  // --pf-v5-chart-color-purple-500
            ],
            borderColor: [
              "#B2B0EA", // --pf-v5-chart-color-purple-100
              "#8481DD", // --pf-v5-chart-color-purple-200
              "#5752D1", // --pf-v5-chart-color-purple-300
              "#3C3D99", // --pf-v5-chart-color-purple-400
              "#2A265F"  // --pf-v5-chart-color-purple-500
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
    // "Trends in Asset Allocation" Line Chart Initialization
    let allocationDataSets = categories.map(category => {
        const categoryData = @json($assetAllocationTrends)
            .filter(item => item.AssetCategory === category)
            .map(item => item.total_quantity);

        return {
            label: category,
            data: categoryData,
            borderColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`,
            backgroundColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`,
            fill: true
        };
    });

    const ctxAllocation = document.getElementById('assetAllocationTrendsChart').getContext('2d');
    const allocationChart = new Chart(ctxAllocation, {
        type: 'line',
        data: {
            labels: allocationDates,
            datasets: allocationDataSets
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Quantity'
                    }
                }
            }
        }
    });
</script>


<script>
// Extract data for the three lines
const line1Labels = @json($line1Data->pluck('date'));
const line1Data = @json($line1Data->pluck('total'));
const line2Data = @json($line2Data->pluck('total'));
const line3Data = @json($line3Data->pluck('total'));

// Set up the line chart
const ctxLine = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: line1Labels, // Assuming all three datasets have the same dates
        datasets: [
            {
                label: 'Total Quantity',
                data: line1Data,
                borderColor: '#06C', // Blue
                backgroundColor: 'rgba(6, 108, 204, 0.2)', // Blue with transparency
                fill: true,
            },
            {
                label: 'Asset Categories Total',
                data: line2Data,
                borderColor: '#E12200', // Red
                backgroundColor: 'rgba(225, 34, 0, 0.2)', // Red with transparency
                fill: true,
            },
            {
                label: 'Asset Classes Total',
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

console.log('Line 1 Data:', line1Data);
console.log('Line 2 Data:', line2Data);
console.log('Line 3 Data:', line3Data);
</script>

//table
<script>
    $(document).ready(function() {
        $('#assetsTable').DataTable({
            "paging": true,       // Enable pagination
            "searching": true,    // Enable search functionality
            "ordering": true,     // Enable column sorting
            "info": true,         // Show information about the table
            "autoWidth": false,   // Disable automatic column width calculation
            "lengthChange": true  // Allow users to change the number of rows displayed
        });
    });
</script>


<script>
        $(document).ready(function() {
            console.log("jQuery UI loaded:", $.ui);
            $('.has-tooltip').tooltip();
        });
    </script>


   <script>
    $(document).ready(function() {
    console.log("Checking jQuery UI:", $.ui); // This should log an object if jQuery UI is loaded
    $('.has-tooltip').tooltip();
});

   </script>
  </body>
</html>
