<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    @if (auth()->user()->position_id == 6)
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            User
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('user_list') }}">User List</a>
                                <a class="nav-link" href="{{ route('create_user') }}">Create User</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePosition" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Position
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePosition" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('position_list') }}">Position List</a>
                                <a class="nav-link" href="{{ route('create_position') }}">Create Position</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseQgroup" aria-expanded="false" aria-controls="collapseQgroup">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Question Group
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseQgroup" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Qgroup_list') }}">Question Group List</a>
                                <a class="nav-link" href="{{ route('create_Qgroup') }}">Create Question Group</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseQtype" aria-expanded="false" aria-controls="collapseQgroup">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Question Type
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseQtype" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Qtype_list') }}">Question Type List</a>
                                <a class="nav-link" href="{{ route('create_Qtype') }}">Create Question Type</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseQstype" aria-expanded="false" aria-controls="collapseQgroup">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Answer Submit Type
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseQstype" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Astype_list') }}">Answer Submit Type List</a>
                                <a class="nav-link" href="{{ route('create_Astype') }}">Create Answer Submit Type</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseQuestion" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Question
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseQuestion" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('create_question') }}">Create Question</a>
                                <a class="nav-link" href="{{ route('question_list') }}">Question List</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapserepdn" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Report Download
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapserepdn" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('daily_download') }}">Daily Report</a>
                                <a class="nav-link" href="{{ route('weekly_download') }}">Weekly Report</a>
                                <a class="nav-link" href="{{ route('monthly_download') }}">Monthly Report</a>
                            </nav>
                        </div>
                    @elseif (auth()->user()->position_id == 2 ||
                            auth()->user()->position_id == 5 ||
                            auth()->user()->position_id == 3 ||
                            auth()->user()->position_id == 4)
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseReportS" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Report Submission
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseReportS" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @auth
                                    @php
                                        $position_id = auth()->user()->position_id;
                                    @endphp
                                    <a class="nav-link"
                                        href="{{ route('daily_report', ['position_id' => $position_id]) }}">Daily</a>
                                    <a class="nav-link"
                                        href="{{ route('weekly_report', ['position_id' => $position_id]) }}">Weekly</a>
                                    <a class="nav-link"
                                        href="{{ route('monthly_report', ['position_id' => $position_id]) }}">Monthly</a>
                                @else
                                    <p>Please log in to see your report.</p>
                                @endauth
                            </nav>
                        </div>
                    @elseif (auth()->user()->position_id == 1)
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapserepdn" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Report Download
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapserepdn" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('daily_download') }}">Daily Report</a>
                                <a class="nav-link" href="{{ route('weekly_download') }}">Weekly Report</a>
                                <a class="nav-link" href="{{ route('monthly_download') }}">Monthly Report</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapserevenue" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                             Comapany Monthly Revenue
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapserevenue" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('revenue_report') }}">WLC Revenue Report</a>
                                <a class="nav-link" href="{{ route('monthly_download') }}">SCL Revenue Report</a>
                            </nav>
                        </div>
                    @endif
        </nav>
    </div>
</div>
</div>
</nav>
</div>
</div>
