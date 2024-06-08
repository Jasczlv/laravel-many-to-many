@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <h1>
                Nuovo Progetto
            </h1>
        </div>
        <div class="container">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Nome
                    </label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome Progetto"
                        value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Descrizione Progetto
                    </label>
                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Nome Progetto">
                    {{ old('description') }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="giturl" class="form-label">
                        Github Url
                    </label>
                    <input type="text" name="giturl" class="form-control" id="giturl"
                        placeholder="https://github.com/">
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">
                        Project Type
                    </label>
                    <input type="text" name="type_id" class="form-control" id="type_id" placeholder="Designer">
                </div>
                <button class="btn btn-primary">Crea</button>
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
    </section>
@endsection
