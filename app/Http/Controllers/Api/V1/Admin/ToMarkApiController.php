<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApproveRequest;
use App\Http\Requests\UpdateApproveRequest;
use App\ToMark;
use App\Content;
use App\Storybooklibrary;

class ToMarksApiController extends Controller
{
    public function index()
    {
        $tomarks = ToMark::all();

        return $tomarks;
    }

    public function store(StoreApproveRequest $request)
    {
        return Storybooklibrary::create($request->all());
    }

    public function update(UpdateApproveRequest $request, ToMark $tomark)
    {
        return $tomark->update($request->all());
    }

    public function show(ToMark $tomark)
    {
        return $tomark;
    }

   

    public function destroy(ToMark $tomark)
    {
        return $tomark->delete();
    }
}