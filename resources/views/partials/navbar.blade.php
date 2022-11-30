<div class="navbar sticky top-0 shadow-sm bg-base-100 z-50 select-none">
  <div class="navbar-start">
    <label tabindex="0" class="btn btn-ghost lg:hidden btn-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
    <a class="btn btn-ghost no-animation normal-case text-xl">MyStock</a>
    {{-- <img src="{{ asset('image/logo.png') }}" alt="" class="w-24 mx-5 "> --}}
  </div>

  <div class="navbar-end">
    <div class="hidden lg:block">
        @auth
        <span class="mx-5">
            {{Auth::user()->username}}
            -
            <span class="font-semibold
                {{ (Auth::user()->level_user->nama_level === 'admin') ? 'text-red-500' : '' }}
                {{ (Auth::user()->level_user->nama_level === 'manajemen') ? 'text-green-500' : '' }}
                {{ (Auth::user()->level_user->nama_level === 'kaprog') ? 'text-sky-500' : '' }}
            ">
                {{ Auth::user()->level_user->nama_level }}
            </span>
        </span>
        @endauth
    </div>
  <button data-toggle-theme="winter,halloween" class="btn btn-sm btn-outline mx-5" data-act-class="ACTIVECLASS">theme</button>

    <form action="logout" method="POST">
      @csrf

     <div class="dropdown dropdown-end">

      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="https://placeimg.com/80/80/people" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
        <li>
          <a class="justify-between">
            Profile
            {{-- @auth
            <span class="badge badge-primary">{{ Auth::user()->level_user->nama_level }}</span>
            @endauth --}}
          </a>
        </li>
        <li>

            <button type="submit">Keluar</button>

        </li>
      </ul>
    </div>
  </div>
</form>
</div>

