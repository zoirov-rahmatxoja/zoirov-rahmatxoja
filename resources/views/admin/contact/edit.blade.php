@extends('layouts.admin')

@section('title')
contact
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('contact.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                               
                                


  
                            <div class="col-md-6 form-group mb-3">
                                    <label>text</label>
                                    <input class="form-control @error('	text_uz') is-invalid @enderror"   value=" {{ $contact->text_uz }}"
                                           autocomplete="off" placeholder="Например: work" name="text_uz" type="text">
                                    @error('text_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label>text_ru</label>
                                    <input class="form-control @error('	text_ru') is-invalid @enderror"   value=" {{ $contact->text_ru }}"
                                           autocomplete="off" placeholder="Например: work" name="text_ru" type="text">
                                    @error('text_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>










                                <div class="col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $contact->image) }}" class="img-fluid"
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

