<!-- @extends('layouts.app') -->

@section('content')
<main class="py-4">
<div class="container">
<!--     <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <section class="section-title">
                    <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
                    <div class="title-page title-top">スコア入力</div>
                </section>
                <div class="section-team">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     @php
                        $cnt = 1;
                    @endphp

                    @while ($cnt <= $max_team)
                    <p class="score-team">{{ $cnt }}組目</p>
                    @forelse ($teams as $team)
                    @if($team->compe_team == $cnt )
                    <form method="post" action="/member_score/{{$team->id}}">
                            {{ csrf_field() }}
                        <div class="col100 score-erea">
                            <div class="col40 score-name">
                                <input class="score-erea-col" type="text" name="compe_member" value="{{ $team->compe_member }}" readonly>
                            </div>
                            <div class="col20">
                                <input type="hidden" name="compe_team" value="{{$team->compe_team}}">
                                <input type="hidden" name="compe_handicap" value="{{$team->compe_handicap}}">
                                <input class="score-erea-col" type="number" name="in_score" value="{{$team->in_score}}">
                            </div>
                            <div class="col20">
                                <input class="score-erea-col" type="number" name="out_score" value="{{$team->out_score}}">
                            </div>
                            <div class="col20">
                                <button class="score-btn" type="submit">{{ __('OK') }}</button>
                            </div>
                        </div>
                    </form>
                    @endif
                    @empty
                    @endforelse
                     @php
                    $cnt++
                    @endphp
                    @endwhile
                </div>
                @include('layouts.allbtn')
            </div>
      <!--   </div>
    </div> -->
</div>
</main>
@endsection
