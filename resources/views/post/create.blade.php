@extends('layout.main')
@section('content')
    <div class="col-sm-8 blog-main">
        <form action="/postss" method="POST">
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题">
                <input  type="hidden" name="_token" value="{{csrf_token()}}">

            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容"></textarea>
            </div>
            <div class="alert alert-danger" role="alert">
               @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
             @endif
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div><!-- /.blog-main -->

@endsection
