<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Content;

class ContentsController extends Controller
{
    public function index()
    {
         abort_unless(\Gate::allows('content_access'), 403);

         
         $contents = Content::select('storybookID', 'storybookGenre', 'storybookCover',  'status')
                    //->except('languageCode')
                    //->groupBy('storybookID')
                    ->where('status','Submitted')
                    //->groupBy('storybookID','storybookTitle', 'storybookCover', 'storybookDesc', 'storybookGenre', 'dateOfCreation', 'status')
                    ->distinct()
                    ->get();
         
                    
        //  Session::put('storybookID', $storybookID);

          

                   
        return view('admin.Contents.index', compact('contents'));
    }

    // public function create()
    // {
    //     abort_unless(\Gate::allows('content_create'), 403);

    //     return view('admin.products.create');
    // }

    public function store(StoreContentRequest $request)
    {
        abort_unless(\Gate::allows('content_create'), 403);

        $content = Content::create($request->all());

        return redirect()->route('admin.products.index');
    }

    public function edit(Content $content)
    {
        abort_unless(\Gate::allows('content_edit'), 403);

        return view('admin.Contents.edit', compact('content'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        abort_unless(\Gate::allows('content_edit'), 403);

        $content->update($request->all());

        return redirect()->route('admin.Contents.index');
    }

    public function show($languageCode)
    {
         abort_unless(\Gate::allows('content_show'), 403);

        $storybookID = Session::get('storybookID');
        $content = Content::where('languageCode', $languageCode )
                    ->where('storybookID', $storybookID)
                    ->first();
        
        Session::put('language', $languageCode);
        //session(['test123' => $languageCode]);
        //session()->forget('content');
        //Session::push('content',$content);
        //dd(session()->all());
       
        return view('admin.Contents.show', compact('content'));
       

    }

}
