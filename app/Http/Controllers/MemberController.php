<?php

namespace App\Http\Controllers;

use App\Member;
use Auth;
use Validator;
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
      $v = Validator::make($request->all(), [
          'name'            => 'required',
          'email'         => 'required|email|unique:members',
          'phone'         => 'integer|digits:10'
          
        ]);

      if ($v->fails()) {
        return redirect()
        ->back()->withInput($request->input())
        ->withErrors($v->errors());
      }
      //dd($request->all());
      $Auid = Auth::id();
      $data = [
        'name' =>  $request->name,
        'email'  => $request->email,
        'phone' => $request->phone,
        'dob' =>  $request->dob,
        'aniversary' => $request->aniversary,
        'user_id' => $Auid

      ];

      $user = Member::updateOrCreate($data);
      //$request->session()->flash('alert-success', 'successful added!');
      return redirect()->to('/addMember')->with('success','successful added!');
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

    public function import(Request $request){
        //dd($request->all());
        $data = $request->all();
        $Auid = Auth::id();
        if(!empty($data['file'])){
            $file = $request->file('file');
            $filename = $file->getClientOriginalExtension();
            if($filename != 'csv'){
                
                return response()->json(['status' => 'error', 'msg' =>'Please upload the csv file only.']);
                die('test');
            }
                $path = request()->file('file')->getRealPath();
               
                $file = file($path);
                $members = array_slice($file, 1);
                if(count($members)){
                    $data =[];
                    $error =[];
                    foreach($members as $key => $member)
                    { 
                        if($member != ''){
                                $memberDataArray = explode(',', $member);
                                $data = [
                                'name' => $memberDataArray[0] ?? '',
                                'email' => $memberDataArray[1] ?? '',
                                'phone' => $memberDataArray[2] ?? '',
                                'dob' => $memberDataArray[3] ? date('Y-m-d',strtotime($memberDataArray[3])) : '',
                                'aniversary' => $memberDataArray[3] ? date('Y-m-d',strtotime($memberDataArray[4])) : '',
                                'user_id' => $Auid,
                                ];

                                $v = Validator::make($data, [
                              'name'            => 'required',
                              'email'         => 'required|email|unique:members',
                              'phone'         => 'integer|digits:10'
                              
                            ]);

                          if ($v->fails()) {
                             $error[$key+1] =$v->getMessageBag()->toArray();
                             continue;
                          }

                                Member::updateOrcreate([
                                'email' => $memberDataArray[1],
                                ],$data);
                        }
                    } 
                    $error_html= '';
                    if(count($error) > 0){
                        print_r($error);
                      foreach ($error as $keys => $errors) {
                           foreach ($errors as $key => $value) {
                           }
                            $error_html.= "<p class='error_ajax'>Row ".$keys.", ".$value[0]." </p>";
                            
                        }  
                        return response()->json(['status' => 'error', 'msg' =>$error_html]);
                    }else{
                        $error_html.= "<p class='success_ajax'>Row ".$keys.", ".$value[0]." </p>";

                    }
                     
                }else{
                   return response()->json(['status' => 'error', 'msg' =>'Please upload the valid csv.']); 
                }
            }else{
                return response()->json(['status' => 'error', 'msg' =>'Please upload the csv file only.']);
            }
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
