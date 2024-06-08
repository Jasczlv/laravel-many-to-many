@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <form class="col-5 py-5" action="{{ route('admin.projects.update', $project) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome"
                        value="{{ $project->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Descrizione">{{ $project->description }} </textarea>
                </div>
                <div class="mb-3">
                    <label for="giturl" class="form-label">Url Github</label>
                    <input type="text" name="giturl" class="form-control" id="giturl"
                        placeholder="https://github.com..." value="{{ $project->giturl }}">
                </div>
                <div class="mb-3">
                    <select name="type_id" id="type_id">
                        <option value="1">Dev Ops</option>
                        <option value="2">BackEnd</option>
                        <option value="3">FrontEnd</option>
                        <option value="4">Designer</option>
                        <option value="5">Undefined</option>
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="type_id" class="form-label">Type project</label>
                    <input type="text" name="type_id" class="form-control" id="type_id" placeholder="Nome"
                        value="{{ $project->type->type }}">
                </div> --}}

                <div class="d-flex justify-content-center py-4">
                    <button class="btn my-btn-edit">Update</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>
@endsection
