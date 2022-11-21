<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>


    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content lg:w-3/4 flex-col lg:flex-row-reverse gap-7">

            <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Login now!</h1>
            <p class="py-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, laboriosam ratione odit expedita aliquid eos. Porro quas sit repellendus quo mollitia dolor eum impedit temporibus, ab architecto, nulla, a dicta. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam reiciendis animi rem eligendi eos corrupti, cupiditate ex autem dolor? Qui vel ea dolore sed blanditiis repudiandae sapiente exercitationem, suscipit itaque.</p>
            </div>


            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
              @if($errors->any())
              @foreach($errors->all() as $err)
              <span class="alert alert-error shadow-lg">{{ $err }}</span>
              @endforeach
              @endif
              <form action="/login" method="POST">
                @csrf
                <div class="form-control">
                <label class="label">
                    <span class="label-text" for="email">Username</span>
                </label>
                <input type="email" name="email" id="email" placeholder="email" class="input input-bordered @error('email') @enderror"  autofocus required value="{{ old ('email') }}"/>

                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                </div>
                <div class="form-control">
                  <label class="label" for="password">
                      <span class="label-text" name="password" id="password" required>Password</span>
                  </label>
                  <input type="password" name="password" placeholder="password" class="input input-bordered" />
                  <label class="label">
                      <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                  </label>
                </div>
                <div class="form-control mt-6 w-full">
                 <button type="submit" class="btn btn-info">Login</button>
                </div>
              </form>
            </div>
            </div>
        </div>
    </div>
  </form>
<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
