@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="card">
        <section class="section-title">
            <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
            <div class="title-page title-top">コンペホーム</div><i onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}/edit'" class="fas fa-edit btn-fa"></i>
        </section>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <h4 class="title2"><i class="far fa-calendar-alt"></i> {{ $competition->compe_date }}</h4>
                <h4 class="title2"><i class="fas fa-map-marker-alt"></i> {{ $competition->compe_course }}</h4>
                <h4 class="title2"><i class="far fa-comment-alt"></i> {{ $competition->compe_comment }}</h4>
        </section>
        <section class="section-main">
            <h4><i class="fas fa-user-circle"></i> 参加メンバー</h4>
            @forelse ($teams as $team)
            <div class="col30 compe_detail">{{ $team->compe_member }}</div>
            @empty
                <li>メンバーを追加してください</li>
            @endforelse
        </section>
            @include('layouts.allbtn')
    </div>
</div>
</main>
@endsection
