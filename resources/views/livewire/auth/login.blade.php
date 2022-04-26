<main class="main container">

    <div class="row justify-content-center align-items-center">
      <form action="" class="bg_blur_light p-4 col-12 col-md-6 my-5 shadow ">
        <i class="fas fa-user-check fa-3x d-block text-center my-3"></i>
        <h5 class="text-center">فرم ورود</h5>
        <div class="form-group row justify-content-center">
          <input type="text" class="form-control rounded_5 col-10 col-md-8 shadow" placeholder="ایمیل"  wire:model="email">
        </div>
        @error('email')
            <small class="text-danger">{{$message}}</small>
        @enderror


        <div class="form-group row justify-content-center">
          <input type="text" class="form-control rounded_5 col-10 col-md-8 shadow" placeholder="کلمه عبور" wire:model="password">
        </div>
        @error('password')
            <small class="text-danger">{{$message}}</small>
        @enderror


        <div class="form-group row justify-content-center">
          <input type="checkbox" class="form-control outline_0 box_shadow_0 h-auto" wire:model="remember">
          مرا بخاطر بسپار
        </div>
        <div class="form-group row justify-content-center">
          <button class="btn btn-success rounded_5 px-5 shadow-sm" wire:click="login" type="button">ورود</button>
          <a href="/register" class="btn btn-warning rounded_5 px-5 shadow-sm mr-2">ثبت نام</a>
        </div>
      </form>

    </div>

  </main>