@extends('layouts.admin')

@section('number')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('number.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('number.update', $number->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                    <label>Number</label>
                                    <input class="form-control @error('number') is-invalid @enderror" value="{{ $number->number }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="number" type="text">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" value="{{ $number->title }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title" type="text">
                                    @error('title')
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

