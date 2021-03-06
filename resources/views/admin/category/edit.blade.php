@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Category Edit</h1>
    </section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        @include('admin.includes.messages')
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('category.update',$categories->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}  
            <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="form-group">
                        <label for="name">Category Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tag Title" value="{{$categories->name }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Category Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$categories->slug }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
                    </div>    
                </div> 
            </div>
            <!-- /.box-body -->
        </form>
        <!-- Main content -->
        <!-- /.content -->
    </div>
    <!-- /.box --> 
</div>
<!-- /.content-wrapper -->
@endsection