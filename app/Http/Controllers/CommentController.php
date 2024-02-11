<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function storeComment(CommentRequest $request)
    {
        $formFields = $request->validated();

        $articleId = $request->article;

        $formFields['article_id'] = $articleId;
        // insertion
        Comment::create($formFields);

        return redirect()->route('front.showArticle', $articleId);
    }

    public function storeCommentAdmin(CommentRequest $request, $article)
    {
        
        $formFields = $request->validated();
        dd($formFields);

        // $formFields = $request->validated();

        // $articleId = $request->article;

        // $formFields['article_id'] = $articleId;
        // // insertion
        // Comment::create($formFields);

        // 
    }

    public function destroyComment($article, Comment $comment){
        
        $comment->delete();
        return redirect()->route('article.show', $article);
    }
}
