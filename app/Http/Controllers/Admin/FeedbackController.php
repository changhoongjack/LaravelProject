<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Http\Controllers\Controller;
// use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreFeedbackRequest;
// use App\Http\Requests\UpdateProductRequest;
use App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
         abort_unless(\Gate::allows('feedback_access'), 403);

         $feedbacks = Feedback::all();

        return view('admin.Feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('feedback_create'), 403);

        return view('admin.Feedback.create');
    }

    public function store(StoreFeedbackRequest $request)
    {
        abort_unless(\Gate::allows('feedback_create'), 403);

        $feedback = Feedback::create($request->all());

        return redirect()->route('admin.Feedback.index');
    }

    // public function edit(Content $content)
    // {
    //     abort_unless(\Gate::allows('feedback_edit'), 403);

    //     return view('admin.Contents.edit', compact('content'));
    // }

    // public function update(UpdateContentRequest $request, Content $content)
    // {
    //     abort_unless(\Gate::allows('feedback_edit'), 403);

    //     $content->update($request->all());

    //     return redirect()->route('admin.Feedback.index');
    // }

    public function show(Feedback $feedback, $FeedbackID)
    {

         abort_unless(\Gate::allows('feedback_show'), 403);

        $feedback = Feedback::where('FeedbackID' , $FeedbackID )->first();

        

         
        return view('admin.Feedback.show', compact('feedback'));
    }

}