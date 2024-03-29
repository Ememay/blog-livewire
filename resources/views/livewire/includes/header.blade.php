<header class="container-fluid bg-light shadow sticky-top py-1 w_100vw">
    <div class="row m-0 justify-content-between w-100 align-items-center">
      <ul class="d-flex menu_top align-items-center">
        <li class="logo_top animate__animated animate__flip">
          <a href="/">
          <img src="/assets/images/logo.png" />

          </a>
        </li>
        <li class="mx-3 cursor_pointer_text_shadow font_1_1">
          <a href="/search/0/">مقالات</a>
          <span></span>
        </li>
        @if(Auth::check())
        <li class="mx-3 cursor_pointer_text_shadow font_1_1">
          سلام {{auth()->user()->name}}
          <span></span>
        </li>
        <li class="mx-3 cursor_pointer_text_shadow font_1_1">
            <a href="/logout">خروج</a>
          <span></span>
        </li>
        @else
        <li class="mx-3 cursor_pointer_text_shadow font_1_1">
          <a href="/login">ورود</a>
          <span></span>
        </li>
        @endif

        <li class="mx-3 cursor_pointer_text_shadow font_1_1">
          درباره ما
          <span></span>
        </li>
        <li class="d-block d-md-none mx-4">
          <a href="/" class="fas fa-search fa-2x cursor_pointer_text_shadow "></a>
        </li>
      </ul>
      <div class="col-12 col-md-4 form-group search_box  d-none d-md-block">
        <input
          type="text"
          class="form-control rounded_5 placeholder_gray shadow-sm"
          placeholder="دنبال چی می گردی؟" wire:model="searchChar"
        />
        <a href="/search/0/{{$searchChar}}" class="fas fa-search search_btn"></a>
      </div>
    </div>
  </header>