<?php

namespace App\Http\Controllers\Admin;


use Session;
use Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

use Auth;
//use Illuminate\Support\Facades\Request;
// use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreApproveRequest;
use App\Http\Requests\UpdateApproveRequest;
use App\ToMark;
use App\Content;
use App\User;
//use App\Storybooklibrary;
use App\Rejectedbook;



class ToMarkController extends Controller
{
    public function index(Request $request)
    {
         abort_unless(\Gate::allows('tomark_access'), 403);

        return view('admin.ToMarks.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('tomark_create'), 403);

        return view('admin.ToMarks.create');
    }

    public function store(StoreApproveRequest $request)
    {
        abort_unless(\Gate::allows('tomark_create'), 403);

        if ($request->get('Status') == 'Approve'){

            Session::get('content');
            $key = Session::get('storybookID');
            $languageCode = Session::get('lang');
            
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
        abort_unless(\Gate::allows('tomark_edit'), 403);

        return view('admin.Contents.edit', compact('content'));
    }

    public function update(UpdateApproveRequest $request)
    {
        abort_unless(\Gate::allows('tomark_edit'), 403);

        if ($request->get('Status') == 'Approve'){

            Session::get('content');
            $storybookID = Session::get('storybookID');
            $languageCode = Session::get('lang');
            
            $id = Auth::user()->name;
            $update = Request::all();

            $content1 = Content::where('storybookID', $storybookID)->where('languageCode', $languageCode)->update(['Comments' => $update['Comments'], 'status' => $update['StatusAPP'], 'Reviewer' => $id]);

            // //$content = Content::where('storybookID',$key)->where('languageCode', $languageCode)->get();
           
            // $content1->Comments = $update['Comments'];
            // $content1->status = $update['StatusAPP'];
            // $content1->Reviewer = $id;

           // dd($content1);
           // $content1->save();
            
            // Content::where('languageCode', $languageCode)
            //         ->first()
            //         ->update(['Comments' => $update['Comments'], 'status' => $update['StatusAPP'], 'Reviewer' => $id]);
     

        }

        else if ($request->get('Status') == 'Reject'){

            Session::get('content');
           $storybookID = Session::get('storybookID');
            $languageCode = Session::get('lang');
            
            $id = Auth::user()->name;
            $update = Request::all();

            $content1 = Content::where('storybookID', $storybookID)->where('languageCode', $languageCode)->update(['Comments' => $update['Comments'], 'status' => $update['StatusREJ'], 'Reviewer' => $id]);
            

        }
        return redirect()->route('admin.Contents.index');
    }

    public function show(ToMark $tomarks , $languageCode)
    {

         abort_unless(\Gate::allows('tomark_show'), 403);

         $value = Session::get('storybookID');
 
         $tomarks = ToMark::where('storybookID' , $value )
                            ->where('languageCode', $languageCode)
                            ->orderBy('pageNo', 'ASC')
                            ->get();
                            
         Session::put('lang', $languageCode);


         $testcontent = Content::where('storybookID', $value)->get();

         session()->forget('content');
         Session::push('content',$testcontent);
         
        return view('admin.Tomarks.show', compact('tomarks'));
    }



}
