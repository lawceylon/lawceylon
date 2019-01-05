@extends('main.app')
@section('headSection')
<style>
    div.a {
        background-color:#b8b894;
    }
    div.b {
        background-color:#d9b38c;
    }
    div.c {
        background-color:#d9b38c;
    }
    div.d {
        background-color:#b8b894;
    }
</style>
@endsection
@section('content')

<?php $formNamesa=array("Advanced Level Application","Ordinary Level Application","10","1","2","3","4","5"); ?>

<?php $formDescription=array("A/L Application Form for Private Applicant","O/L Application Form for Private Applicant","","","","","","",""); ?>

<?php $formNamesb=array("16001343","16001352","10","1","2","3","4","5"); ?>

<?php $formNamesc=array("16001343","16001352","10","1","2","3","4","5"); ?>

<?php $formNamesd=array("16001343","16001352","10","1","2","3","4","5"); ?>

<?php $index=-1; $index1=-1; $index2=-1; $index3=-1;?>

<div id="avt-category" class="clearfix">
    <div class="container">
        <div class="section services">
            <div class="section-title">
                <div class="title-content">
                    <h2>Download Forms</h2>
                    <p>You can download all your law related forms from one place</p>
                </div>
            </div>
            <div class="col-md-6 a">
                <div><h2><span class="glyphicon glyphicon-pencil"> Education</h2></div>
                <div class="row">
                    @foreach($formNamesa as $iforms)
                
                        <div class="col-sm-6 col-md-6">
                            <div class="category-avt">
                                <div class="category-icon">
                                    <img src="files/pdf-icon1.png" alt="images" class="img-responsive" height="70" width="70">
                                </div>
                                <h5>{{$formNamesa[++$index]}} </h5>
                                <ul>
                                    <li><a href="/files/{{$formNamesa[$index]}}.pdf" download><font color="blue" >Click Here To Download&nbsp;</font><span class="glyphicon glyphicon-download-alt"> </a></li>
                                    <li>{{$formDescription[$index]}}</li>
                                </ul>
                            </div><!-- category-avt -->	
                        </div>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="col-md-6 b">
                <div><h2><span class="glyphicon glyphicon-pencil"> Banking</h2></div>
                <div class="row">
                    @foreach($formNamesb as $iforms)
                
                        <div class="col-sm-6 col-md-6">
                            <div class="category-avt">
                                <div class="category-icon">
                                    <img src="files/pdf-icon1.png" alt="images" class="img-responsive" height="70" width="70">
                                </div>
                                <h5>{{$formNamesb[++$index1]}} </h5>
                                <ul>
                                    <li><a href="/files/{{$formNamesb[$index1]}}.pdf" download><font color="blue" >Click Here To Download&nbsp;</font><span class="glyphicon glyphicon-download-alt"> </a></li>
                                    
                                </ul>
                            </div><!-- category-avt -->	
                        </div>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="col-md-6 c">
                <div><h2><span class="glyphicon glyphicon-pencil"> Citizen's Registrations </h2></div>
                <div class="row">
                    @foreach($formNamesc as $iforms)
                        <div class="col-sm-6 col-md-6">
                            <div class="category-avt">
                                <div class="category-icon">
                                    <img src="files/pdf-icon1.png" alt="images" class="img-responsive" height="70" width="70">
                                </div>
                                <h5>{{$formNamesc[++$index2]}} </h5>
                                <ul>
                                    <li><a href="/files/{{$formNamesc[$index2]}}.pdf" download><font color="blue" >Click Here To Download&nbsp;</font><span class="glyphicon glyphicon-download-alt"> </a></li>
                                    
                                </ul>
                            </div><!-- category-avt -->	
                        </div>
                    @endforeach
                </div>
                <br>
            </div>
            <div class="col-md-6 d">
                <div><h2><span class="glyphicon glyphicon-pencil">Rights</h2></div>
                <div class="row">
                    @foreach($formNamesd as $iforms)
                        <div class="col-sm-6 col-md-6">
                            <div class="category-avt">
                                <div class="category-icon">
                                    <img src="files/pdf-icon1.png" alt="images" class="img-responsive" height="70" width="70">
                                </div>
                                <h5>{{$formNamesd[++$index3]}}  </h5>
                                <ul>
                                    <li><a href="/files/{{$formNamesd[$index3]}}.pdf" download><font color="blue" >Click Here To Download&nbsp;</font><span class="glyphicon glyphicon-download-alt"> </a></li>
                                    
                                </ul>
                            </div><!-- category-avt -->	
                        </div>
                    @endforeach
                </div>
                <br>
            </div>
        </div><!-- services -->	
    </div><!-- container -->
</div><!-- category-avt -->

@endsection