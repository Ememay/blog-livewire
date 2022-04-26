<?php

namespace App\Http\Livewire\Includes;

use App\Models\article as ModelsArticle;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{

    public $article;
    public $comment_text;
    public $isAnswer = false;
  

    
    public function mount($id)
    {
        $this->article = ModelsArticle::find($id);
    }


    public function addComment()
    {
        $newComment = new comment();
        $newComment->user_id = Auth::id();
        $newComment->article_id = $this->article->id;
        $newComment->text = $this->comment_text;
        $newComment->is_active = 1;
        $newComment->parent_id = 0;
        $newComment->save();
        $this->clearInputs();
        $this->emit('Alert','نظر شما با موفقیت ثبت شد','success');
    }


    public function deleteComment($id){
        comment::find($id)->delete();
        $this->emit('Alert','نظر شما با موفقیت ثبت شد','error');
    }




    public function readyToAnswer($id){
        $this->commentId = $id;
        $this->isAnswer = true;

    }


    public function addAnswer(){
        $newComment = new comment();
        $newComment->user_id = Auth::id();
        $newComment->article_id = $this->article->id;
        $newComment->text = $this->comment_text;
        $newComment->is_active = 1;
        $newComment->parent_id = $this->commentId;;
        $newComment->save();
        $this->clearInputs();
        $this->isAnswer = false;
        $this->emit('Alert','پاسخ شما با موفقیت ثبت شد','success');
    }



    public function clearInputs()
    {
        $this->comment_text = '';
    }


    public function render()
    {

        $comments = comment::where([
            ['article_id', $this->article->id],
            ['parent_id', 0]
        ])->get();

        $answers = comment::where([
            ['article_id', $this->article->id],
            ['parent_id', '>', 0]
        ])->get();
        

        return view('livewire.includes.article',['comments'=>$comments , 'answers' => $answers]);
    }
}
