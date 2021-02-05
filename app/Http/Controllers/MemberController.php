<?php

namespace App\Http\Controllers;

use App\Member;
use Auth;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = auth()->user()->id;
        $data = Member::where('user_id',$id)->get();
        //dd($data);
        return view('front.members',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMember()
    {
       return view('front.addMembers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function getMembers(Request $request){
        print_r($request->all());
         $id = auth()->user()->id;
        $data = Member::where('user_id',$id)->get();

        $columns = array( 
                            0 =>'name', 
                            1 =>'email',
                            2=> 'dob',
                            3=> 'aniversary',
                            4=> 'user_id',
                        );
  
        $totalData = Post::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $posts = Member::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->where('user_id',$id)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $posts =  Member::where('id','LIKE',"%{$search}%")
                            ->orWhere('title', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Member::where('id','LIKE',"%{$search}%")
                             ->orWhere('title', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $show =  route('posts.show',$post->id);
                $edit =  route('posts.edit',$post->id);

                $nestedData['id'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['body'] = substr(strip_tags($post->body),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                $nestedData['options'] = "&emsp;<a href='{$show}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
    }
}
