<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="index.html">
            <img src="{{ Request::root()}}/assets/img/logo.png" alt="logo"/>
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="{{ Request::root()}}/assets/img/menu-toggler.png" alt="" />
            </a>          
            <!-- END RESPONSIVE MENU TOGGLER -->            
            <!-- BEGIN TOP NAVIGATION MENU -->              
            <ul class="nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->   
                <li class="dropdown" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-warning-sign"></i>
                    <span class="badge">6</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <p>You have 14 new notifications</p>
                        </li>
                        <li>
                            <a href="#">
                            <span class="label label-important"><i class="icon-bolt"></i></span>
                            31 user IP blocked.
                            <span class="time">5 hrs</span>
                            </a>
                        </li>
                        <li class="external">
                            <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <li class="dropdown" id="header_inbox_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-envelope"></i>
                    <span class="badge">5</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p>You have 12 new messages</p>
                        </li>
                        <li>
                            <a href="inbox.html?a=view">
                            <span class="photo"><img src="{{ Request::root()}}/assets/img/avatar2.jpg" alt="" /></span>
                            <span class="subject">
                            <span class="from">Lisa Wong</span>
                            <span class="time">Just Now</span>
                            </span>
                            <span class="message">
                            Vivamus sed auctor nibh congue nibh. auctor nibh
                            auctor nibh...
                            </span>  
                            </a>
                        </li>
                        <li class="external">
                            <a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown" id="header_task_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-tasks"></i>
                    <span class="badge">5</span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li>
                            <p>You have 12 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                            <span class="task">
                            <span class="desc">New release v1.2</span>
                            <span class="percent">30%</span>
                            </span>
                            <span class="progress progress-success ">
                            <span style="width: 30%;" class="bar"></span>
                            </span>
                            </a>
                        </li>
                        
                        <li class="external">
                            <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="{{ Request::root()}}/assets/img/avatar1_small.jpg" />
                    <span class="username">Nik User</span>
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                        <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
                        <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                        <li class="divider"></li>
                        <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU --> 
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>