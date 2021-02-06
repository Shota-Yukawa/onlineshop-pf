      <div class="sidebar-top">
        <h3>TAGS</h3>
      </div>
      <div class="sidebar-box">
        <div class="sidebar-title">
          <h3>Items</h3>
        </div>
        <div class="sidebar-content">
          <ul>
            <li>
              <span class="fa fa-tag"></span>
              New
            </li>
            <li>
              <span class="fa fa-tag"></span>
              Reserve
            </li>
      @if (Auth::user())
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.index', 'ALL', [], ['class' => 'sidelink']) !!}
            </li>
      @else
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.index', 'ALL', [], ['class' => 'sidelink']) !!}
            </li>
      @endif
          </ul>
        </div>
      </div>

      <div class="sidebar-box">
        <div class="sidebar-title">
          <h3>Category</h3>
        </div>
        <div class="sidebar-content">
      @if (Auth::user())
          <ul>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.category', 'Tops一覧へ', ['cateid' => 1], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.category', 'Outer一覧へ', ['cateid' => 2], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.category', 'Bottoms一覧へ', ['cateid' => 3], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.category', 'Accesary一覧へ', ['cateid' => 4], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('user.items.category', 'Others一覧へ', ['cateid' => 5], ['class' => 'sidelink']) !!}
            </li>
          </ul>
      @else
          <ul>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.category', 'Tops一覧へ', ['cateid' => 1], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.category', 'Outer一覧へ', ['cateid' => 2], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.category', 'Bottoms一覧へ', ['cateid' => 3], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.category', 'Accesary一覧へ', ['cateid' => 4], ['class' => 'sidelink']) !!}
            </li>
            <li>
              <span class="fa fa-tag"></span>
              {!! link_to_route('guest.items.category', 'Others一覧へ', ['cateid' => 5], ['class' => 'sidelink']) !!}
            </li>
          </ul>
      @endif

        </div>
      </div>

      <div class="sidebar-box">
        <div class="sidebar-title">
          <h3>SNS</h3>
        </div>
        <div class="sidebar-content">
          <ul>
      @if (Auth::user())
            <li>
              <span class="fa fa-tag"></span>
              <a href="/user/instagram" class="sidelink">Instagram</a>
            </li>
      @else
            <li>
              <span class="fa fa-tag"></span>
              <a href="/instagram" class="sidelink">Instagram</a>
            </li>
      @endif
            <li>
              <span class="fa fa-tag"></span>
              Twitter
            </li>
            <li>
              <span class="fa fa-tag"></span>
              Wear
            </li>

          </ul>
        </div>
      </div>
