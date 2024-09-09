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
    <div class="tile_count">
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">2500</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Assets</span>
        <div class="count">{{ $totalStockCount }}</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Authorized or Verified Asset</span>
        <div class="count green">{{ $totalVerifiedCount }}</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Dispatch Assets</span>
        <div class="count">{{ $totalDispatchCount }}</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> IT Installation Assets</span>
        <div class="count">{{ $totalInstalledCount}}</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Branch Assets</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>
  </div>
  <!-- /Top tiles -->

  <div class="row">
  
    <!-- Pie Chart for Asset Types -->
    <div class="col-md-6 col-sm-12">
     <div class="bg-white">
      <div class="x_title">
        <h2>Asset Types Distribution</h2>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div>
        <canvas id="assetTypePieChart" class="pie-chart"></canvas>
        </div>
      </div>
    </div>
    </div>

    <div class="col-md-6 col-sm-12">
  <div class="bg-white">
    <div class="x_title">
      <h2> Depriciation of Assets </h2>
      <div class="clearfix"></div>
    </div>

    <div class="col-md-12 col-sm-12">
      <!-- Electronics Category with Damage -->
      <div>
        <p>Electronics</p>
        <div class="progress progress_sm">
          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="30" style="width: 30%;"></div> <!-- Total damage: 3 out of 10 (30%) -->
        </div>
      </div>

      <!-- Furniture Category with Damage -->
      <div>
        <p>Furniture</p>
        <div class="progress progress_sm">
          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="0" aria-valuenow="0" style="width: 0%;"></div> <!-- Total damage: 0 out of 35 (0%) -->
        </div>
      </div>

      <!-- Stationery Category with Damage -->
      <div>
        <p>Stationery</p>
        <div class="progress progress_sm">
          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="50" style="width: 50%;"></div> <!-- Total damage: 5 out of 10 (50%) -->
        </div>
      </div>

      <!-- Vehicle Category with Damage -->
      <div>
        <p>Vehicle</p>
        <div class="progress progress_sm">
          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="20" aria-valuenow="20" style="width: 20%;"></div> <!-- Total damage: 1 out of 5 (20%) -->
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
   
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> -->

    <!-- FastClick -->
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/js/nprogress.js') }}"></script>
    <!-- Chart.js -->
     <!-- <script src="{{ asset('assets/js/Chart.min.js') }}"></script>-->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- gauge.js -->
    <script src="{{ asset('assets/js/gauge.min.js') }}"></script>
    <!-- Bootstrap Progressbar -->
<script src="{{ asset('assets/js/bootstrap-progressbar.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('assets/js/icheck.min.js') }}"></script>

<!-- Skycons -->
<script src="{{ asset('assets/js/skycons.js') }}"></script>

<!-- Flot -->
<script src="{{ asset('assets/js/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.resize.js') }}"></script>

<!-- Flot Plugins -->
<script src="{{ asset('assets/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('assets/js/curvedLines.js') }}"></script>

<!-- DateJS -->
<script src="{{ asset('assets/js/date.js') }}"></script>

<!-- JQVMap -->
<script src="{{ asset('assets/js/jquery.vmap.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

<!-- Bootstrap Daterangepicker -->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/js/custom.min.js') }}"></script>

//pie chart

<script>
            // Get data from PHP
            const labels = @json($labels);
            const data = @json($data);

            // Create Pie Chart
            const ctx = document.getElementById('assetTypePieChart').getContext('2d');
            const assetTypePieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Quantity',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
                        }
                    }
                }
            });
        </script>

  </body>
</html>
