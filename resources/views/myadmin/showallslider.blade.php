@extends('myadmin.adminmaster')
@section('title','Slider')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Slider Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Slider</a></li>
        <li class="active">Show Slider Item</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th style="text-align: center;" width="6%">Number</th>
                  <th style="text-align: center;" width="15%">Title</th>
                  <th style="text-align: center;" width="20%">Description</th>
                  <th style="text-align: center;" width="30%">Image</th>
                  <th style="text-align: center;" width="15%">Button_link</th>
                  <th style="text-align: center;" width="7%">Update</th>
                  <th style="text-align: center;" width="7%">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($sliders as $slider)
              <?php $i++;?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$slider->title}}</td>
                  <td>{{$slider->description}}</td>
                  <td style="text-align: center;"><img src="{{URL::asset('img/'.$slider->image)}}" height="100" width="100"></td>
                  <td>{{$slider->button_link}}</td>
                  <td>
                     <a href="{{route('sliders.edit',$slider->id)}}"><button class="btn btn-primary">Edit</button></a>
                  </td>
                  <td>
                    <form method="POST" action="{{action('SliderController@destroy',['id'=>$slider->id])}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                       <span onclick = "return confirm('Are You Sure To Delete ?')" href=""><button class="btn btn-danger">Delete</button></span>
                    </form>
                  </td>
                </tr>
               @endforeach
                </tbody>             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('footer')
@include('myadmin.lib.fortable')
@endsection
