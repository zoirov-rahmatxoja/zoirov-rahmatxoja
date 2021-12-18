@extends('layouts.admin')

@section('title')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('aboutcompany.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('aboutcompany.update', $aboutcompany  ->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                               
                            <div class="col-md-6 form-group mb-3">
                                    <label>Title_1_uz</label>
                                    <input class="form-control @error('title_1_uz') is-invalid @enderror" value="{{ $aboutcompany->title_1_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_1_uz" type="text">
                                    @error('title_1_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label>Title_1_ru</label>
                                    <input class="form-control @error('title_1_ru') is-invalid @enderror" value="{{ $aboutcompany->title_1_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_1_ru" type="text">
                                    @error('title_1_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class="col-12 form-group mb-3">
                                    <label>Title_2 (uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('title_2_uz') is-invalid @enderror" name="title_2_uz">{!! $aboutcompany->title_2_uz !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('title_2_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.aboutcompany.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>





                                <div class="col-12 form-group mb-3">
                                    <label>Title_2 (ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('title_2_ru') is-invalid @enderror" name="title_2_ru">{!! $aboutcompany->title_2_ru !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('title_2_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.aboutcompany.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>




                                <div class="col-12 form-group mb-3">
                                    <label>Text (uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz">{!! $aboutcompany  ->text_uz!!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.aboutcompany.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>



                                <div class="col-12 form-group mb-3">
                                    <label>Text (ru)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru">{!! $aboutcompany  ->text_ru !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.aboutcompany.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>




                                <div class="col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $aboutcompany  ->image) }}" class="img-fluid"
                                         style="width: 200px;">
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

