<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li>
        <a href="{{ route('home') }}">
            <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview"><a href="#">
        <i class="icon icon-database purple-text s-18"></i> <span>Master</span> <i
            class="icon icon-angle-left s-18 pull-right"></i>
    </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('brand.index') }}"><i class="icon icon-folder5"></i>Brand</a></li>
            <li><a href="#"><i class="icon icon-folder5"></i>Type</a></li>
        </ul>
    </li>
</ul>