<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('mat_ui/img/sidebar-1.jpg')}}">



   <div class="logo">
       <a href="" class="simple-text logo-mini">

      </a>
      <a href="/dashboard" class="simple-text logo-normal">
        EDCB
      </a></div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="/dashboard">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">account_circle</i>
                    <p> Users
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/users/index">
                                <span class="sidebar-mini"> <i class="material-icons">supervised_user_circle</i> </span>
                                <span class="sidebar-normal"> All Users </span>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="/roles/index">
                                <span class="sidebar-mini"> <i class="material-icons">supervisor_account</i> </span>
                                <span class="sidebar-normal"> Roles </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/permissions/index">
                                <span class="sidebar-mini"> <i class="material-icons">verified_user</i> </span>
                                <span class="sidebar-normal"> Permissions </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" data-toggle="collapse" href="#members">
                    <i class="material-icons">account_box</i>
                    <p> Members
                        <b class="caret"></b> </p>
                </a>
                <div class="collapse" id="members">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/members">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">View Member Account</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/members/verify">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">View Member Verification</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#savings">
                    <i class="material-icons">request_quote</i>
                    <p> Savings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="savings">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/open">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> Savings Account Opening</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/verification">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal"> Account Verification</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/view">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal"> View Savings Account</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item ">
                            <a class="nav-link" href="/savings/approve">
                                <span class="sidebar-mini"> <i class="material-icons">supervisor_account</i> </span>
                                <span class="sidebar-normal"> Account Approval </span>
                            </a>
                        </li> --}}

                    </ul>
                </div>
            </li>
            @can('withdrawal_deposites')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#diposits">
                    <i class="material-icons">request_quote</i>
                    <p> Withdrawals & Deposites
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="diposits">
                    <ul class="nav">
                        @can('normal_withdrawal')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/n-with">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">Normal Withdrawal</span>
                            </a>
                        </li>
                        @endcan
                        @can('normal_deposite')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/n-dep">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">Normal Deposit </span>
                            </a>
                        </li>
                        @endcan
                        @can('fd_withdrawal')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/fd-with">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">FD Withdrawal</span>
                            </a>
                        </li>
                        @endcan
                        @can('fd_deposite')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/fd-dep">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">FD Deposit</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </div>
            </li>
            @endcan
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#parameters">
                    <i class="material-icons">request_quote</i>
                    <p> Parameters
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="parameters">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/parameter">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Savings Account Parameters</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/schemeParameters">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Interest Scheme Parameters</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/savingsSchemeParameters">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Saving Scheme Parameters</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/otherViews">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Other Views</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#dataAdd">
                    <i class="material-icons">request_quote</i>
                    <p> Data Add
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dataAdd">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/accountCategory">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Account Categories</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/accountType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Account Types</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/contactType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Contact Types</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/currency">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Currencies</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/cutomerStatus">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Customer Statuses</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/cutomerTitle">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Customer Titles</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/feeType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Fee Types</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/gender">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Genders</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/idType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Identification Types</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/mainType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Main Types</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/marriedStatus">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Married Statuses</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
