<main class="main container">

    <div class="row my-4">
        <div id="articleRight" class="col-12 col-md-8 col-xl-9">
            <div class="p-2 bg-light rounded">
                <h1 class="text-center font_2 py-2">{{ $article->h_title }}</h1>
                <div class="image text-center">
                    <img src="{{ $article->image }}" alt="توضیح تصویر">
                </div>
                <div class="p-2 text_container">
                    {!! $article->text !!}
                </div>
            </div>
        </div>

        <div id="articleLeft" class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
            <div class="row bg-light px1 py-5 text-center justify-content-center d-flex rounded w-100 m-auto">
                <div class="image rounded-circle overflow-hidden h_10 w_10 text-center justify-content-center">
                    <img class="max_w_100 m-auto" src="/assets/images/logo.png" alt="توضیح تصویر">
                </div>

                <div class="col-12 mt-3 justify-content-center">
                    <small class="text-center d-block">نویسنده:</small>
                    <h6 class="text-center">{{ $article->writer_name }}</h6>

                    <small class="text-center d-block mt-3">تاریخ:</small>
                    <h6 class="text-center">{{ $article->created_at->diffforhumans() }}</h6>

                    <div class="col-12 justify-content-center text-center mt-3">
                        <span class="text-center">بازدید : <br> {{ $article->view_count }} </span>
                    </div>

                    <div class="col-12 justify-content-center text-center mt-3">
                        <a href="#" class="btn rounded_5 btn-outline-dark">دیگر مقالات </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-center align-items-center alert-secondary p-3">

        <div class="row p-3 justify-content-center text-right alert-light d-block mb-4 col-12">

            @foreach (explode('-', $article->keywords) as $keyword)
                <span class="badge p-3 badge-secondary font-weight-normal">{{ $keyword }}</span>
            @endforeach

        </div>

        @if (Auth::check())
            <div class="col-12 row justify-content-center form-group">
                <h5 class="col-12 text-center">متن نظر:</h5>
                <textarea rows="10" class="form-control rounded shadow col-12 col-md-10 {{ $isAnswer ? 'bg-warning' : '' }}"
                    wire:model="comment_text"></textarea>
                <div class="col-12 mr-5">
                    @if ($isAnswer)
                        <button class="btn btn-primary mt-2 d-inline mr-5" wire:click="addAnswer">ثبت پاسخ</button>
                        <button class="btn btn-warning mt-2 d-inline"
                            wire:click="$set('isAnswer',false)">انصراف</button>
                    @else
                        <button class="btn btn-primary mt-2 d-block mr-5" wire:click="addComment">ثبت نظر</button>
                    @endif
                </div>
            </div>
        @else
            <a href="/register">برای گذاشتن نظر ابتدا باید ثبت نام کنید</a>
        @endif


        <div class="col-12 col-md-11 bg-white p-3">
            <div class="row my-2 d-block p-2 rounded shadow-sm border_1 col-11 m-auto shadow">

                @foreach ($comments as $comment)
                    <div class="row justify-content-lg-between w-100 m-auto">
                        <h6 class="text-right text-success">{{ $comment->user->name }} در تاریخ
                            {{ $comment->created_at->diffforhumans() }}</h6>
                        <span>
                            @if (Auth::check())
                                @if (Auth::user()->id == $comment->user_id)
                                    <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"
                                        wire:click="deleteComment({{ $comment->id }})"></i>
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class=" w-100 pb-3">
                        <p class="text-justify">{{ $comment->text }}</p>
                        <button class="btn btn-primary rounded_5 px-3"
                            wire:click="readyToAnswer({{ $comment->id }})">پاسخ</button>
                    </div>
                    @foreach ($answers as $answer)
                    @if($answer->parent_id == $comment->id)
                    <div class="answer shadow-sm alert-success p-2">
                        <h6 class="text-right text-primary">پاسخ</h6>
                        <div class="row justify-content-lg-between w-100 m-auto">
                            <h6 class="text-right text-info">{{ $answer->user->name }} در تاریخ
                                {{ $answer->created_at->diffforhumans() }}</h6>
                            <span>
                                <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"  wire:click="deleteComment({{ $answer->id }})" ></i>
                            </span>
                        </div>
                        <p>{{ $answer->text }}</p>
                    </div>
                @endif
                @endforeach
                @endforeach


               




            </div>
        </div>
    </div>

</main>
