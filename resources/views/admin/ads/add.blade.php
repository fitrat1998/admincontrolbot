@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Реклам илова кардан</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ads.index') }}">Рекламаҳо</a></li>
                        <li class="breadcrumb-item active">Илова кардан</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Илова кардан</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Сарлавҳа:</label>
                                <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <span class="error invalid-feedback">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Тавсифи:</label>
                                <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
                                @if($errors->has('description'))
                                    <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="mb-3 border-2 p-2">
                                <label for="file" class="form-label">Тасвир/видеоро бор кунед:</label>
                                <input type="file" name="file" class="form-control" required>
                                @if($errors->has('file'))
                                    <span class="error invalid-feedback">{{ $errors->first('file') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">Илова кардан</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
