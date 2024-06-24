<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="{{set_active(['setting/page'])}}">
                    <a href="{{ route('setting/page') }}">
                        <i class="fas fa-cog"></i> 
                        <span>Settings</span>
                    </a>
                </li> --}}
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('home') }}" class="{{set_active(['home'])}}">Admin Dashboard</a></li>
                        {{-- <li><a href="{{ route('teacher/dashboard') }}" class="{{set_active(['teacher/dashboard'])}}">Teacher Dashboard</a></li>
                        <li><a href="{{ route('student/dashboard') }}" class="{{set_active(['student/dashboard'])}}">Student Dashboard</a></li> --}}
                    </ul>
                </li>
               
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span> Manajemen Pengguna</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Pengguna</a></li>
                    </ul>
                </li>

                <li class="submenu {{set_active(['berita/add/page','berita/edit/page'])}} {{ request()->is('berita/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-info-circle"></i>
                        <span> Informasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('berita/list/page') }}" class="{{set_active(['berita/list/page'])}} {{ request()->is('/edit/*') ? 'active' : '' }}"> Daftar Berita</a></li>
                        <li><a href="{{ route('berita/add/page') }}" class="{{set_active(['berita/add/page'])}}">Tambah Berita</a></li>
                        <li><a>Edit Berita</a></li>
                    </ul>
                </li>
                @endif

                <li class="submenu {{set_active(['student/list','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Siswa</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student/list') }}"  class="{{set_active(['student/list','student/grid'])}}"> Daftar Siswa</a></li>
                        <li><a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}"> Tambbah Siswa</a></li>
                        <li><a class="{{ (request()->is('student/edit/*')) ? 'active' : '' }}">Edit Siswa</a></li>
                        {{-- <li><a href=""  class="{{ (request()->is('student/profile/*')) ? 'active' : '' }}">Student View</a></li> --}}
                    </ul>
                </li>

                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span>  Tambah Guru</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Data Guru</a></li>
                        <li><a href="teacher-details.html">Teacher View</a></li>
                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Tambah Guru</a></li>
                        <li><a class="{{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">Edit Guru</a></li>
                    </ul>
                </li>
                
                <li class="submenu {{set_active(['department/add/page','department/edit/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Jurusan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('department/list/page') }}" class="{{set_active(['department/list/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">Data Jurusan</a></li>
                        <li><a href="{{ route('department/add/page') }}" class="{{set_active(['department/add/page'])}}">Tambah Jurusan</a></li>
                        <li><a>Edit Jurusan</a></li>
                    </ul>
                </li>

                <li class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Mata Pelajaran</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}">Data Mata Pelajaran</a></li>
                        <li><a class="{{set_active(['subject/add/page'])}}" href="{{ route('subject/add/page') }}">Tambah Data Mata Pelajaran</a></li>
                        <li><a>Edit Data Mata Pelajaran</a></li>
                    </ul>
                </li>

                {{-- <li class="submenu {{set_active(['invoice/list/page','invoice/paid/page',
                    'invoice/overdue/page','invoice/draft/page','invoice/recurring/page',
                    'invoice/cancelled/page','invoice/grid/page','invoice/add/page',
                    'invoice/view/page','invoice/settings/page',
                    'invoice/settings/tax/page','invoice/settings/bank/page'])}}" {{ request()->is('invoice/edit/*') ? 'active' : '' }}>
                    <a href="#"><i class="fas fa-clipboard"></i>
                        <span> Invoices</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['invoice/list/page','invoice/paid/page','invoice/overdue/page','invoice/draft/page','invoice/recurring/page','invoice/cancelled/page'])}}" href="{{ route('invoice/list/page') }}">Invoices List</a></li>
                        <li><a class="{{set_active(['invoice/grid/page'])}}" href="{{ route('invoice/grid/page') }}">Invoices Grid</a></li>
                        <li><a class="{{set_active(['invoice/add/page'])}}" href="{{ route('invoice/add/page') }}">Add Invoices</a></li>
                        <li><a class="{{ request()->is('invoice/edit/*') ? 'active' : '' }}" href="">Edit Invoices</a></li>
                        <li> <a class="{{ request()->is('invoice/view/*') ? 'active' : '' }}" href="">Invoices Details</a></li>
                        <li><a class="{{set_active(['invoice/settings/page','invoice/settings/tax/page','invoice/settings/bank/page'])}}" href="{{ route('invoice/settings/page') }}">Invoices Settings</a></li>
                    </ul>
                </li> --}}
{{-- 
                <li class="menu-title">
                    <span>Management</span>
                </li> --}}

                {{-- <li class="submenu {{set_active(['account/fees/collections/page','add/fees/collection/page'])}}">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i>
                        <span> Accounts</span>
                        <span class="menu-arrow"></span>
                    </a> --}}
                    {{-- <ul>
                        <li><a class="{{set_active(['account/fees/collections/page'])}}" href="{{ route('account/fees/collections/page') }}">Fees Collection</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="salary.html">Salary</a></li>
                        <li><a class="{{set_active(['add/fees/collection/page'])}}" href="{{ route('add/fees/collection/page') }}">Add Fees</a></li>
                        <li><a href="add-expenses.html">Add Expenses</a></li>
                        <li><a href="add-salary.html">Add Salary</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
                <li>
                    <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                </li>
                <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>