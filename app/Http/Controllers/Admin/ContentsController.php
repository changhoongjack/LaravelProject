<?php

namespace App\Http\Controllers\Admin;

use Session;

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

         //$contents = Content::all();
         $contents = Content::where('status','Submitted')->get();
                    //->where('status','Submitted')
                    

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

    public function show(Content $content, $storybookID)
    {

         abort_unless(\Gate::allows('content_show'), 403);

        $content = Content::where('storybookID' , $storybookID )->first();

        Session::put('key', $storybookID);
        session(['key' => $storybookID]);
        //session()->forget('content');
        //Session::push('content',$content);

         
        return view('admin.Contents.show', compact('content'));
    }


    



    // public function destroy(Product $product)
    // {
    //     abort_unless(\Gate::allows('content_delete'), 403);

    //     $contents->delete();

    //     return back();
    // }

    // public function massDestroy(MassDestroyProductRequest $request)
    // {
    //     Content::whereIn('id', request('ids'))->delete();

    //     return response(null, 204);
    // }
}
