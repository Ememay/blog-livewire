<main class="main container-fluid">
    <div id="searchedArticles" class="row justify-content-center col-12 m-auto px-0">

        <div class="col-12 row justify-content-center align-items-center mt-3 py-2">
            <div class="col-12 col-md-6 form-group search_box">
                <input type="text" class="form-control rounded_5 placeholder_gray shadow-sm h_2_5"
                    placeholder="عنوان رو وارد کن" value="{{$char}}" wire:model.debounce.800ms="char"/>
                <a href="/search.html" class="fas fa-search search_btn"></a>
            </div>
            <div class="col-12 col-md-6 form-group search_box">
                <select name="" id="" class="rounded_5 outline_0 h_2_5 border-0 form-control" wire:model="catId">
                    <option value="0">انتخاب بر اساس گروه</option>
                    @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->title}}</option>               
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 text-right">
            <h4 class="pt-4 pb-1 text-info">مقالات یافت شده</h4>
            <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
        </div>

        <div class="row col-12 col-md-11 justify-content-center align-items-center">

            @foreach ($results as $result)
                <livewire:includes.article-card :articles="$result" :key="$result->id">
            @endforeach
            {{$results->links()}}


        </div>


    </div>

</main>
