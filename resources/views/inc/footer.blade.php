<hr>
<div style="background-color: dimgrey">
    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary" >
      <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
          {{-- footer logo --}}
          <div class="col-lg-3 mb-3">
            <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="#" aria-label="Bootstrap">
              <img src="{{ asset('assets/image/icon.png') }}" alt="Logo" style="max-width: 60px; max-height: 60px;">
               <span style="font-size: 1.50rem; font-weight: bold" class=" ">
                {{ config('app.name', 'Laravel') }}
               </span>
             </a>
            <ul class="list-unstyled small">
              <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.3/about/team/">Authority team</a> with the help of <a href="">our contributors</a>.</li>
              <li class="mb-2">Code licensed <a href="" target="_blank" rel="license noopener">MIT</a>, docs <a href="" target="_blank" rel="license noopener">CC BY 3.0</a>.</li>
            </ul>
          </div>
          <div class="col-6 col-lg-2 offset-lg-1 mb-3">
            <h5>Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="{{ URL('/') }}">Home</a></li>
              <li class="mb-2"><a href="">Docs</a></li>
              <li class="mb-2"><a href="">Examples</a></li>
              <li class="mb-2"><a href="">Icons</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2 mb-3">
            <h5>Guides</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="">Getting started</a></li>
              <li class="mb-2"><a href="">Starter template</a></li>
              <li class="mb-2"><a href="">Webpack</a></li>
              <li class="mb-2"><a href="">Parcel</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2 mb-3">
            <h5>Projects</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Community</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">previledged</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Icons</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">RFS</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2 mb-3">
            <h5>Community</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Issues</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Discussions</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Corporate sponsors</a></li>
              <li class="mb-2"><a href="" target="_blank" rel="noopener">Open Collective</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></body>
    
    </html>