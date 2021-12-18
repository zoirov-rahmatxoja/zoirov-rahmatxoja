@extends('layouts.admin')

@section('title')
    Обо мне
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Обо мне</h1>
            <ul>
                <li><a href="{{ route('aboutcompany.create') }}">Добавить новые данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row m-0 py-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Title_1_uz</th>
                                      
                                            <th>Title_2_uz</th>
                                        
                                            <th>Text_uz</th>
                                         
                                            <th>Image</th>
                                            <th>Tahrir</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody class="result">
                                        @foreach($aboutcompany as $com)
                                            <tr>
                                                
                                                <td>{!! $com->title_1_uz  !!}</td>
                                            
                                                <td>{!! $com->title_2_uz!!}</td>
                                              
                                                <td>{!! $com-> text_uz !!}</td>
                                               
                                               
                                                <td><img src="{{ asset('storage/' . $com->image) }}" style="width: 200px;" /></td>
                                                <td class="d-flex">
                                                    <a class="text-success mr-2" href="{{ route('aboutcompany.edit', $com->id) }}"><i class="nav-icon fas fa-pen font-weight-bold"></i></a>
                                                    <a data-toggle="modal" data-target="#deletesModal{{$com->id}}" class="text-danger mr-2" href="{{ route('aboutcompany.destroy', $com->id) }}"><i class="nav-icon far fa-times-circle font-weight-bold"></i></a>
                                                    <div class="modal fade" id="deletesModal{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog" role="document">  
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModal">Удалить пост?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <b>Вы действительно хотите удалить?</b>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('aboutcompany.destroy', $com->id) }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn btn-danger mr-2 cursor-pointer">Удалить</button>
                                                                    </form>
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Закрыть</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection