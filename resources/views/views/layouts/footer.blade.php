@if(!isset($_COOKIE['cookie_save']))
  <!-- Cookie Banner -->
  <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
          🍪 {!!  __('cookies.message') !!}
          <a target="_blank" class="linkCookie" href="{{ route('cookies.index') }}">{!!  __('cookies.message_part2') !!}</a>
        </div>
        <div class="col-md-1">
          <div class="closeCookie linkCookie">
            <i onclick="window.cb_hideCookieBanner()" class="fas fa-times"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Cookie Banner -->
@endif