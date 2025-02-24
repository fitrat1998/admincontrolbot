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

                        <form action="{{ route('movies.store') }}" method="POST">
                            @csrf

                            <!-- Рамз ворид кунед -->
                            <div class="mb-3">
                                <label for="code" class="form-label">Рамзро ворид кунед:</label>
                                <input type="number" name="code" class="form-control">
                            </div>

                            <!-- Номи файл интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_name" class="form-label">Номи файлро интихоб кунед:</label>
                                <select id="file_name" name="file_name" class="form-select select2" required>
                                    <option value="">----</option>

                                    @if(!empty($messages))
                                        @foreach($messages as $m)
                                            @if(isset($m->channel_post->video))
                                                <option value="{{ $m->channel_post->video->file_name }}">
                                                    {{ $m->channel_post->video->file_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif

                                </select>
                            </div>

                            <!-- ID-и файл интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_id" class="form-label">ID-и файлро интихоб кунед:</label>
                                <select id="file_id" name="file_id" class="form-select select2" required>
                                    <option value="">----</option>

                                    @if(!empty($messages))
                                        @foreach($messages as $m)
                                            @if(isset($m->channel_post->video))
                                                <option value="{{ $m->channel_post->video->file_id }}">
                                                    {{ $m->channel_post->video->file_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Ҳаҷми файлро интихоб кунед -->
                            <div class="mb-3">
                                <label for="file_size" class="form-label">Ҳаҷми файлро интихоб кунед (KB):</label>
                                <select id="file_size" name="file_size" class="form-select select2" required>
                                    <option value="">----</option>

                                    @if(!empty($messages))
                                        @foreach($messages as $m)
                                            @if(isset($m->channel_post->video))
                                                <option value="{{ $m->channel_post->video->file_size }}">
                                                    {{ $m->channel_post->video->file_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Навъи MIME интихоб кунед -->
                            <div class="mb-3">
                                <label for="mime_type" class="form-label">Навъи MIME-ро интихоб кунед:</label>
                                <select id="mime_type" name="mime_type" class="form-select select2" required>
                                    <option value="">----</option>
                                    @if(!empty($messages))
                                        @foreach($messages as $m)
                                            @if(isset($m->channel_post->video))
                                                <option value="{{ $m->channel_post->video->mime_type }}">
                                                    {{ $m->channel_post->video->file_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Забонро интихоб кунед -->
                            <div class="mb-3">
                                <label for="lang" class="form-label">Забонро интихоб кунед:</label>
                                <select id="lang" name="lang" class="form-select select2" required>
                                    <option value="">----</option>
                                    <option value="ru">Русӣ</option>
                                    <option value="tj">Тоҷикӣ</option>
                                    <option value="uz">Ӯзбекӣ</option>
                                    <option value="en">Англисӣ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Нигоҳ доштан</button>
                                <a href="{{ route('movies.index') }}" class="btn btn-danger float-left">Бекор кардан</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
