<!-- 共通部品　ボタン類 -->

<section class="section-btn link-block">
    <div class="col100">
        <div class="col50">
             <button type="button" onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}/members'" class="btn btn-50">{{ __('メンバー') }}</button>
        </div>
        <div class="col50">
            <button type="button" onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}/teams'" class="btn btn-50">{{ __('組み合せ') }}</button>
        </div>
    </div>
    <div class="col100">
        <div class="col50">
            <button type="button" onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}/scores'" class="btn btn-50">{{ __('スコア') }}</button>
        </div>
        <div class="col50">
            <button type="button" onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}/ranks'" class="btn btn-50">{{ __('ランキング') }}</button>
        </div>
    </div>
    <div class="col100">
        <div class="col50">
            <button type="button" onclick="location.href='/{{$competition->group_id}}/competition/{{$competition->compe_id}}'" class="btn btn-50">{{ __('コンペホーム') }}</button>
        </div>
        <div class="col50">
            <button type="button" onclick="location.href='/home'" class="btn btn-50">{{ __('グループホーム') }}</button>
        </div>
    </div>
</section>