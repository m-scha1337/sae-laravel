<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $postings = Posting::with('user')->get();

        return view('postings.index', compact('postings')); // ['postings' => $postings]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $posting = new Posting();
        $posting->fill($request->old());

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
           'image' => 'nullable|mimes:jpeg,png',
        ]);

        $posting = new Posting();
        $posting->fill($request->all());
        // $posting->title = $request->get('title');
        // $posting->text = $request->get('text');
        $posting->is_featured = $request->has('is_featured');
        $posting->user_id = auth()->id();

        if ($image = $request->file('image')) {

            $name = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('public/images', $name);
            $posting->image_path = $name;
        }

        $posting->save();

        // $posting->categories()->attach($request->get('category_ids'));

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
    public function edit(Request $request, $id)
    {
        $posting = Posting::find($id);
        $posting->fill($request->old());

        return view('postings.edit', compact('posting'));
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
        // https://laravel.com/docs/7.x/validation#available-validation-rules

        $this->validate($request, [

            'title' => 'required|min:3|max:192',
            'text' => 'nullable',
        ]);

        $posting = Posting::find($id);
        $posting->fill($request->all());
        $posting->is_featured = $request->has('is_featured');
        $posting->save();

        return redirect()->route('postings.show', $id)->with('success', 'Posting updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posting = Posting::find($id);

        if ($posting->image_path) {

            Storage::delete('public/images/'.$posting->image_path);
        }

        $posting->delete();

        return redirect()->route('postings.index')->with('success', 'Posting deleted!');
    }
}
