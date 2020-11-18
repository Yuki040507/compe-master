@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
  <div class="card">
    <section class="section-title">
        <a class="compe-title title-text">マイページ</a>
    </section>
    <section class="section-main">
      <table class="mypage-table">
        <tbody>
          <tr class="mypage">
            <td>グループ名</td>
            <th>{{$auth->name}}</th>
          </tr>
          <tr class="mypage">
            <td>グループID</td>
            <th>{{$auth->groupname_id}}</th>
          </tr>
          <tr class="mypage">
            <td>幹事名</td>
            <th>{{$auth->admin_name}}</th>
          </tr>
          <tr class="mypage">
            <td>メール</td>
            <th>{{$auth->email}}</th>
          </tr>
        </tbody>
      </table>
      <div>
        <button class="btn btn-edit" type="button" onclick="location.href='/user/edit'">{{ __('登録情報の変更') }}</button>
      </div>
     <!--  <form action="post" method="post" action="/share" >
        <button value="{{$auth->id}}">{{ __('招待コードの表示') }}</button>
      </form> -->
    </section>
  <div class="card-body">
    <div class="col100">
        <button type="button" onclick="location.href='/home'" class="btn btn-50">{{ __('グループホーム') }}</button>
    </div>
    <div>
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
    </div>
  </div>
</div>
</main>
@endsection
