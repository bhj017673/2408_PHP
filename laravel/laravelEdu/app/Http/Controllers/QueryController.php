<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    public function index(Request $request) {
        // ------------
        // 쿼리빌더
        // ---------
        // 쿼리빌더를 이용하지 않고 SQL 작성
        // select
        $result = DB::select('SELECT * from users');
        $result = DB::select('SELECT * FROM users WHERE u_email = :u_email',['u_email' => 'admin@admin.com']);
        $result = DB::select('SELECT * FROM users WHERE u_email = ?', ['admin@admin.com']);
        // 두가지 방법 다 가능함

        // insert
        // DB::insert('INSERT INTO boards_category (bc_type, bc_name) VALUES (?,?)', ['3', '테스트게시판']);

        // update
        // DB::update('UPDATE boards_category SET bc_name = ? WHERE bc_type = ?', ['미어캣게시판','3']);

        // delete
        // DB::delete('DELETE FROM boards_category WHERE bc_type = ?', ['3']);
        
        // -----------------
        // 쿼리 빌더 체이닝
        // -----------------
        // users 테이블 모든 데이터 조회
        // select * from users;
        $result = DB::table('users')->get();

        // select * from users where name = ? ['관리자']
        $result = DB::table('users')
                    ->where('u_name', '=', '관리자')
                    ->get();        
        

        // select * from boards where bc_type =? and b_id < ?['0', 5]
        $result = DB::table('boards')
                        ->where('bc_type', '=', '0')
                        ->where('b_id', '<', 5)
                        ->get();


        // select * from boards where bc_type = ? or b_id < ?['0', 10]
        $result = DB::table('boards')
                        ->where('bc_type', '=', '0')
                        ->orwhere('b_id', '<', 10)
                        ->get();

        // select b_title, b_content from boards where b_id in(?, ?) [1,2]
        $result = DB::table('boards')
                        ->select('b_title', 'b_content')
                        ->whereIn('b_id', [1, 2])
                        ->get();

        // select * from boards where deleted_at is null
        $result = DB::table('boards')
                        ->whereNull('deleted_at')
                        ->get();
        
        // select * from users where year(created_at) is '2024'
        $result = DB::table('users')
                        ->whereYear('created_at', '=', '2024')
                        ->get();
 
        // 게시판별 게시글 갯수
        // select bc_type, COUNT(*) cnt  from boards group by bc_type
        $result = DB::table('boards')
                    ->select('bc_type', DB::raw('COUNT(*) cnt'))
                    ->wherenull('deleted_at')
                    ->groupBy('bc_type')
                    ->get();

        // select bc_type, COUNT(*) cnt  from boards group by bc_type having bc_type=0
        $result = DB::table('boards')
                    ->select('bc_type', DB::raw('COUNT(*) cnt'))
                    ->groupBy('bc_type')
                    ->having('bc_type', '=', '0')
                    ->get();


        // select b_id, b_title from boards order by b_id limit ? offset ? [1,2]
        $result = DB::table('boards')
                        ->select('b_id', 'b_title')
                        ->orderBy('b_id', 'asc')
                        ->limit('1')
                        ->offset('2')
                        ->get();

        $requestData = [
            'u_id' => 0
        ];
        // null, false, 0, '', [] 의 경우에 when  조건이 실행되지않는다.
        $result = DB::table('users')
                    ->when($requestData['u_id'], function($query, $u_id) {
                        $query->where('u_id', '=', $u_id);
                    })
                    ->get();

        // 삭제되지 않은 글중에 제목에 자유 또는 질문이 포함되어 있는 게시글 검색
        // SELECT * FROM boards WHERE deleted_at IS NULL AND (b_title LIKE '%자유%' or b_title LIKE  '%질문%')
        
        $result = DB::table('boards')
                        ->wherenull('deleted_at')
                        ->where(function($query) {
                            $query->where('b_title', 'like', '%자유%')
                                    ->orwhere('b_title', 'like', '%질문%');
                        })
                        ->get();
                        
        // first() : 쿼리 결과 중에 첫번째 레코드만 반환
        $result = DB::table('users')->first();

        // find($id) : 지정된 Pk에 해당하는 레코드를 반환
        // $result = DB::table('users')->find(1, 'u_id')

        // count() : 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();

        // insert

        // $arr = [
        //     'u_email' => 'bong@admin.com'
        //     ,'u_password' => Hash::make('qwer1234')
        //     ,'u_name' => '이봉몽'
        // ];
        // $result = DB::table('users')
        //                 ->insert($arr);

        // update
        // $result = DB::table('users')
        //             ->where('u_id', '=', 2)
        //             ->update([
        //                 'u_name' => '김철수'
        //             ]);

        //delete
        // $result = DB::table('users')
        //             ->where('u_id', '=', 2)
        //             ->delete();

        // --------------
        // Eloquent Model
        // --------------
        // $result = DB::table('users')->get();
        // // $result = User::get();
        $result = User::where('u_name', '=', '배짜장')->first();
        // $result = User::find(1);
        // $result->u_name ='배현진';

        // //insert
        // $userInsert = new User();
        // $userInsert->u_email = $request->u_email;
        // $userInsert->u_password = Hash::make($request->u_password);
        // $userInsert->u_name = $request->u_name;
        // $userInsert->save();

        // // Update
        // $userUpdate = User::find(5);
        // $userUpdate->u_name = '이봉봉';
        // $userUpdate->save();

        // delete
        $userDelete = User::destroy(7);

        //  삭제된 데이터도 포함해서 검색하고 싶을때
        // $result = User::withTrashed()->find(4);
        $result = User::withTrashed()->count();
        // 삭제된 데이터만 검색하고싶을 때
        $result = User::onlyTrashed()->count();

        // 삭제된 데이터를 되살리고 싶을때
        $result = User::where('u_id', 4)->restore();



        // var_dump($userInsert);
        var_dump($result);
        return '';

    }
}
