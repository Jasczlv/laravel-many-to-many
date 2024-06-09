@extends('layouts.app')
@section('content')
    <div class="container p-3 my-5 d-flex justify-content-center align-items-center flex-column text-center">

        <div>
            <div class="mt-5">
                <span class="fw-bold fs-3">Name</span>
            </div>
            <div>

                <p>
                    {{ $project->name }}
                </p>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <span class="fw-bold fs-3">
                    Description
                </span>
            </div>
            <div>
                <p>
                    {{ $project->description }}
                </p>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <span class="fw-bold fs-3">Github</span>

            </div>
            <div>

                <a href="{{ $project->giturl }}" target="_blank">
                    link github
                </a>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <span class="fw-bold fs-3">Type</span>
            </div>
            <div>
                @if ($project->type === null || $project->type->type === null)
                    <p>
                        Type Undefined
                    </p>
                @else
                    <span>{{ $project->type->type }}</span>
                @endif
            </div>
        </div>
        <div>
            <div class="mt-5">
                <span class="fw-bold fs-3">
                    Technologies
                </span>
            </div>
            <div>
                @if ($project->technologies->isEmpty())
                    <p>Undefined</p>
                @else
                    @foreach ($project->technologies as $technology)
                        <p>{{ $technology->tech }}</p>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
