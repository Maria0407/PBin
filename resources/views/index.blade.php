@extends('welcome')

@section('content')
	<h1 class="title">Public Pastes</h1>
		<ul>
			@foreach ($alldocs[0] as $doc)
				<li>
					<?$name=$doc->user()->get()->implode('name',' ');?>
					<a href="/{{$doc->user_id}}_docs">{{$name}}</a>
					@auth
						@if($doc->user_id==auth()->id())
							<a href="/home/{{$doc->id}}">{{ $doc->title }}</a>
						@else
							<a href="/{{$doc->user_id}}/{{$doc->id}}">{{ $doc->title }}</a>
						@endif
					@else
						<a href="/{{$doc->user_id}}/{{$doc->id}}">{{ $doc->title }}</a>
					@endauth
				</li>
			@endforeach
			@foreach ($alldocs[1] as $doc)
				<li>
					<span>{Guest}</span>
					<a href="/{{$doc->id}}">{{ $doc->title }}</a>
				</li>
			@endforeach
		</ul>
@endsection
