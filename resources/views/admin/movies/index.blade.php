@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Филмҳо</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item active">Филмҳо</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('get-updates') }}" class="btn btn-success btn-sm float-left">
                            <span class="fas fa-plus-circle"></span>
                            Навсозӣ кардан
                        </a>
                        <a href="{{ route('movies.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Илова кардан
                        </a>
                        {{--                        @can('permission.create')--}}
                        {{--                        @endcan--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               role="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Номи филм</th>
                                <th>Рамзи филм</th>
                                <th>Рамзи забон</th>
                                <th>Андозаи филм</th>
                                <th>Формат</th>
                                <th class="w-25">Амалҳо</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $movie->file_name }}</td>
                                    <td>{{ $movie->code }}</td>
                                    <td>{{ $movie->language_code }}</td>
                                    <td>{{ round($movie->file_size / (1024 * 1024)) }} mb</td>
                                    <td>{{ $movie->mime_type }}</td>
                                    <td class="text-center w-25">
                                        <form action="{{ route('movies.destroy',$movie->id) }}" method="post">
                                            @csrf
                                            <div class="btn-group">
                                                <a href="{{ route('movies.edit',$movie->id) }}" type="button"
                                                   class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
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
