@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="card">
        <section class="section-title">
            <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
            <div class="title-page title-top">ランキング</div>
        </section>
        <section class="section-rank">
            <div class="rank-top">
                <div class="rank-col1"><i class="fas fa-crown"></i> 優勝</div>
                <div class="rank-col2">{{ $rank1 }}</div>
            </div>
            <div class="rank-top">
                <div class="rank-col1">準優勝</div>
                <div class="rank-col2">{{ $rank2 }}</div>
            </div>
            <div class="rank-top">
                <div class="rank-col1">3位</div>
                <div class="rank-col2">{{ $rank3 }}</div>
            </div>
        </section>

        <section class="section-rank-detail">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <h4><i class="fas fa-user-circle"></i> スコア詳細</h4>
                <table>
                    <tr class="score-table">
                        <th class="score-rank">順位</th>
                        <th class="score-name">名前</th>
                        <th class="score-score">OUT</th>
                        <th class="score-score">IN</th>
                        <th class="score-score">GROSS</th>
                        <th class="score-score">HDCP</th>
                        <th class="score-score">NET</th>
                    </tr>
                    @php
                        $cnt=0;
                    @endphp
                @forelse ($teams as $team)
                    <tr class="score-table">
                        @php
                            $cnt++;
                        @endphp
                        <td>{{ $cnt }}位</td>
                        <td>{{ $team->compe_member }}</td>
                        <td>{{ $team->out_score }}</td>
                        <td>{{ $team->in_score }}</td>
                        <td>{{ $team->gross_score }}</td>
                        <td>{{ $team->compe_handicap }}</td>
                        <td>{{ $team->net_score }}</td>
                    </tr>
            @empty
            @endforelse
                </table>
        </section>
        @include('layouts.allbtn')
</div>
</div>
</main>
@endsection
