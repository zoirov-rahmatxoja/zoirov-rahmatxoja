@extends('layouts.admin')

@section('analiz')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('analiz.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('analiz.update', $analiz->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                    <label>title_uz</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror" value="{{ $analiz->title_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_uz" type="text">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror" value="{{ $analiz->title_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_ru" type="text">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input class="form-control @error('text_uz') is-invalid @enderror" value="{{ $analiz->text_uz }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="text_uz" type="text">
                                    @error('text_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                




                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input class="form-control @error('text_ru') is-invalid @enderror" value="{{ $analiz->text_ru }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="text_ru" type="text">
                                    @error('text_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

