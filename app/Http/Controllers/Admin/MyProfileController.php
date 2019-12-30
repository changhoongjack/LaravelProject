<?php

namespace App\Http\Controllers\Admin;

use Session;
use Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
//use Illuminate\Support\Facades\Request;
// use App\Http\Requests\MassDestroyProductRequest;
// use App\Http\Requests\StoreApproveRequest;
// use App\Http\Requests\UpdateApproveRequest;
// use App\ToMark;
// use App\Content;
use App\User;
//use App\Storybooklibrary;
// use App\Rejectedbook;



class MyProfileController extends Controller
{
    public function index(Request $request)
    {
         abort_unless(\Gate::allows('myprofile_access'), 403);

         $id = Auth::user()->name;

         $myprofiles = User::where('name' , $id )->get();

        return view('admin.myProfile.index', compact('myprofiles'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('myprofile_create'), 403);

        return view('admin.ToMarks.create');
    }

    public function store(StoreApproveRequest $request )
    {
        abort_unless(\Gate::allows('myprofile_create'), 403);

        if ($request->get('Status') == 'Approve'){

            Session::get('content');
            $key = Session::get('key');

            $id = Auth::user()->name;
            $update = Request::all();

            $content = Content::find($key);
            $content->Comments = $update['Comments'];
            $content->status = $update['StatusAPP'];
            $content->Reviewer = $id;
            $content->save();

        }

        else if ($request->get('Status') == 'Reject'){

            Session::get('content');
            $key = Session::get('key');
           
            $id = Auth::user()->name;
            $update = Request::all();

            $content = Content::find($key);
            $content->Comments = $update['Comments'];
            $content->status = $update['StatusREJ'];
            $content->Reviewer = $id;
            $content->save();

        }
         return redirect()->route('admin.Contents.index');
        
    }

    public function edit(Content $content)
    {
        abort_unless(\Gate::allows('myprofile_edit'), 403);

        return view('admin.Contents.edit', compact('content'));
    }

    public function update(UpdateApproveRequest $request, Tomark $tomarks)
    {
        abort_unless(\Gate::allows('tomark_edit'), 403);

        return redirect()->route('admin.Contents.index');
    }

    public function show(ToMark $tomarks,  $value )
    {

         abort_unless(\Gate::allows('tomark_show'), 403);

         $value = Session::get('key');

         $value = session('key');
 
         $tomarks = ToMark::where('storybookID' , $value )->get();
           
         $testcontent = Content::where('storybookID', $value)->get();

         session()->forget('content');
         Session::push('content',$testcontent);

            // dd($request->all());
         
        return view('admin.Tomarks.show', compact('tomarks'));
    }



}
