@extends('layouts.app1')
@section('BodyContent')
<form method="post">
    {{csrf_field()}}
    <div class="row">
        @foreach ($files as $k => $file)
            @if ($file->type === 'image')
                <div class="col-3">
                    <div><input type="checkbox" id="id-{{$k}}" name="listFile[]" value="{{$file->path}}"></div>
                    <img src="{{$file->full_url}}" class="img-thumbnail">
                </div>
            @endif
            @if ($file->type === 'audio')
                <div class="col-3">
                    <div><input type="checkbox" id="id-{{$k}}" name="listFile[]" value="{{$file->path}}"></div>
                    <audio src="{{$file->full_url}}" style="width:100%" id="" type="audio/mp3" controls></audio>
                </div>
            @endif
            @if ($file->type === 'other')
                <div class="col-3">
                    <div><input type="checkbox" id="id-{{$k}}" name="listFile[]" value="{{$file->path}}"></div>
                    <img src="https://via.placeholder.com/140x100" class="img-thumbnail">
                    {{$file->file_name}}
                </div>
            @endif
        @endforeach
        <button type="submit" class="btn btn-primary">Delete</button>
    </div>
</form>
@endsection
