<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('mat_ui/img/sidebar-1.gif')}}">



    <div class="logo">

        <a href="/dashboard" class="simple-text logo-normal " style="text-align: center">
            Economic <br>Development <br>Co-op Bank
        </a></div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            {{-- <li class="nav-item  ">
                <a class="nav-link" href="/dashboard">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li> --}}

            <li class="nav-item  ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">account_circle</i>
                    <p> Users
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        @can('view_users')
                        <li class="nav-item ">
                            <a class="nav-link" href="/users/index">
                                <span class="sidebar-mini"> <i class="material-icons">supervised_user_circle</i> </span>
                                <span class="sidebar-normal"> All Users </span>
                            </a>
                        </li>
                        @endcan
                        @can('role_view')
                        <li class="nav-item ">
                            <a class="nav-link" href="/roles/index">
                                <span class="sidebar-mini"> <i class="material-icons">supervisor_account</i> </span>
                                <span class="sidebar-normal"> Roles </span>
                            </a>
                        </li>
                        @endcan
                        @can('permission_view')

                        <li class="nav-item ">
                            <a class="nav-link" href="/permissions/index">
                                <span class="sidebar-mini"> <i class="material-icons">verified_user</i> </span>
                                <span class="sidebar-normal"> Permissions </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>

            <li class="nav-item  ">
                <a class="nav-link" data-toggle="collapse" href="#members" >
                    <i class="material-icons">account_box</i>
                    <p> Customers
                        <b class="caret"></b> </p>
                </a>
                <div class="collapse" id="members">
                    <ul class="nav">

                        @can('customer_add')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('/members/add')}}">
                                <span class="sidebar-mini"> <i class="material-icons">zoom_in</i> </span>
                                <span class="sidebar-normal">Add Customer </span>
                            </a>
                        </li>
                        @endcan
                        @can('customer_verification')
                        <li class="nav-item ">
                            <a class="nav-link" href="/members/verify">
                                <span class="sidebar-mini"> <i class="material-icons">verified</i> </span>
                                <span class="sidebar-normal"> Customer Verification</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item ">
                            <a class="nav-link" href="/members">
                                <span class="sidebar-mini"> <i class="material-icons">zoom_in</i> </span>
                                <span class="sidebar-normal">View Customer Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" data-toggle="collapse" href="#branchess">
                    <i class="material-icons">account_box</i>
                    <p> Branches
                        <b class="caret"></b> </p>
                </a>
                <div class="collapse" id="branchess">
                    <ul class="nav">
                        @can('branches_add')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('/newbranchesadd')}}">
                                <span class="sidebar-mini"> <i class="material-icons">zoom_in</i> </span>
                                <span class="sidebar-normal">Add Branches </span>
                            </a>
                        </li>
                        @endcan
                        @can('branches_view')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('/newbranches')}}">
                                <span class="sidebar-mini"> <i class="material-icons">zoom_in</i> </span>
                                <span class="sidebar-normal">View Branches </span>
                            </a>
                        </li>

                        @endcan
                        <li class="nav-item ">
                            <a class="nav-link" href="/branchCashInOut1">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Branch Cash In-out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @can('savings_account_veiw')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#savings">
                    <i class="material-icons">account_balance</i>
                    <p> Savings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="savings">
                    <ul class="nav">
                        @can('add_savings')
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/open">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> Savings Account Opening</span>
                            </a>
                        </li>
                        @endcan
                        @can('savings_account_verification')
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/verification">
                                <span class="sidebar-mini"> <i class="material-icons">assignment_turned_in</i> </span>
                                <span class="sidebar-normal"> Account Verification</span>
                            </a>
                        </li>
                        @endcan
                        @can('savings_account_veiw')
                        <li class="nav-item ">
                            <a class="nav-link" href="/savings/view">
                                <span class="sidebar-mini"> <i class="material-icons">zoom_in</i> </span>
                                <span class="sidebar-normal"> View Savings Account</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </div>
            </li>
            @endcan
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#fd">
                    <i class="material-icons">account_balance</i>
                    <p> FD
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="fd">
                    @can('fd_opening')
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('/fd')}}">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> FD Account Opening</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('fd_verification')
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/verify">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> FD Account Verification</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('fd_index')

                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/approved">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> FD Accounts</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </div>
            </li>
            @can('withdrawal_deposites')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#diposits">
                    <i class="material-icons">sync_alt</i>
                    <p>Deposites
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="diposits">
                    <ul class="nav">
                        @can('normal_deposite')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/n-dep">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">Savings Deposit </span>
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
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#withdrawals">
                    <i class="material-icons">sync_alt</i>
                    <p> Withdrawals
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="withdrawals">
                    <ul class="nav">
                        @can('normal_withdrawal')
                        <li class="nav-item ">
                            <a class="nav-link" href="/deposits/n-with">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal">Savings Withdrawal</span>
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
                        <li class="nav-item ">
                            <a class="nav-link" href="/branchCashInOut1">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Branch Cash In-out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan


            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#transaction_report">
                    <i class="material-icons">grading</i>
                    <p> Reports
                        <b class="caret"></b>
                    </p>
                </a>
                {{-- @can('transaction_report') --}}
                <div class="collapse" id="transaction_report">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/treport">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Transaction History</span>
                            </a>
                        </li>
                    </ul>
                    {{-- @endcan --}}
                    @can('cashier_report')
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/creport">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Cashier Report</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('cash_in_hand_report')
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/cashInHand">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Cash In Hand</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('cash_in_handa_branch_report')
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/CasHiNhanDbrancH">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Cash In Hand (Branch)</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    {{-- @can('report_of_transaction') --}}
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/ReportOfTransactions">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Report</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/customerledger">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Customer Ledger</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#schema">
                    <i class="material-icons">book_online</i>
                    <p> Transfers
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="schema">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/bankvsheadoffice">
                                <span class="sidebar-mini"> <i class="material-icons">api</i> </span>
                                <span class="sidebar-normal">Branch vs HQ</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/frompalmtop">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">From Palmtop</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            {{-- @endcan --}}
            @can('sub_accounts')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#schema">
                    <i class="material-icons">book_online</i>
                    <p> Sub Accounts
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="schema">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/savinsschemacreate">
                                <span class="sidebar-mini"> <i class="material-icons">api</i> </span>
                                <span class="sidebar-normal">Saving Schema Parameters</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="/interestschema">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Interest Schema</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            @endcan
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#member">
                    <i class="material-icons">supervised_user_circle</i>
                    <p> Members
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="member">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/member">
                                <span class="sidebar-mini"> <i class="material-icons">api</i> </span>
                                <span class="sidebar-normal">Add</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#share">
                    <i class="material-icons">addchart</i>
                    <p> Shares
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="share">
                    @can('share_buy')
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('shares.buy')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">shopping_cart</i> </span>
                                    <span class="sidebar-normal">Share Buy</span>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('share_transfer')

                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('shares.transfer')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">cached</i> </span>
                                    <span class="sidebar-normal">Share Transfer</span>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('share_history')

                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('shares.history')}}">
                                <span class="sidebar-mini"> <i class="material-icons">analytics</i> </span>
                                <span class="sidebar-normal">Share Transfer Data</span>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </div>
            </li>
            @can('configurations')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#dataAdd">
                    <i class="material-icons">build</i>
                    <p> Configurations
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dataAdd">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/accountCategory">
                                <span class="sidebar-mini"> <i class="material-icons">settings</i> </span>
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
                            <a class="nav-link" href="/branches">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Branches</span>
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
                            <a class="nav-link" href="/productType">
                                <span class="sidebar-mini"> <i class="material-icons">request_quote</i> </span>
                                <span class="sidebar-normal">Product Types</span>
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
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#dataAdd">
                                <i class="material-icons"></i>
                                <p>
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/accountCategory">
                                            <span class="sidebar-mini"> <i class="material-icons">settings</i> </span>
                                            <span class="sidebar-normal"></span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="/accountType">
                                            <span class="sidebar-mini"> <i class="material-icons">request_quote</i>
                                            </span>
                                            <span class="sidebar-normal"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        @endcan
    </div>
</div>

<script>
    let shit = document.querySelectorAll('.nav-item')

    let collapseDivs = document.querySelectorAll('.collapse')

    let carets = document.querySelectorAll('.caret')

    shit.forEach(item => {

        item.addEventListener('click', e => {
            shit.forEach(item => {
                item.classList.remove('active')
            })
            carets.forEach(caret => {
                caret.style.transform = 'rotate(0deg)';
            })
            collapseDivs.forEach(div => {
                div.classList.remove('show')
            })
            item.classList.add('active')
            e.target.children[0].style.transform = 'rotate(180deg)'
        })


    })

    // window.onload = shit.forEach(item => {
    //     console.log(item.classList);
    // })
</script>
