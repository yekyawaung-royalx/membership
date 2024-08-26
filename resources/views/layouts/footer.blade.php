<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      © <script>
      document.write(new Date().getFullYear())
      </script>
      , made with ❤️ by <a href="javascript:void();" class="footer-link fw-bolder">Business Support Team</a>
    </div>
    <div>
      @if(Auth::check())
        @if(profile()->role == 1)
       <a href="{{ url('telescope') }}" class="btn btn-primary btn-sm" target="_blank">Telescope</a>
        <a href="{{ url('pulse') }}" class="btn btn-primary btn-sm" target="_blank">Pulse</a>
        @endif
        @endif
    </div>
  </div>
</footer>