@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="card">
         <section class="section-title">
            <a class="compe-title title-text"><i class="fas fa-user-friends"></i>   {{ $auth->name }}</a>
            <div class="title-page title-top">新しいコンペの作成</div>
        </section>
        <section class="section-edit">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="/compe_create" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <input class="inputarea" type="hidden" name="group_id" value="<?php echo Auth::id(); ?>">
                <input class="inputarea" type="text" name="compe_name" placeholder="コンペ名称" required>
                <input class="inputarea" type="date" name="compe_date" placeholder="開催日" required>
                <input class="inputarea" type="text" name="compe_course" placeholder="コース" required>
                <textarea class="textarea" type="text" wrap=”hard” name="compe_comment" placeholder="コメント"></textarea>
                <div class="btn-left">
                    <input type="submit" value="追加" class="btn btn-add">
                </div>
            </form>
        </section>
    </div>
</div>
</main>
@endsection