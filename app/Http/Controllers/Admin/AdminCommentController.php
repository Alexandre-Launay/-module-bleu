<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexWithoutTrashed()
    {
        Gate::authorize('viewWithoutTrashed', Comment::class);
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexOnlyTrashed()
    {
        Gate::authorize('viewOnlyTrashed', Comment::class);
        $comments = Comment::onlyTrashed()->get();
        return view('admin.comments.trashed', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Commentaire supprimé');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $comment = Comment::onlyTrashed()->findOrFail($id);
        Gate::authorize('restore', $comment);
        $comment->restore();
        return redirect()->route('admin.comments.index')->with('success', 'Commentaire restauré');
    }
}
