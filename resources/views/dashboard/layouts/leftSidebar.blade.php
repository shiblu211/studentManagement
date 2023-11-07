
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('departments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Departments
                        </p>
                    </a>
                </li>

                @role('admin')
                <li class="nav-item">
                    <a href="{{route('students.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Students
                        </p>
                    </a>
                </li>
                @endrole

                <li class="nav-item">
                    <a href="{{route('semesters.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-pen-alt"></i>
                        <p>
                            Semester
                        </p>
                    </a>
                </li>
            </ul>

        </nav>

    </div>

</aside>
