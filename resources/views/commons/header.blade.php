<header>
  <div class="header-inner">
@if(Auth::user())
    <div class="header-logo">
      <a href="/user/items">
        <h2>Rots Mrc</h2>
      </a>
    </div>
    <div class="header-right">
      <ul>
        <li class="nav-item">
          <a href="/user/home" class="nav-link">
            <span class=" fa fa-address-book"></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="/user/{{ $user->id }}/favorites" class="nav-link">
            <span class=" fa fa-heart"></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="/user/{{ $user->id }}/carts" class="nav-link">
            <span class=" fa fa-shopping-cart"></span>
          </a>
        </li>
      </ul>
    </div>
@else
    <div class="header-logo">
      <a href="/items">
        <h2>Rots Mrc</h2>
      </a>
    </div>

    @endif
  </div>
</header>
