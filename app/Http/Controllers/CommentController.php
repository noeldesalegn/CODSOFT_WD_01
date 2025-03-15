<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
//    public function store(Request $request)
//    {
//        $request->validate([
//            'post_id' => 'required|exists:posts,id',
//            'body'    => 'required|min:5',
//        ]);
//
//        Comment::create([
//            'post_id' => $request->id,
//            'user_id' => auth()->id(),
//            'body'    => $request->body,
//        ]);
//
//        return back()->with('success', 'Comment added successfully!');
//
//
//   }
public function store(Request $request)
{
//    dd($request->all());
    $validatedData = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'body'    => 'required|min:5',
    ]);

    $comment = Comment::create([
        'post_id' => $validatedData['post_id'],
        'user_id' => auth()->id(),
        'body'    => $validatedData['body'],
    ]);
    // Debug: dump the newly created comment
//     dd($comment);

    return back()->with('success', 'Comment added successfully!');}
}
