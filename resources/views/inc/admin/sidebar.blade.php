<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link"href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- admin access --}}
                @auth
                    @if (Auth::user()->role == 'admin')
                        {{-- Setting --}}
                        <div class="sb-sidenav-menu-heading">Setting</div>
                        <a class="nav-link collapsed {{ Request::is('shift*') || Request::is('section*') || Request::is('subject*') || Request::is('assignsubject*') || Request::is('standards*') ? 'fw-bold' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#Academic" aria-expanded="false"
                            aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Academic
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ Request::is('shift*') || Request::is('section*') || Request::is('subject*') || Request::is('assignsubject*') || Request::is('standards*') ? 'show' : '' }}"
                            id="Academic" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('shift*') ? 'active fw-bold' : '' }}"
                                    href="{{ route('shift.index') }}">Shift</a>
                                <a class="nav-link {{ Request::is('section*') ? 'active fw-bold' : '' }}"
                                    href="{{ route('section.index') }}">Section</a>
                                <a class="nav-link {{ Request::is('subject*') ? 'active fw-bold' : '' }}"
                                    href="{{ route('subject.index') }}">Subject</a>
                                <a class="nav-link {{ Request::is('assignsubject*') ? 'active fw-bold' : '' }}"
                                    href="{{ route('assignsubject.index') }}">Subject Assign</a>
                                <a class="nav-link {{ Request::is('standards*') ? 'active fw-bold' : '' }}"
                                    href="{{ route('standards.index') }}">Standards</a>
                            </nav>
                        </div>
                    @endif
                @endauth
                {{-- Student --}}
                {{-- <div class="sb-sidenav-menu-heading">Student</div> --}}
                <a class="nav-link collapsed {{ Request::is('student*') || Request::is('shift*') || Request::is('section*') || Request::is('subject*') ? 'fw-bold' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#Student" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Admission
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('student*') || Request::is('enrollment*') ? 'show' : '' }}"
                    id="Student" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('student*') ? 'active fw-bold' : '' }}"
                            href="{{ route('student.index') }}">Studen Info</a>
                        <a class="nav-link {{ Request::is('enrollment*') ? 'active fw-bold' : '' }}"
                            href="{{ route('enrollment.index') }}">Enrollment</a>
                        {{-- <a class="nav-link {{ Request::is('shift*') ? 'active fw-bold' : '' }}"
                            href="{{ route('section.index') }}">Section</a>
                        <a class="nav-link {{ Request::is('shift*') ? 'active fw-bold' : '' }}"
                            href="{{ route('subject.index') }}">Subject</a> --}}
                    </nav>
                </div>

                {{-- Fees --}}

                {{-- <div class="sb-sidenav-menu-heading">Fees</div> --}}
                <a class="nav-link collapsed {{ Request::is('feegroup*') || Request::is('feetype*') || Request::is('feemaster*') || Request::is('feeassign*') || Request::is('feecollect*') ? 'fw-bold' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#Fee" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Fees
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('feegroup*') || Request::is('feetype*') || Request::is('feemaster*') || Request::is('feeassign*') || Request::is('feecollect*') ? 'show' : '' }}"
                    id="Fee" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('feegroup*') ? 'active fw-bold' : '' }}"
                            href="{{ route('feegroup.index') }}">Group</a>
                        <a class="nav-link {{ Request::is('feetype*') ? 'active fw-bold' : '' }}"
                            href="{{ route('feetype.index') }}">Type</a>
                        <a class="nav-link {{ Request::is('feemaster*') ? 'active fw-bold' : '' }}"
                            href="{{ route('feemaster.index') }}">Master</a>
                        <a class="nav-link {{ Request::is('feeassign*') ? 'active fw-bold' : '' }}"
                            href="{{ route('feeassign.index') }}">Assign</a>
                        <a class="nav-link {{ Request::is('feecollect*') ? 'active fw-bold' : '' }}"
                            href="{{ route('feecollect.index') }}">Collect</a>
                    </nav>
                </div>
                 {{-- Exam --}}

                {{-- <div class="sb-sidenav-menu-heading">Examination</div> --}}
                <a class="nav-link collapsed {{ Request::is('exam*') || Request::is('grade*') || Request::is('mark*') ? 'fw-bold' : '' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#Exam" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Examination
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('exam*') || Request::is('grade*') || Request::is('mark*') ? 'show' : '' }}"
                    id="Exam" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('exam*') ? 'active fw-bold' : '' }}"
                            href="{{ route('exam.index') }}">Exam</a>
                        <a class="nav-link {{ Request::is('grade*') ? 'active fw-bold' : '' }}"
                            href="{{ route('grade.index') }}">Grade</a>
                        <a class="nav-link {{ Request::is('mark*') ? 'active fw-bold' : '' }}"
                            href="{{ route('mark.index') }}">Mark</a>
                    </nav>
                </div>
                {{-- attendance --}}
                <a class="nav-link"href="{{ route('attendance.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div>
                    Attendance
                </a>
                {{-- /attendance --}}
                {{-- Interface --}}
                {{-- <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> --}}
                {{-- Addons --}}
                {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
