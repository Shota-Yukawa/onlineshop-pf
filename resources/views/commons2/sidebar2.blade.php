
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
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.index', 'ALL', [], ['class' => 'sidelink']) !!}
      </li>
    </ul>
  </div>
</div>

<div class="sidebar-box">
  <div class="sidebar-title">
    <h3>Category</h3>
  </div>
  <div class="sidebar-content">
    <ul>
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.category', 'Tops一覧へ', ['cateid' => 1], ['class' => 'sidelink']) !!}
      </li>
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.category', 'Outer一覧へ', ['cateid' => 2], ['class' => 'sidelink']) !!}
      </li>
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.category', 'Bottoms一覧へ', ['cateid' => 3], ['class' => 'sidelink']) !!}
      </li>
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.category', 'Accesary一覧へ', ['cateid' => 4], ['class' => 'sidelink']) !!}
      </li>
      <li>
        <span class="fa fa-tag"></span>
        {!! link_to_route('admin.items.category', 'Others一覧へ', ['cateid' => 5], ['class' => 'sidelink']) !!}
      </li>
    </ul>
  </div>
</div>

<div class="sidebar-box">
  <div class="sidebar-title">
    <h3>SNS</h3>
  </div>
  <div class="sidebar-content">
    <ul>
      <li>
        <span class="fa fa-tag"></span>
        Instgram
      </li>
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
