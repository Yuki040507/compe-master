@extends('layouts.app')


@section('content')
<main class="py-4">
  <div class="container">
    <div class="card">
      <section class="section-title">
       <a class="compe-title title-text" onclick="location.href='/user/index'">マイページ</a>
       <div class="title-page title-top">登録情報の編集</div>
      </section>
      <section class="section-main">
        <form action="/userinfo/update/{{$auth->id}}" method="post" accept-charset="utf-8">
          {{ csrf_field() }}
          <table class="mypage-table">
            <tbody>
              <tr class="mypage-edit">
               <td>グループ名</td>
              <th><input type="text" name="name" value="{{ $auth->name }}"class="user-info mypage-input"></th>
              </tr>
              <tr class="mypage-edit">
                <td>グループID</td>
              <th><input type="text" name="groupname_id" value="{{ $auth->groupname_id }}"class="user-info mypage-input"></th>
              </tr>
              <tr class="mypage-edit">
                <td>幹事名</td>
              <th><input type="text" name="admin_name" value="{{ $auth->admin_name }}" class="user-info mypage-input"></th>
              </tr>
              <tr class="mypage-edit">
                <td>メール</td>
              <th><input type="email" name="email" value="{{ $auth->email }}" class="user-info mypage-input"></th>
              </tr>
              <tr class="mypage-edit">
                <td>パスワード</td>
              <th><input type="passward" name="passward" placeholder="パスワード"class="user-info mypage-input"></th>
              </tr>
              <tr class="mypage-edit">
                <td></td>
              <th><input type="passward" name="passward_confirm" placeholder="パスワードを再入力"class="user-info mypage-input"></th>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-edit" >{{ __('変更') }}</button>
        </form>
      </section>
      </div>
      <div class="card-body">
      <div class="col100">
      <button type="button" onclick="location.href='/home'" class="btn btn-50">{{ __('グループホーム') }}</button>
      </div>
    </div>
  </div>
</main>
@endsection
