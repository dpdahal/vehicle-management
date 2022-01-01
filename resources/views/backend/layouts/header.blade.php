@section('header')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Panel </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="{{url('backend-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('backend-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('backend-assets/ckeditor/contents.css')}}">
    <link rel="stylesheet" href="{{url('backend-assets/tagsinput/src/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('backend-assets/select2/css/select2.css')}}">
    <!-- bootstrap-datetimepicker -->
    <link href="{{url('backend-assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
          rel="stylesheet">
    <link href="{{url('backend-assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}"
          rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{url('backend-assets/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/custom/custom.css')}}" rel="stylesheet">

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">

@endsection
