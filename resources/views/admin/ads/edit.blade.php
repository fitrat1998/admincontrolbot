@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Реклам таҳрирлаш</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ads.index') }}">Рекламаҳо</a></li>
                        <li class="breadcrumb-item active">Таҳрирлаш</li>
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
                        <h3 class="card-title">Реклам таҳрирлаш</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Сарлавҳа -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Сарлавҳа:</label>
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', $ad->title) }}">
                                @if($errors->has('title'))
                                    <span class="error invalid-feedback">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <!-- Тавсифи -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Тавсифи:</label>
                                <textarea name="description"
                                          class="form-control">{{ old('description', $ad->description) }}</textarea>
                                @if($errors->has('description'))
                                    <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <!-- Тасвир/видеоро бор кунед -->
                            <div class="mb-3 border-2 p-2">
                                <label for="file" class="form-label">Тасвир/видеоро бор кунед:</label>
                                <input type="file" name="file" class="form-control">
                                @if($errors->has('file'))
                                    <span class="error invalid-feedback">{{ $errors->first('file') }}</span>
                                @endif
                                @if($ad->file)
                                    <div class="mt-2">
                                        <p>Ҳозираги файл:</p>
                                        @if (Str::contains($ad->file, ['.jpg', '.jpeg', '.png', '.gif']))
                                            <img src="{{ asset('storage/' . $ad->file) }}" alt="Current Image"
                                                 style="max-width: 200px;">
                                        @else
                                            <a href="{{ asset('storage/' . $ad->file) }}" target="_blank">Ҳозираги
                                                файлро дидан</a>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Статус (Фаол/Ғайрифаол) -->
                            <div class="mb-3">
                                <label for="status" class="form-label d-block">Статус:</label>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                           value="{{ old('status', $ad->status) == 'active' ? 'active' : 'inactive' }}"
                                        {{ old('status', $ad->status) == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status" id="status-label">
                                        {{ old('status', $ad->status) == 'active' ? 'Фаол' : 'Ғайрифаол' }}
                                    </label>
                                </div>

                                @if($errors->has('status'))
                                    <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                @endif
                            </div>

                            <!-- Давомнокӣ (секунда) -->
                            <div class="mb-3">
                                <label for="duration" class="form-label">Давомнокӣ (секунда):</label>
                                <input type="number" name="duration" class="form-control"
                                       value="{{ old('duration', $ad->duration) }}" required>
                                @if($errors->has('duration'))
                                    <span class="error invalid-feedback">{{ $errors->first('duration') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Таҳрирлаш</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
