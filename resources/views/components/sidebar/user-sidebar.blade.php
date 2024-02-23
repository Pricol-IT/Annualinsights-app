<div>
    <li class="nav-item">
        <a class="nav-link " href="{{route('user.commuteform')}}">
            <i class='bx bxs-calendar'></i>
            <span>Commute form </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{route('energy_data.index')}}">
            <i class='bx bxs-calendar'></i>
            <span>Energy Data </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bx bx-category"></i><span>Employees/workers count</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="nav-link" href="{{route('employeecount.index')}}">
                    <i class="bi bi-circle"></i><span>Employees count</span>
                </a>
            </li>
            <li>
                <a href="{{route('workercount.index')}}">
                    <i class="bi bi-circle"></i><span>Workers count</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav1" data-bs-toggle="collapse" href="#">
            <i class="bx bx-category"></i><span>Hiring count</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="nav-link" href="{{route('employeecount.index')}}">
                    <i class="bi bi-circle"></i><span>Employees count</span>
                </a>
            </li>
            <li>
                <a href="{{route('workercount.index')}}">
                    <i class="bi bi-circle"></i><span>Workers count</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav2" data-bs-toggle="collapse" href="#">
            <i class="bx bx-category"></i><span>Turn Over</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="nav-link" href="{{route('employeecount.index')}}">
                    <i class="bi bi-circle"></i><span>Employee Turnover</span>
                </a>
            </li>
            <li>
                <a href="{{route('workercount.index')}}">
                    <i class="bi bi-circle"></i><span>Worker Turnover</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav3" data-bs-toggle="collapse" href="#">
            <i class="bx bx-category"></i><span>Differently Abled</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="nav-link" href="{{route('employeecount.index')}}">
                    <i class="bi bi-circle"></i><span>Employees</span>
                </a>
            </li>
            <li>
                <a href="{{route('workercount.index')}}">
                    <i class="bi bi-circle"></i><span>Workers</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{route('user.financialyear')}}">
            <i class="bi bi-tags-fill"></i>
            <span>Generate Financial year</span>
        </a>
    </li>
</div>
