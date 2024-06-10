@extends('layouts.app')
@section('content')
    <section class="mb-5">
        <div class="container d-flex justify-content-center my-5">
            <h1>
                Projects list
            </h1>
        </div>
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
                        <th>Technologies</th>
                        <th>
                            {{-- placeholder to extend table line --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">{{ $project->name }}</a>
                            </td>
                            <td>
                                <a href="{{ $project->giturl }}">Link</a>
                            </td>
                            <td>
                                {{ $project->description }}
                            </td>
                            {{-- type --}}
                            @if ($project->type === null || $project->type->type === null)
                                <td>
                                    Undefined
                                </td>
                            @else
                                {{-- ($project->type !== null && $project->type->type !== null) --}}
                                <td>
                                    {{ $project->type->type }}
                                </td>
                            @endif
                            <td>
                                {{-- @dd($project) --}}
                                @foreach ($project->technologies as $technology)
                                    {{ $technology->tech }}
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn btn-danger text-light">Trash</button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @dd($projects) --}}
                </tbody>
            </table>
        </div>
    </section>
@endsection
