@extends('admin.layout.master')

@section('content')

    <link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}"> 
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Basic</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            {{-- <div class="col-lg-6">
                
            </div> --}}
            <!--/.col-->

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <strong>{{$pagename}}</strong>
                    </div>
                    <div class="card-body card-block">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <div class="list-group">
                                    @foreach($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{$errors}}
                                    </li>
                                    
                                    @endforeach
                                    
                                </div>

                            </div>
                            @endif
                        <form action="{{route('pengunjung.update',$data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtnama_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtalamat_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Kendaraan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtkendaraan_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Polisi</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtplat_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtket_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jam Masuk</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtjammasuk_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jam Keluar</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtjamkeluar_peng" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                            </div>
                          
                                
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                
                        </form>
                    </div>
                    
                </div>

            
            </div>
                </div><!-- .content -->

                            <script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
                            <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script>

                            <script src="{{asset('public/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
                            <script src="{{asset('public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

                            <script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
                            <script src="{{asset('public/assets/js/main.js')}}"></script>
@endsection