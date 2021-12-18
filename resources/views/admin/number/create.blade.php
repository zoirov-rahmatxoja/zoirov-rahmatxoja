@extends('layouts.admin')

@section('title')
    Добавить новые данные
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a href="{{ route('number.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('number.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Number</label>
                                    <input class="form-control @error('number') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: 4545" name="number" type="text">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('	title_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="title_uz" type="title_uz">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (ru)</label>
                                    <input class="form-control @error('	title_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="title_ru" type="title_ru">
                                    @error('title_ru')
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

