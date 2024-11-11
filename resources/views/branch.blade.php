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
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/branchCustom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/branchCustom.css') }}">

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

 <!-- Top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle " class="menu-toggle">
                <i class="fa fa-bars menu-icon"></i>
                <span class="branch-name">{{ __('Branch Dashboard') }} </span>
            </a>
        </div>
        <nav class="nav navbar-nav">
            <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <!-- Authentication Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                              <div>
                                  <strong>{{ Auth::user()->name }}</strong> - 
                                  <span>{{ Auth::user()->branch?->branch_name ?? 'Head Office' }}</span>
                              </div>
                           @csrf
                            <button type="submit" class="logout-button">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </li>              
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

<!-- Page content -->
<div class="right_col" role="main">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



  <!-- Top tiles -->
  
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
              <div class="col-md-2 col-sm-4 tile_stats_count">
                  <span class="count_top"><i class="fa fa-users" style="color: blue; font-size: 20px;"></i> 
                  <span style="color: blue; font-size: 18px; font-weight: bold;">Total Users</span>
                  <div class="count">{{ $totalUserCount }}</div> 
                  <span class="count_bottom">
                        <i class="{{ $percentageChange >= 0 ? 'green' : 'red' }}">
                            <i class="fa fa-sort-{{ $percentageChange >= 0 ? 'asc' : 'desc' }}"></i>
                            {{ number_format($percentageChange, 0) }}%
                        </i> 
                        From last Month
                  </span>
               </div>
                <div class="col-md-2 col-sm-4 tile_stats_count">
                    <span class="count_top"><i class="fa fa-archive" style="color: brown; font-size: 20px;"></i> 
                    <span style="color: brown; font-size: 18px; font-weight: bold;">Total Stocks</span>
                    <div class="count">{{ $totalStockCount }}</div>
                    <span class="count_bottom">
                        <i class="{{ $percentageChange >= 0 ? 'green' : 'red' }}">
                            <i class="fa fa-sort-{{ $percentageChange >= 0 ? 'asc' : 'desc' }}"></i>
                            {{ number_format($percentageChange, 0) }}%
                        </i> 
                        From last Month
                    </span>
                </div>

                <div class="col-md-2 col-sm-4 tile_stats_count">
                    <span class="count_top"><i class="fa fa-truck" style="color: orange; font-size: 20px;"></i> 
                    <span style="color: orange; font-size: 18px; font-weight: bold;">Total Assets</span>
                    <div class="count">{{ $totalAseetCount }}</div>
                    <span class="count_bottom">
                        <i class="{{ $percentageChange >= 0 ? 'green' : 'red' }}">
                            <i class="fa fa-sort-{{ $percentageChange >= 0 ? 'asc' : 'desc' }}"></i>
                            {{ number_format($percentageChange, 0) }}%
                        </i> 
                        From last Month
                    </span>
                </div>

                <div class="col-md-2 col-sm-4 tile_stats_count">
                    <span class="count_top"><i class="fa fa-shield" style="color: green; font-size: 20px;"></i> 
                    <span style="color: green; font-size: 15px; font-weight: bold;">Authorized Assets</span>
                    <div class="count green">{{ $totalVerifiedCount }}</div>
                    <span class="count_bottom">
                        <i class="{{ $percentageChange >= 0 ? 'green' : 'red' }}">
                            <i class="fa fa-sort-{{ $percentageChange >= 0 ? 'asc' : 'desc' }}"></i>
                            {{ number_format($percentageChange, 0) }}%
                        </i> 
                        From last Month
                    </span>
                </div>

                <div class="col-md-2 col-sm-4 tile_stats_count">
                    <span class="count_top"><i class="fa fa-desktop" style="color: tomato; font-size: 20px;"></i> 
                    <span style="color: tomato; font-size: 18px; font-weight: bold;"> IT Assets</span>
                    <div class="count">{{ $totalInstalledCount}}</div>
                    <span class="count_bottom">
                        <i class="{{ $percentageChange >= 0 ? 'green' : 'red' }}">
                            <i class="fa fa-sort-{{ $percentageChange >= 0 ? 'asc' : 'desc' }}"></i>
                            {{ number_format($percentageChange, 0) }}%
                        </i> 
                        From last Month
                    </span>
                </div>
            </div>
        </div>
 
  <!-- /Top tiles -->
            
  <div class="row">

    <!--  Asset Types Distribution pie chart -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="x_title">
                    <h2> Asset Distribution by Category </h2>
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

    <!-- Usage Purpose of Assets  pie chart -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="x_title">
                    <h2> Usage Purpose of Assets </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div>
                        <canvas id="usageTypePieChart" class="pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <!-- Verified Asset Distribution-->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h2 class="x_title"> Verified Asset Distribution </h2>
                <canvas id="verifiedAssetsChart" class="bar-chart" ></canvas>
            </div>
        </div>
    </div>

    <!-- Damage Assets Distribution -->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h2 class="x_title">Damage Assets Distribution</h2>
                <canvas id="damageAssetChart" class="bar-chart" ></canvas>
            </div>
        </div>
    </div>
