 @php
    $cnt0 = 0; 
    $cnt1 = 1; //変更用の組カウント用
    $cnt2 = 1; //変更用の組カウント用
    $cnt3 = 1; //DB格納用
    $cnt4 = 1; //メンバー用
@endphp
@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
<!--     <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <section class="section-title">
                    <a href="/{{$competition->group_id}}/competition/{{$competition->compe_id}}" class="compe-title title-text">{{ $competition->compe_name }}</a>
                    <div class="title-page title-top">組編集</div>
                </section>
                <section class="section-team">
                        @while ($cnt1 <= $team_number)
                        <div class="col100">
                             @while ($cnt0 < 2 and $cnt1 <= $team_number)
                            <div class="col50 team-box">
                                <p class="team">{{ $cnt1 }}組目</p>
                                    @forelse ($teams as $team)
                                    @if($team->compe_team == $cnt1 )
                                <p class="team">{{ $team->compe_member }}：{{ $team->compe_handicap}}</p>
                                    @endif
                                    @empty
                                    @endforelse
                            </div>
                            <?php
                            $cnt0++;
                            $cnt1++;
                            ?>
                            @endwhile
                        </div>
                        @php
                            $cnt0 = 0;
                        @endphp
                        @endwhile
                </section>
                <section class="section-main">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="title-page">変更する</div>
                        <form method="post" action="/member_team">
                            {{ csrf_field() }}
                        @while ($cnt2 <= $max_team)
                        <div class="col100">
                            @while ($cnt0 < 2 and $cnt4 <= 4 and $cnt2 <= $max_team)
                            <div class="col50">
                                <p class="team">{{ $cnt2 }}組目</p>
                                @while ($cnt4 <= 4)
                                    <select class="member-select" name="compe_team{{$cnt3}}" >
                                        <option value="">-</option>
                                        @forelse ($teams as $team)
                                            <option value="{{$team->id}}">{{$team->compe_member}}</option>
                                        @empty
                                            <option value=""></option>
                                        @endforelse
                                    </select>
                                    <?php
                                        $cnt3++;
                                        $cnt4++;
                                    ?>
                                    <input type="hidden" name="compe_id" value="{{$team->compe_id}}">
                                @endwhile
                            </div>
                                <?php
                                    $cnt0++;
                                    $cnt2++;
                                    $cnt4 = 1;
                                ?>
                            @endwhile
                        </div>
                        <?php
                            $cnt0=0;
                        ?>
                        @endwhile
                        <button type="submit" class="btn btn-50">{{ __('決定') }}</button>
                        </form>
                </section>
            </div>
             @include('layouts.allbtn')
   <!--      </div>
    </div> -->
</div>
</main>
@endsection
