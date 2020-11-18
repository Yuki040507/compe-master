@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
 <!--    <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <section class="section-title">
            <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
            <div class="title-page title-top">編集</div>
        </section>
            <div class="section-edit">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="/compe_edit/{{$competition->compe_id}}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input class="inputarea" type="hidden" name="group_id" value="{{$competition->group_id}}">
                    <input class="inputarea" type="text" name="compe_name"  placeholder="コンペ名称" value="{{$competition->compe_name}}">
                    <input class="inputarea" type="date" name="compe_date"  placeholder="開催日" value="{{$competition->compe_date}}">
                    <input class="inputarea" type="text" name="compe_course"  placeholder="コース" value="{{$competition->compe_course}}">
                    <textarea class="textarea" type="text" wrap=”hard” name="compe_comment" value="{{$competition->compe_comment}}"></textarea>
                    <div class="col100">
                        <input type="submit" value="変更" class="btn btn-50">
                    </div>
                </form>
                <form method="post" action="/competition_destroy/{{$competition->compe_id}}">
                    {{ csrf_field() }}
                    <i type="submit" value="削除" onclick='return confirm("削除しますか？");' class="fas fa-trash-alt btn-fa"></i>
                </form>
            </div>
            @include('layouts.allbtn')
            </div>
     <!--    </div>
    </div> -->
</div>
</main>
@endsection
