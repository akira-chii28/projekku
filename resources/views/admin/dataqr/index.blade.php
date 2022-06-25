@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
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
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    @if(session()->get('sukses'))
                        <div class="alert alert-success">
                            {{session()->get('sukses')}}
                        </div>

                    @endif
                    <div class="card-header">
                        <strong class="card-title">{{$pagename}}</strong>
                        @can('tugas-create')
                        <a href="{{route('tugas.create')}}" class="btn btn-primary pull-right">Tambah </a>
                        @endcan
                    </div>
                    <br>
       </div>
</div>





<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="{{ asset('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/quagga/quagga.js') }}"></script>
<script src="{{ asset('public/assets/js/instascan.min.js') }}"></script>
<script src="{{ asset('public/assets/js/sweetalert2.all.js') }}"></script>
<script>
    $(function () {
        $('#id').keypress(function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var id = $(this).val();
                new_presensi(id);
            }
        });
        var new_presensi = function (content) {
            $.ajax({
                url: '{{ route('dataqr-store') }}',
                type: 'POST',
                data: {
                    id: content,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    //var json = $.parseJSON(result[0]);
                    swal({
                        type: result[0].type,
                        title: result[0].message,
                        showConfirmButton: true,

                    });

                }
            });
        }});
        </script>


        <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        if (content == null) {
                console.log('no barcode')
            } else {
                new_presensi(content)
                
            }
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
          
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      }); </script>
 







<script src="{{asset('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('public/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

@endsection
