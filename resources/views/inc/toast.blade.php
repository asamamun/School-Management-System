@if (session('status'))
<div class="toast align-items-center bg-success text-white fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ session('status') }}
    </div>
    <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif

@if (session('error'))
<div class="toast align-items-center bg-danger text-white fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ session('error') }}
    </div>
    <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif

@if (session('info'))
<div class="toast align-items-center bg-info text-white fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ session('info') }}
    </div>
    <button type="button" class="btn-close text-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif

@if (session('warning'))
<div class="toast align-items-center bg-warning text-dark fixed bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ session('warning') }}
    </div>
    <button type="button" class="btn-close text-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif


