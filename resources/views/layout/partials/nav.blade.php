<div class="main-wrapper">
    <!-- Loader -->
    @if (Route::is(['employee-dashboard']))
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>
    @endif
    <!-- /Loader -->
    <!-- Sidebar -->
    {{-- Side BAR  Start --}}
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Solar Admin Dashboard</span>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-users"></i> <span> Employee</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ Request::is('employee-list') ? 'active' : '' }}"
                                    href="{{ url('employee-list') }}">Employee List</a>
                            </li>
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                {{-- <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="{{ url('student-register') }}">Student
                                    Registration</a> --}}
                            </li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-edit"></i> <span> Orders</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('employee-orders') }}">Employee Orders</a>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('user-orders') }}">User Orders</a>
                            </li>

                       </ul>
                    </li>
                    {{-- <li class="submenu">
                        <a href="#"><i class="la la-dashboard"></i> <span> User Reviews</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>

                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                    href="#"
                                   >User List</a>
                            </li>

                        </ul>
                    </li> --}}
                    <li class="submenu">
                        <a href="#"><i class="la la-columns"></i> <span> Building Type</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                    href="{{ url('building-list') }}"
                                   >Building List</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-level') }}">Add
                                    Level</a>
                            </li> --}}


                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-table"></i> <span> Solar Type</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                    {{-- href="{{ url('solar-list') }}" --}}
                                    href="#"
                                   >Solar List</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-level') }}">Add
                                    Level</a>
                            </li> --}}


                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-object-ungroup"></i> <span> Monthly Target</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                    href="#"
                                   >Create Target</a>
                            </li>
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                    href="#"
                                   >Employee List</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-video') }}">Add
                                    Live Video</a>
                            </li> --}}


                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-bell"></i> <span> Users</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
                                href="{{ url('user-list') }}"
                                   >User List</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-announcement') }}">Add
                                    Announcement</a>
                            </li> --}}


                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="la la-files-o"></i> <span> Notifications</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
            href="{{ url('user-notification-list') }}">Users</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}"
        {{-- href="{{ url('employee-notification-list') }}" --}}
        >Employees</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-assignment') }}">Add
                                    Assignment</a>
                            </li> --}}


                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-graduation-cap"></i> <span> Training</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="{{ url('resource-list') }}">Resource</a>
                            </li>
                            {{-- <li>
                                <a class="{{ Request::is('inde') ? 'active' : '' }}" href="{{ url('add-resource') }}">Add
                                    Resource</a>
                            </li> --}}

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-briefcase"></i> <span> Career Page</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                {{-- {{ url('employee-dashboard') }} --}}
                                <a class="{{ Request::is('employee-dashboard') ? 'active' : '' }}" href="#">Detail List</a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Side BAR  End --}}
    <!-- /Sidebar -->
</div>
