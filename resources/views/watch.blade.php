@extends('layouts.app')

@section('content')
<form>
    {{csrf_field()}}
    
    <div class="field">
        <label class="label" for="title">Title</label>
        
        <div class="control">
            <textarea type="text" name="title">{{$doc->first()->title}}</textarea>
        </div>
    </div>

    <div class="field">
        <label class="label" for="content">Content</label>
        
        <div class="control">
            <textarea name="content" required>{{$doc->first()->content}}</textarea>
        </div>
    </div>

</form>
@endsection