@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$docs->first()->user()->get()->implode('name',' ')}}'s Pastes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="public">
                        @foreach ($docs as $doc)
                            @if ($doc->privacy==0)
                                <li> 
                                    <a href="/{{$doc->user_id}}/{{$doc->id}}">{{ $doc->title }}</a>
                                </li>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection