@extends('layouts.admin')

@section('title_1_uz')
    Добавить новые данные
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a href="{{ route('location.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                    <label>Title_1 (uz)</label>
                                    <input class="form-control @error('	title_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="title_uz" type="title_uz">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_1 (ru)</label>
                                    <input class="form-control @error('	title_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="title_ru" type="title_ru">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-12 form-group mb-3">
                                    <label>Title_2(uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.location.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>




                                <div class="col-12 form-group mb-3">
                                    <label>Title_2 (ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.location.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>



                             

                                <div class="col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image">

                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

