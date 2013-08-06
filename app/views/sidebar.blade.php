<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <form class="sidebar-search">
                <div class="input-box">
                    <a href="javascript:;" class="remove"></a>
                    <input type="text" placeholder="Search..." />
                    <input type="button" class="submit" value=" " />
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start active ">
            <a href="{{ Request::root() }}/home">
            <i class="icon-home"></i> 
            <span class="title">@lang('menu.dashboard')</span>
            <span class="selected"></span>
            </a>
        </li>
        <li class="">
            <a href="{{ Request::root() }}/messages">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.messages')</span>
            </a>
        </li>
        <li class="">
            <a href="#">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.shift_journal')</span>
            </a>
        </li>
        
        
         <li class="" id="reports_menu">
            <a href="javascript:;">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.reports')</span>
            <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li id="reports_service" >
                    <a href="{{ Request::root()}}/reports/service">@lang('menu.reports_sub.service_reports')</a>
                </li>
                <li >
                    <a href="{{ Request::root()}}/reports/announce">@lang('menu.reports_sub.announce_reports')</a>
                </li>
                <li >
                    <a href="{{ Request::root()}}/reports/lift">@lang('menu.reports_sub.lift_reports')</a>
                </li>
            </ul>
        </li>
        
        
        <li class="">
            <a href="#">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.timesheets')</span>
            </a>
        </li>
        <li class="">
            <a href="#">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.employees')</span>
            </a>
        </li>
        <li class="">
            <a href="#">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.statistics')</span>
            </a>
        </li>
        <li class="">
            <a href="#">
            <i class="icon-file-text"></i> 
            <span class="title">@lang('menu.web_news')</span>
            </a>
        </li>
        <li class="last ">
            <a href="#">
            <i class="icon-bar-chart"></i> 
            <span class="title">Visual Charts</span>
            </a>
        </li>
        
        
    </ul>
    <!-- END SIDEBAR MENU -->
</div>