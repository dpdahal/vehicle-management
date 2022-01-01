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
                            <h2><i class="fa fa-car"></i> Manage Vehicle Types </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Types</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vehicleTypeData as $key=>$vType)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$vType->type}}</td>
                                                <td>

                                                    @if($vType->status==1)
                                                        <button class="btn-xs btn-success">
                                                            <i class="fa fa-check"></i> Active
                                                        </button>
                                                    @else
                                                        <button class="btn-xs btn-warning">
                                                            <i class="fa fa-times"></i> Inactive
                                                        </button>
                                                    @endif
                                                </td>

                                                <td>

                                                    <form method="POST"
                                                          action="{{route('manage-vehicle-type.destroy',[$vType->id])}}">

                                                        <a href="{{route('manage-vehicle-type.edit',$vType->id)}}"
                                                           class="btn-sm btn-success">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn-sm btn-danger"><i
                                                                class="fa fa-trash"
                                                                onclick="return confirm('are you sure');"></i>
                                                            Delete
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

@endsection
