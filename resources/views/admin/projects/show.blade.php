@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <p>
                {{ $project->name }}
            </p>
            <p>
                {{ $project->description }}
            </p>
            <a href="{{ $project->giturl }}" target="_blank">
                link github
            </a>
            <p>
                {{ $project->type->type }}
            </p>

        </div>
    </div>
@endsection
