<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Content;

class ContentsApiController extends Controller
{
    public function index()
    {
        $contents = Content::all();

        return $contents;
    }

    public function store(StoreContentRequest $request)
    {
        return Content::create($request->all());
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        return $content->update($request->all());
    }

    public function show(Content $content)
    {
        return $content;
    }

   

    public function destroy(Content $content)
    {
        return $content->delete();
    }
}