  <div class="post">
    <div class="post-img">
      <img src="{{ $post['media_url'] }}" alt="" style = "height: 200px; width: 250px;">
    </div>
    <div class="post-cap">
      <p>{!! nl2br(e($post['caption'])) !!}</p>
    </div>
  </div>
