<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id =  Auth::id();
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
        $Auid = Auth::id();
      $v = Validator::make($request->all(), [
          'name'            => 'required',
          'email'         => ['required',Rule::unique('members')->where(function ($query) use($Auid) {return $query->where('user_id', $Auid);})],
          'phone'         => 'integer|digits:10'
          
        ]);

      if ($v->fails()) {
        return redirect()
        ->back()->withInput($request->input())
        ->withErrors($v->errors());
      }
      //dd($request->all());
      
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
    public function edit(Member $member, $id)
    {   
       $data = Member::where('id',$id)->first();
       return view('front.editMembers',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member, $id)
    {
        $v = Validator::make($request->all(), [
          'name'            => 'required',
          'email'         => 'required|email',
          'phone'         => 'integer|digits:10'
          
        ]);

      if ($v->fails()) {
        return redirect()
        ->back()->withInput($request->input())
        ->withErrors($v->errors());
      }
      $data = request()->except(['_token']);
      $user = Member::where('id',$id)->update($data);
     return redirect()->to('/members')->with('success','successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member,$id)
    {
        Member::where('id', $id)->delete();
        return redirect()->to('/members')->with('success','successful Deleted!');
    }

    public function import(Request $request){
        $data = $request->all();
        $Auid = Auth::id();
        if(!empty($data['file'])){
            $file = $request->file('file');
            $filename = $file->getClientOriginalExtension();
            if($filename != 'csv'){
                
                return response()->json(['status' => 'error', 'msg' =>'<p class="error_ajax">Please upload the csv file only.</p>']);
            }
                $path = request()->file('file')->getRealPath();
               
                $file = file($path);
                $header = explode(',', $file[0]);
                $correct_header=['name','email','phone','dob','aniversary'];
                $result=array_intersect($header,$correct_header); 
                if(count($result) == count($header)){
                    return response()->json(['status' => 'error', 'msg' =>'<p class="error_ajax">Format not matched . To check correct format download sample Csv. </p>']);
                }
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
                              'name'  => 'required',
                              'email' => ['required',Rule::unique('members')->where(function ($query) use($Auid) {return $query->where('user_id', $Auid);})],
                              'phone' => 'integer|digits:10'
                              
                            ]);

                          if ($v->fails()) {
                             $error[$key+1] =$v->getMessageBag()->toArray();
                             continue;
                          }

                                Member::updateOrcreate([
                                'email' => $memberDataArray[1],
                                'user_id' => $Auid
                                ],$data);
                        }
                    } 
                    $error_html= '';
                    if(count($error) > 0){
                        //print_r($error);
                      foreach ($error as $keys => $errors) {
                           foreach ($errors as $key => $value) {
                           }
                            $error_html.= "<p class='error_ajax'>Row ".$keys.", ".$value[0]." </p>";
                            
                        }  
                        return response()->json(['status' => 'error', 'msg' =>$error_html]);
                    }else{
                        $error_html.= "<p class='success_ajax'>Contact upload successfully.</p>";
                        return response()->json(['status' => 'success', 'msg' =>$error_html]);

                    }
                     
                }else{
                   return response()->json(['status' => 'error', 'msg' =>'<p class="error_ajax">Please upload the valid csv.</p>']); 
                }
            }else{
                return response()->json(['status' => 'error', 'msg' =>'<p class="error_ajax">Please upload the csv file only.</p>']);
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

    public function super()
    {   
        $id =  Auth::id();
        $data = User::where('role',2)->get();
        //echo "<pre>";
        //print_r($data);die();
        return view('front.super.members',compact('data'));
    }

    public function getUserContact(Request $request, $id ){

         $data = Member::where('user_id',$id)->get();
        return view('front.super.allMembers',compact('data'));

    }
}
