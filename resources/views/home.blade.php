@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Pastes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table>
                        <tr><th><p>Public pastes</p></th><th><p>Private pastes</p></th></tr>
                        <td>
                            @foreach ($docs as $doc)
                                @if ($doc->privacy==0)
                                    <li> 
                                        <a href="/home/{{$doc->id}}">{{ $doc->title }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </td>
                    
                        <td>
                            @foreach ($docs as $doc)
                                @if ($doc->privacy==1)
                                    <li> 
                                        <a href="/home/{{$doc->id}}">{{ $doc->title }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
