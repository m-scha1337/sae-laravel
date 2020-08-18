<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $postings = Posting::query()
            ->where('is_featured', true)
            ->where('like_count', '>', 100)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        */

        // $postings = Posting::featured()->popular()->latest()->get();

        $postings = Posting::all();

        return view('postings.index', compact('postings')); // ['postings' => $postings]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posting = new Posting();

        return view('postings.create', compact('posting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // https://laravel.com/docs/7.x/validation#available-validation-rules

        $this->validate($request, [

           'title' => 'required|min:3|max:192',
           'text' => 'nullable',
        ]);

        $posting = new Posting();
        $posting->fill($request->all());
        // $posting->title = $request->get('title');
        // $posting->text = $request->get('text');
        $posting->save();

        return redirect()->route('postings.index')->with('success', 'Posting created!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posting = Posting::find($id);

        return view('postings.show', compact('posting')); // ['posting' => $posting]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
