@extends('admin.layouts.admin')

@section('content')

    <!-- Kontent Sarlavhasi (Sahifa sarlavhasi) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Филм илова кардан</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Саҳифаи асосӣ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('movies.index') }}">Филмҳо</a></li>
                        <li class="breadcrumb-item active">Илова кардан</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Контенти асосӣ -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Илова кардан</h3>
                    </div>

                    <div class="card-body">

                        <!-- Xatoliklarni chiqarish -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{ route('movies.update',$movie->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <!-- Рамз ворид кунед -->
                            <div class="mb-3">
                                <label for="code" class="form-label">Рамзро ворид кунед:</label>
                                <input type="number" name="code" class="form-control"
                                       value="{{ old('code', $movie->code) }}">
                                @error('code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Номи файл интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_name" class="form-label">Номи файлро интихоб кунед:</label>
                                <select id="file_name" name="file_name" class="form-select select2" required>
                                    @foreach($movies as $m)
                                        <option value="{{ $m->file_name }}"
                                            {{ old('file_name', $movie->file_name) == $m->file_name ? 'selected' : '' }}>
                                            {{ $m->file_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('file_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- ID-и файл интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_id" class="form-label">ID-и файлро интихоб кунед:</label>
                                <select id="file_id" name="file_id" class="form-select select2" required>
                                    @foreach($movies as $m)
                                        <option value="{{ $m->file_id }}"
                                            {{ old('file_id', $movie->file_id) == $m->file_id ? 'selected' : '' }}>
                                            {{ $m->file_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('file_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Ҳаҷми файлро интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_size" class="form-label">Ҳаҷми файлро интихоб кунед (KB):</label>
                                <select id="file_size" name="file_size" class="form-select select2" required>
                                    @foreach($movies as $m)
                                        <option value="{{ $m->file_size }}"
                                            {{ old('file_size', $movie->file_size) == $m->file_size ? 'selected' : '' }}>
                                            {{ $m->file_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('file_size')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Навъи MIME интихоб кунед -->
                            <div class="mb-3">
                                <label for="mime_type" class="form-label">Навъи MIME-ро интихоб кунед:</label>
                                <select id="mime_type" name="mime_type" class="form-select select2" required>
                                    <option value="">----</option>
                                    @foreach($movies as $m)
                                        <option value="{{ $m->mime_type }}"
                                            {{ old('mime_type', $movie->file_name) == $m->file_name ? 'selected' : '' }}>
                                            {{ $m->file_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mime_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Забонро интихоб кунед -->
                            <div class="mb-3">
                                <label for="lang" class="form-label">Забонро интихоб кунед:</label>
                                <select id="lang" name="language_code" class="form-select select2" required>
                                    <option value="">----</option>
                                    <option value="ru" {{ $movie->language_code == 'ru' ? 'selected' : '' }}>Русӣ
                                    </option>
                                    <option value="tj" {{ $movie->language_code == 'tj' ? 'selected' : '' }}>Тоҷикӣ
                                    </option>
                                    <option value="uz" {{ $movie->language_code == 'uz' ? 'selected' : '' }}>Ӯзбекӣ
                                    </option>
                                    <option value="en" {{ $movie->language_code == 'en' ? 'selected' : '' }}>Англисӣ
                                    </option>
                                </select>

                                @error('lang')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Нигоҳ доштан</button>
                                <a href="{{ route('movies.index') }}" class="btn btn-danger float-left">Бекор
                                    кардан</a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
