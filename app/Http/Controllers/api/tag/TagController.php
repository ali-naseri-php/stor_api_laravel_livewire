<?php

namespace App\Http\Controllers\api\tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::select('name')->get();
        return response()->json(['tags' => $tags], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->tags) {


            foreach ($request->tags as $tag) {


                $validator = Validator::make($tag, [
                    'tagable_type' => 'required|string|max:255|min:2|',
                    'name' => 'required|string|max:255|min:2|',
                    'tagable_id' => 'required|integer|max:255'
                ]);
                if ($validator->fails())
                    return response()->json(['errors' => $validator->errors()], 422);
//           dd('ali');
            }

        } else {
            return response()->json(['errors' => 'error for array tags'], 422);

        }

        foreach ($request->tags as $item) {
            $tag = new Tag();
            $tag->tagable_type = 'App/Models/' . $item['tagable_type'];
            $tag->name = $item['name'];
            $tag->tagable_id = $item['tagable_id'];
            $tag->save();
        }
        return response()->json(['msg' => 'save ok !'], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2'
        ]);


        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $tag->name = $request->name;
        $tag->save();

        return response()->json(['msg' => 'save update ok !'], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
