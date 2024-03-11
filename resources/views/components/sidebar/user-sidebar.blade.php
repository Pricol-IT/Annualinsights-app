<div>

    <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
            <i class='bx bxs-calendar'></i>
            <span>Dashboard </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#icons-nav">
            <i class='bx bx-leaf'></i><span>Environment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Scope 1</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav-sub" class="nav-content collapse" data-bs-parent="#icons-nav">
                    <li>
                        <a class="nav-link" href="{{route('stationary_combustion.index')}}">
                            <i class="bi bi-dash"></i><span> Stationary Emission</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('mobile_combustion.index')}}">
                            <i class="bi bi-dash"></i><span>Mobile Emission</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('fugitive_emission.index')}}">
                            <i class="bi bi-dash"></i><span>Fugitive Emission</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('process_emission.index')}}">
                            <i class="bi bi-dash"></i><span>Process Emission</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub1" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Scope 2</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav-sub1" class="nav-content collapse" data-bs-parent="#icons-nav">
                    <li>
                        <a class="nav-link" href="{{route('energy_data.index')}}">
                            <i class="bi bi-dash"></i><span> Energy data </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub2" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Scope 3</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav-sub2" class="nav-content collapse" data-bs-parent="#icons-nav">
                    <li>
                        <a class="nav-link" href="{{route('user.commuteform')}}">
                            <i class="bi bi-dash"></i><span> Employee Commute form </span>
                        </a>
                    </li>
                </ul>
                <ul id="icons-nav-sub2" class="nav-content collapse" data-bs-parent="#icons-nav">
                    <li>
                        <a class="nav-link" href="{{route('waste_management.index')}}">
                            <i class="bi bi-dash"></i><span> Waste Generation </span>
                        </a>
                    </li>
                </ul>

            </li>

            <li>

                <a class="nav-link" href="{{route('water_management.index')}}">
                    <i class="bi bi-circle"></i><span>Water Management</span>
                </a>

            </li>

        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav1" data-bs-toggle="collapse" href="#icons-nav">
            <i class="bi bi-people-fill"></i><span>Social</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="icons-nav1" class="nav-content collapse" data-bs-parent="#sidebar-nav">

            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub3" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Human Resource</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav-sub3" class="nav-content collapse" data-bs-parent="#icons-nav1">
                    <li>
                        <a class="nav-link" href="{{route('workercount.index')}}">
                            <i class="bi bi-dash"></i><span> Worker Count</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> Employee Count</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('employee_worker_benefits.workercount.index')}}">
                            <i class="bi bi-dash"></i><span> Worker Benefits</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('employee_worker_benefits.employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> Employee Benefits</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('differently_abled.employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> Differently Abled Employees</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('differently_abled.workercount.index')}}">
                            <i class="bi bi-dash"></i><span>Differently Abled Workers</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('retirement_benefits.index')}}">
                            <i class="bi bi-dash"></i><span>Retirement Benefits</span>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('turnover.workercount.index')}}">
                            <i class="bi bi-dash"></i><span> Worker Turnover</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('turnover.employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> Employee Turnover</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('hiring.employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> New Employee Hires</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('hiring.workercount.index')}}">
                            <i class="bi bi-dash"></i><span> New Worker Hires</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('minimum_wage.employeecount.index')}}">
                            <i class="bi bi-dash"></i><span> Employees Minimum Wages</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('minimum_wage.workercount.index')}}">
                            <i class="bi bi-dash"></i><span>Workers Minimum Wages</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('union.index')}}">
                            <i class="bi bi-dash"></i><span>Employee & worker Association(s) or Union</span>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('parental_leave.index')}}">
                            <i class="bi bi-dash"></i><span> Parental Leave</span>
                        </a>
                    </li>
                </ul>



            </li>
            <li>
                <a class="nav-link" href="{{route('training.index')}}">
                    <i class="bi bi-circle"></i><span> Trainings</span>
                </a>

            </li>

            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub4" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Occupational Health</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav-sub4" class="nav-content collapse" data-bs-parent="#icons-nav">
                    <li>
                        <a class="nav-link" href="{{route('safety_data.index')}}">
                            <i class="bi bi-dash"></i><span> Safety Data </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub4" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Diversity, Equity & Inclusion</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Human Rights</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> Customers & Market</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li>
                <a class="nav-link collapsed" data-bs-target="#icons-nav-sub" data-bs-toggle="collapse" href="#icons-nav-sub">
                    <i class="bi bi-circle"></i><span> CSR Initiatives</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav2" data-bs-toggle="collapse" href="#icons-nav">
            <i class='bx bx-book-reader'></i>
            <span>Governance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="icons-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav">

            <li>

                <a class="nav-link" href="#">
                    <i class="bi bi-circle"></i><span>Compliance Status</span>
                </a>

            </li>
            <li>

                <a class="nav-link" href="#">
                    <i class="bi bi-circle"></i><span>Policies & Procedures</span>
                </a>

            </li>
            <li>

                <a class="nav-link" href="#">
                    <i class="bi bi-circle"></i><span>ESG Organization Structure</span>
                </a>

            </li>
            <li>

                <a class="nav-link" href="#">
                    <i class="bi bi-circle"></i><span>Awards & Recognition</span>
                </a>

            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="bi bi-circle"></i><span>Risks & Opportunities</span>
                </a>

            </li>

        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="bi bi-clipboard-data"></i>
            <span>Entry Status Report</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="bi bi-file-earmark-arrow-down"></i>
            <span>Download Report</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{route('user.financialyear')}}">
            <i class="bi bi-tags-fill"></i>
            <span>Generate Financial year</span>
        </a>
    </li>
</div>
