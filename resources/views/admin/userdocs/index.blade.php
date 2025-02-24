@extends('admin.layouts.admin')

@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hujjatlar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Barcha hujjatlar</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Hujjat nomi</th>
                    <th>Vaqti</th>
                    <th>Status</th>
                    <th>Fayllar</th>
                    <th>Bo'limlar</th>
                </tr>
                </thead>
                <tbody>


                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>






@endsection
