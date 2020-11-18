<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompeDetail;
use App\CompeTeam;
use App\Http\Requests\ValidateSample;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompeDetails extends Controller
{
    //コンペ詳細画面のホーム
    public function competition_home($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();
        $team_number = CompeTeam::where('compe_id','=',$compe_id)->max('compe_team');

        return view('competition.competition')->with([
            'competition' => $competition,
            'teams' => $teams,
            'team_number' => $team_number,
        ]);
    }

    //コンペ詳細編集
    public function competition_edit($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();

        return view('competition.competition_edit')->with([
            'competition' => $competition,
            'teams' => $teams,
        ]);
    }

    //メンバー追加と編集画面
    public function competiton_members($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();
        $cnt = CompeTeam::where('compe_id','=',$compe_id)->count();

            return view('competition.compe_members')->with([
                'competition' => $competition,
                'teams' => $teams,
                'compe_id' => $compe_id,
                'cnt' => $cnt,
                ]);
    }


    //組み合わせ編集画面
    public function competiton_teams($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();
        $team_number = CompeTeam::where('compe_id','=',$compe_id)->max('compe_team');

        $count = $teams->count();
        $max_team = floor($count / 2); //組の最大数
        $cnt = CompeTeam::where('compe_id','=',$compe_id)->count();

            return view('competition.compe_teams')->with([
                'competition' => $competition,
                'teams' => $teams,
                'compe_id' => $compe_id,
                'max_team' => $max_team,
                'team_number' => $team_number,
            ]);
        }

    //組み合わせ登録
    public function edit2_competeams(Request $request){

        //1組目
        $id1 = [$request->compe_team1,
                $request->compe_team2,
                $request->compe_team3,
                $request->compe_team4];
        CompeTeam::whereIN('id', $id1)->update(['compe_team' => '1']);
        //2組目
        $id2 = [$request->compe_team5,
                $request->compe_team6,
                $request->compe_team7,
                $request->compe_team8];
        CompeTeam::whereIN('id', $id2)->update(['compe_team' => '2']);
        //3組目
        $id3 = [$request->compe_team9,
                $request->compe_team10,
                $request->compe_team11,
                $request->compe_team12];
        CompeTeam::whereIN('id', $id3)->update(['compe_team' => '3']);
        //4組目
        $id4 = [$request->compe_team13,
                $request->compe_team14,
                $request->compe_team15,
                $request->compe_team16];
        CompeTeam::whereIN('id', $id4)->update(['compe_team' => '4']);
        //5組目
        $id5 = [$request->compe_team17,
                $request->compe_team18,
                $request->compe_team19,
                $request->compe_team20];
        CompeTeam::whereIN('id', $id5)->update(['compe_team' => '5']);
        //6組目
        $id6 = [$request->compe_team21,
                $request->compe_team22,
                $request->compe_team23,
                $request->compe_team24];
        CompeTeam::whereIN('id', $id6)->update(['compe_team' => '6']);
        //7組目
        $id7 = [$request->compe_team25,
                $request->compe_team26,
                $request->compe_team27,
                $request->compe_team28];
        CompeTeam::whereIN('id', $id7)->update(['compe_team' => '7']);
        //8組目
        $id8 = [$request->compe_team29,
                $request->compe_team30,
                $request->compe_team31,
                $request->compe_team32];
        CompeTeam::whereIN('id', $id8)->update(['compe_team' => '8']);
        //9組目
        $id9 = [$request->compe_team33,
                $request->compe_team34,
                $request->compe_team35,
                $request->compe_team36];
        CompeTeam::whereIN('id', $id9)->update(['compe_team' => '9']);
        //10組目
        $id10 = [$request->compe_team37,
                $request->compe_team38,
                $request->compe_team39,
                $request->compe_team40];
        CompeTeam::whereIN('id', $id10)->update(['compe_team' => '10']);

        // $compe = $this->competiton_teams($request);
        // return $compe;
        return back(); //元のページに戻る
    }








    //新規コンペ作成
    public function create_competition(){
        $auth = Auth::user();
        return view('competition.competition_create',[
            'auth' => $auth,
             ]);
    }

    //DB（copetition_details）へ新規追加
    public function store_competition(){

    }

    //スコア入力画面
    public function competition_scores($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();
        $team_number = CompeTeam::where('compe_id','=',$compe_id)->max('compe_team');
            $max_team = $team_number; //組の最大数


        return view('competition.compe_scores')->with([
            'competition' => $competition,
            'teams' => $teams,
            'max_team' => $max_team,
        ]);
    }

    //ランキング表示画面
    public function competition_ranks($group_id, $compe_id){
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->orderBy('net_score', 'asc')->get();
        $rank = CompeTeam::where('compe_id','=',$compe_id)->orderBy('net_score', 'asc')->get()->toArray();
        $cnt = CompeTeam::where('compe_id','=',$compe_id)->count();

        if(!isset($rank[0])){
            $rank1 = 'スコアが未入力です';
            $rank2 = 'スコアが未入力です';
            $rank3 = 'スコアが未入力です';
        }elseif(!isset($rank[2])){
            $rank1 = $rank[0]["compe_member"];
            $rank2 = $rank[1]["compe_member"];
            $rank3 = '-';
        } else {
            $rank1 = $rank[0]["compe_member"];
            $rank2 = $rank[1]["compe_member"];
            $rank3 = $rank[2]["compe_member"];
        }

        return view('competition.compe_ranks')->with([
            'competition' => $competition,
            'teams' => $teams,
            'rank1' => $rank1,
            'rank2' => $rank2,
            'rank3' => $rank3,
        ]);
    }



    //DB（copetition_details）へ新規追加
    public function store_compedetails(Request $request){

        $compe_details = new CompeDetail;

        $compe_details->group_id      = $request->group_id;
        $compe_details->compe_name    = $request->compe_name;
        $compe_details->compe_date    = $request->compe_date;
        $compe_details->compe_course  = $request->compe_course;
        $compe_details->compe_comment = $request->compe_comment;
        $compe_details->delete_flag   = 0;

        $compe_details->save();

        $compe_id = $compe_details->compe_id;
        $competition = CompeDetail::find($compe_id);
        $teams       = CompeTeam::where('compe_id','=',$compe_id)->get();


        return view('competition.competition')->with([
            'competition' => $competition,
            'teams' => $teams,
        ]); //コンペ詳細ページへジャンプ

    }

    //DB（copetition_details）を編集
    public function edit_compedetails(Request $request, $compe_id){

        $compe_details = CompeDetail::find($compe_id);

        $compe_details->group_id      = $request->group_id;
        $compe_details->compe_name    = $request->compe_name;
        $compe_details->compe_date    = $request->compe_date;
        $compe_details->compe_course  = $request->compe_course;
        $compe_details->compe_comment = $request->compe_comment;

        $compe_details->save();

        return back(); //元のページに戻る

    }


    //DB（copetition_teams）へ新規追加
    public function store_competeams(Request $request){

        $compe_teams = new CompeTeam;

        $compe_teams->compe_id       = $request->compe_id;
        $compe_teams->compe_member   = $request->compe_member;
        $compe_teams->compe_handicap = $request->compe_handicap;
        $compe_teams->compe_team     = $request->compe_team;
        $compe_teams->in_score       = "36";
        $compe_teams->out_score      = "36";
        $compe_teams->gross_score     = "72";

        $compe_teams->save();

        return back(); //元のページに戻る

    }


    //DB（copetition_teams）を編集（スコア入力）
    public function edit_competeams(Request $request ,$id){

        $compe_teams = CompeTeam::find($id);

        $compe_teams->compe_handicap = $request->compe_handicap;
        $compe_teams->compe_team     = $request->compe_team;
        $compe_teams->in_score       = $request->in_score;
        $compe_teams->out_score      = $request->out_score;
        $compe_teams->gross_score    = $request->in_score + $request->out_score;
        $compe_teams->net_score      = $request->in_score + $request->out_score - $request->compe_handicap;

        $compe_teams->save();

        return back(); //元のページに戻る

    }

    //DB（copetition_details）から削除
    public function destroy_competition(Request $request, $compe_id){
        $compe_details = CompeDetail::find($compe_id);

        $compe_details->delete_flag = 1; //論理削除フラグをセット

        $compe_details->save();

        $competitions = CompeDetail::all();

        return view('home')->with([
            'competitions' => $competitions,
        ]);
    }

    //DB（copetition_teams）から削除
    public function destroy_competeams(Request $request){
        CompeTeam::destroy($request->id);

        return back(); //元のページに戻る
    }

    public function test(Request $request, $id){

        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'groupname_id' => ['required', 'string', 'min:4','unique:users'],
            'admin_name' => ['required', 'string'],
        ]);

        // dd($validator);
        if($validator){
            User::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'groupname_id' => $request['groupname_id'],
            'admin_name' => $request['admin_name'],
            ]);
            $mes  = "更新が完了しました！";
        } else{
            $mes  = "更新に失敗しました";
        }


        $auth = Auth::user();
        return view('user.index',[
            'auth' => $auth,
            'mes' => $mes,
             ]);

    }

}