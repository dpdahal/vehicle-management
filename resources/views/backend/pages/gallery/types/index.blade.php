@extends('backend.master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-eye"></i> Show Gallery Types
                            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                <a href="{{route('gallery-types.create')}}" class="btn-sm btn-success">
                                    <i class="fa fa-plus"></i> Add Gallery Types</a>

                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        @include('backend.layouts.message')
                                    </div>
                                    <div class="row">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($galleryTypes as $key=>$types)

                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$types->title}}</td>
                                                    <td>

                                                        <form action="{{route('update-gallery-types-status')}}"
                                                              method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="criteria" value="{{$types->id}}">
                                                            @if($types->status==1)
                                                                <button name="enable" class="btn-xs btn-success">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            @else
                                                                <button name="disable" class="btn-xs btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </button>

                                                            @endif
                                                        </form>

                                                    </td>
                                                    <td>
                                                        @if($types->image)
                                                            <img src="{{url($types->image)}}"
                                                                 alt="" width="40">
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <form action="{{route('gallery-types.destroy',$types->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route('gallery-types.show',$types->id)}}"
                                                               class="btn-sm btn-info"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="{{route('gallery-types.edit',$types->id)}}"
                                                               class="btn-sm btn-primary" title="edit">
                                                                <i class="fa fa-edit"></i></a>
                                                            <button class="btn-sm btn-danger" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
            </div>
        </div>
    </div>
@endsection




