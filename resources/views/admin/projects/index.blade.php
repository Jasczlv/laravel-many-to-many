@extends('layouts.app')
@section('content')
    <h1>
        Ciao
    </h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Github
                    </th>
                    <th>Descrizione</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            {{ $project->name }}
                        </td>
                        <td>
                            <a href="{{ $project->giturl }}">Link</a>
                        </td>
                        <td>
                            {{ $project->description }}
                        </td>
                        {{-- type --}}
                        <td>
                            {{ $project->type->type }}
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-link link-danger">Trash</button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
