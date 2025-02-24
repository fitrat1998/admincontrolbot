@extends('admin.layouts.admin')

@section('content')
    <!-- Контенти Сарлавҳа (Саҳифаи сарлавҳа) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статистика</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item active">Статистика</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Контенти асосӣ -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Статистика</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Ҷадвали маълумотҳо -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Шумораи истифодабарандагон</th>
                                <th>Шумораи истифодабарандагони нав</th>
                                <th>Шумораи паёмҳо</th>
                            </tr>

{{--                            {{ dd($stats) }}--}}

                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $stats->total_users ?? 0 }}</td>
                                <td>{{ $stats->new_chat_members ?? 0 }}</td>
                                <td>{{ $stats->messages_sent ?? 0 }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
