@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
<!--     <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <section class="section-title">
                    <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
                    <div class="title-page title-top">メンバー編集</div>
                </section>

                <seciton class="section-add">
                    <h5>追加する</h5>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/member_submit" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div clas="col100 member-erea">
                            <div class="col60">
                                <input type="hidden" name="compe_id" value="{{$compe_id}}">
                                <input class="member-erea-col" type="text" name="compe_member" placeholder="参加者" required>
                            </div>
                            <div class="col20">
                                <input class="member-erea-col" type="number" name="compe_handicap" placeholder="ハンデ" required>
                            </div>
                            <div class="col20">
                                <button class="member-btn" type="submit">{{ __('追加') }}</button>
                            </div>
                        </div>
                    </form>
                </seciton>
                <section class="section-main">
                        <h4><i class="fas fa-user-circle"></i> 参加者は{{$cnt}} 名です</h4>
                    @forelse ($teams as $team)
                    <div clas="col100 member-erea">
                        <form method="post" action="/member_score/{{$team->id}}">
                        {{ csrf_field() }}
                            <div class="col50">
                                <input class="member-erea-col" type="text" name="compe_member" value="{{ $team->compe_member }}" readonly>
                            </div>
                            <div class="col20">
                                <input type="hidden" name="compe_team" value="{{$team->compe_team}}">
                                <input class="member-erea-col" type="number" name="compe_handicap" value="{{ $team->compe_handicap}}" >
                            </div>
                            <div class="col20">
                                <button class="member-btn" type="submit">{{ __('変更') }}</button>
                            </div>
                        </form>
                        <form method="post" action="/member_destroy/{{$team->id}}">
                            {{ csrf_field() }}
                            <button class="member-dele" type="submit" onclick='return confirm("削除しますか？");'>{{ __('×') }}</button>
                        </form>
                    </div>
                    @empty
                        <li>メンバーを追加してください</li>
                    @endforelse
                </section>
            </div>
            @include('layouts.allbtn')
<!--         </div>
    </div> -->
</div>
</main>
@endsection
