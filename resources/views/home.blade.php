@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="card">
        <section class="section-title">
       <a class="compe-title title-text"><i class="fas fa-user-friends"></i>   {{ $auth->name }}</a>
            <div class="title-page title-top">ホーム</div>
        </section>
        <div class="btn btn-new">
            <button type="button" onclick="location.href='/create_competition/<?php echo Auth::id(); ?>'" class="btn btn-primary">
                            {{ __('新しいコンペの作成') }}
            </button>
        </div>
        <section>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @forelse ($competitions as $competition)
                @if ($competition->group_id == Auth::id() && $competition->delete_flag == 0)
                <div>
                    <div class="back-box ">
                        <div class="card-body">
                            <div onclick="location.href='/<?php echo Auth::id(); ?>/competition/{{$competition->compe_id}}'" class="">
                                <H3>{{$competition->compe_name}}</H3>
                                <div>
                                    <h4><i class="far fa-calendar-alt"></i> {{$competition->compe_date}}</h4>
                                </div>
                                <div>
                                    <h4><i class="fas fa-map-marker-alt"></i> {{$competition->compe_course}}</h4>
                                </div>
                            </div>
                            <div>
                        </div>
                    </div>
                </div>
                @endif
            @empty
                <li>新しいコンペを追加してください</li>
            @endforelse
                </div>
        </section>
    </div>
</div>
</main>
@endsection
