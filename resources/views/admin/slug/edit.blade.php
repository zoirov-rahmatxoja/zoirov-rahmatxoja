@extends('layouts.admin')

@section('market')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('market.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('market.update', $market->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                    <label>title_1_uz</label>
                                    <input class="form-control @error('title_1_uz') is-invalid @enderror" value="{{ $market->title_1_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_1_uz" type="text">
                                    @error('title_1_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input class="form-control @error('title_1_ru') is-invalid @enderror" value="{{ $market->title_1_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_1_ru" type="text">
                                    @error('title_1_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('	title_2_uz') is-invalid @enderror" value="{{ $market->title_2_uz }}"
                                           autocomplete="off" placeholder="Например: work" name="title_2_uz" type="title_2_uz">
                                    @error('title_2_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                
                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('	title_2_ru') is-invalid @enderror"  value="{{ $market->title_2_ru }}"
                                           autocomplete="off" placeholder="Например: work" name="title_2_ru" type="title_2_ru">
                                    @error('title_2_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                
                                <div class="col-12 form-group mb-3">
                                    <label>Text (uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" name="text_uz">{!! $market->text_uz !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                                filebrowserUploadUrl: "{{ route('admin.market.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>






                                
                                <div class="col-12 form-group mb-3">
                                    <label>Text (uz)</label>
                                    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" name="text_ru">{!! $market->text_ru !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                                filebrowserUploadUrl: "{{ route('admin.market.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>



                                <div  class="col-md-6 form-group mb-3">
                                    <label>Тип</label>
                                    <select required name="choose" class="form-control">
                                        <option selected>Выберите...</option>
                                        <option {{ $market->choose == 'bir'? 'selected' : '' }} value="bir">bir</option>
                                        <option {{ $market->choose == 'iki' ? 'selected' : '' }} value="iki">iki</option>
                                        <option {{ $market->choose == 'uch' ? 'selected' : '' }} value="uch">uch</option>
                                        <option {{ $market->choose == 'tor' ? 'selected' : '' }} value="tor">tor</option>
                                        
                                    </select> 
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

