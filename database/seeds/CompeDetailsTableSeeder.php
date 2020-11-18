<?php

use Illuminate\Database\Seeder;

class CompeDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('compe_details')->insert([
        	'group_id' => '1',
            'compe_name' => '第9回 NVC cup',
        	'compe_date' => '2020-06-20',
        	'compe_course' => '神有カントリー倶楽部',
        	'compe_comment' => 'This is Test',
            'delete_flag' => '0',
        ],[
            'group_id' => '1',
            'compe_name' => '第10回 NVC cup',
            'compe_date' => '2020-09-05',
            'compe_course' => '北神戸カントリー倶楽部',
            'compe_comment' => 'This is Test',
        ]);


        DB::table('compe_teams')->insert([
            [
                'compe_id' => '1',
                'compe_member' => 'TOM',
                'compe_handicap' => '10',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ],[
                'compe_id' => '1',
                'compe_member' => 'JON',
                'compe_handicap' => '20',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ],[
                'compe_id' => '1',
                'compe_member' => 'Mike',
                'compe_handicap' => '8',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ],[
                'compe_id' => '1',
                'compe_member' => 'NIK',
                'compe_handicap' => '15',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ],[
                'compe_id' => '1',
                'compe_member' => 'SAM',
                'compe_handicap' => '18',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ],[
                'compe_id' => '1',
                'compe_member' => 'MEGU',
                'compe_handicap' => '24',
                'compe_team' => '1',
                'in_score' => '36',
                'out_score' => '36',
                'gross_score' => '72',
            ]
        ]);
    }
 }