</div>


 <!-- Line chart -->

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

<!-- Table -->   



<div class="row">   
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
            <th style="background-color: #519DE9;">Branch No</th> <!-- Light Gray Blue -->
            <th style="background-color: #52616b;">Asset No</th> <!-- Dark Slate Gray -->
            <th style="background-color: #1e2022;">Receive Status</th> <!-- Very Dark Gray -->
            <th style="background-color: #004B95;">Status</th> <!-- Light Blue -->
            <th style="background-color: #3b6978;">View</th> <!-- Teal Blue -->
            
        </tr>
    </thead>
    <tbody>
        @foreach($assets as $asset)
        <tr>
            <td >{{ $asset->BranchNo }}</td>
            <td >{{ $asset->AssetNo }}</td>
            <td >{{ $asset->ReceiveStatus }}</td>
            <td>
                @if($asset->Action == 'Unverified')
                    <span class="badge badge-danger">Unverified</span>
                @else
                    <span class="badge badge-success">Verified</span>
                @endif
            </td>
            <td>
            <!-- View button with a data attribute for the asset details -->
            <button type="button" class="btn btn-info view-asset" data-assetNo="{{ $asset->AssetNo }}" data-toggle="modal" data-target="#assetModal">
                View
            </button>
            </td>
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

<!-- Asset Details Modal -->
<div class="modal fade" id="assetModal" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assetModalLabel">Asset Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Asset No:</strong> <span id="modalAssetNo"></span></p>
                <p><strong>Asset Category:</strong> <span id="modalAssetCategory"></span></p>
                <p><strong>Asset Class:</strong> <span id="modalAssetClass"></span></p>
                <p><strong>Brand:</strong> <span id="modalBrand"></span></p>
                <p><strong>Model:</strong> <span id="modalModel"></span></p>
                <p><strong>Serial Number:</strong> <span id="modalSerialNumber"></span></p>
                <p><strong>Purchase Date:</strong> <span id="modalPurchaseDate"></span></p>
                <p><strong>Procurement Date:</strong> <span id="modalProcurementDate"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    

   <!-- Script  -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="{{ asset('assets/js/branch_custom.min.js') }}"></script>
<script src="{{ asset('assets/js/branch_custom.js') }}"></script>



<script>
    // Data for the asset pie chart
    const labels1 = @json($Slabels);
    const data1 = @json($Sdata);     

    // Data for the  usage pie chart
    const labels2 = @json($Alabels); 
    const data2 = @json($Adata);     

    // Data for the  verified assets bar chart
    const verifiedcategories = @json($verifiedcategories);
    const quantitiesByCategory = @json($quantitiesByCategory);

    // Data for the  damage assets bar chart
    const damagecategories= @json($damagecategories);
    const damagequantities = @json($damagequantities);

    // Extract data for the three lines
    const line1Labels = @json($line1Data->pluck('date'));
    const line1Data = @json($line1Data->pluck('total'));
    const line2Data = @json($line2Data->pluck('total'));
    const line3Data = @json($line3Data->pluck('total'));

   
</script>

  </body>

</html>