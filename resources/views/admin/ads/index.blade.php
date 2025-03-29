@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Рекламаҳо</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item active">Рекламаҳо</li>
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
                        <h3 class="card-title">Рекламаҳо</h3>
                        {{--                        @can('permission.create')--}}
                        {{--                        @endcan--}}
                        <a href="{{ route('ads.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Илова кардан
                        </a>

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
                                <th>Унвон</th>
                                <th>Тавсиф</th>
                                <th>Файл</th>
                                <th>Статус</th>
                                <th>Давомнокӣ</th>
                                <th class="w-25">Амалҳо</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->description }}</td>

                                    <td>
                                    @php
                                        $fileUrl = asset('storage/' . $ad->file_path);
                                        $extension = pathinfo($ad->file_path, PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <!-- Rasm -->
                                            <img src="{{ $fileUrl }}" alt="Реклама" width="150">

                                    @elseif (in_array($extension, ['mp4', 'webm', 'ogg']))
                                        <!-- Video -->
                                            <video width="300" controls>
                                                <source src="{{ $fileUrl }}" type="video/{{ $extension }}">
                                                Сизнинг браузерингиз видеони қўлламайди.
                                            </video>

                                    @else
                                        <!-- Boshqa fayl -->
                                            <a href="{{ $fileUrl }}" target="_blank">Файлни кўриш</a>
                                        @endif

                                    </td>
                                    <td>{{ $ad->status }}</td>
                                    <td>{{ $ad->duration }}</td>


                                    <td class="text-center w-25">
                                        <form action="{{ route('ads.destroy',$ad->id) }}" method="post">
                                            @csrf
                                            <div class="btn-group">
                                                <a href="{{ route('ads.edit',$ad->id) }}" type="button"
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
