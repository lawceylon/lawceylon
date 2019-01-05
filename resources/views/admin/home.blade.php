@extends('admin.layouts.app')
@section('headSection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Good Morning<small>now time is --</small></h1>
        </section>
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Chart Demo</div>
                        <canvas id="myChart"></canvas>
                        <script>
                            let myChart = document.getElementById('myChart').getContext('2d');
                    
                            //Global Options
                    
                            Chart.defaults.global.defaultFontFamily = 'Lato';
                            Chart.defaults.global.defaultFontSize = 18;
                            Chart.defaults.global.defaultFontColor = #777;
                            
                    
                            let massPopChart = new Chart(myChart,{
                                type:'bar', //bar,horizontalaBar, pie ,line, douhhnut, radar,polarArea
                                data:{
                                    labels:['Boston','Worcester','Springfield','Lowell','Cambridge','New Bedford'],
                                    datasets:[{
                                        label:'Population',
                                        data:[
                                        617594,
                                        181045,
                                        153060,
                                        106519,
                                        105162,
                                        95072
                                        ],
                                        // backgroundColor:[
                                        //]we can add array of rgb colors here
                                        boderWidth:1,
                                        boderColor: 
                                    }]
                                },
                                options:{}
                    
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
                <canvas id="myChart"></canvas>
            </div>
            <script>
                let myChart = document.getElementById('myChart').getContext('2d');
        
                //Global Options
        
                Chart.defaults.global.defaultFontFamily = 'Lato';
                Chart.defaults.global.defaultFontSize = 18;
                Chart.defaults.global.defaultFontColor = '#777';
                
        
                let massPopChart = new Chart(myChart,{
                    type:'bar', //bar,horizontalaBar, pie ,line, douhhnut, radar,polarArea
                    data:{
                        labels:['Boston','Worcester','Springfield','Lowell','Cambridge','New Bedford'],
                        datasets:[{
                            label:'Population',
                            data:[
                            617594,
                            181045,
                            153060,
                            106519,
                            105162,
                            95072
                            ],
                            // backgroundColor:[
                            //]we can add array of rgb colors here
                            // boderWidth:1,
                            // boderColor: 
                        }]
                    },
                    options:{}
        
                })
             </script>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
        
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
                </div>
                <div class="box-body">
                Start creating your amazing application!
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footerSection')
@endsection