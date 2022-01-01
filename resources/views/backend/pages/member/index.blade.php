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
                            <h2><i class="fa fa-users"></i> Member List
                                <a href="{{route('admin-member.create')}}" class="btn-info btn-sm">
                                    <i class="fa fa-hand-o-right"></i>
                                    Add Member</a>

                            </h2>
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

                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.n</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($memberData as $key=>$member)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->email}}</td>
                                            <td>{{$member->gender}}</td>

                                            <td>
                                                @if($member->image)
                                                    <img src="{{url($member->image)}}"
                                                         width="30" alt="">
                                                @endif
                                            </td>
                                            <td>

                                                <form method="POST"
                                                      action="{{route('admin-member.destroy',[$member->id])}}">
                                                    <a href="{{route('admin-member.show',$member->id)}}"
                                                       class="btn-sm btn-warning">
                                                        <i class="fa fa-eye"></i>
                                                    </a> <a href="{{route('admin-member.edit',$member->id)}}"
                                                            class="btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-sm btn-danger"><i
                                                            class="fa fa-trash"
                                                            onclick="return confirm('are you sure');"></i>
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

@endsection
