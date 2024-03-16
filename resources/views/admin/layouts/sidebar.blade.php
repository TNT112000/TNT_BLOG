<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa fa-circle" aria-hidden="true"></i>
                <span class="title">Quản lý chung</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('home')}}" title="" class="nav-link">Tổng quan chung</a>
                </li>
            </ul>
        </li> 

        
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa fa-circle" aria-hidden="true"></i>
                <span class="title">Bài Viết</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('blog.create')}}" title="" class="nav-link">Thêm mới bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" title="" class="nav-link">Danh sách bài viết</a>
                </li>
            </ul>
        </li>
        
        
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa fa-circle" aria-hidden="true"></i>
                <span class="title">Danh mục</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('category.create')}}" title="" class="nav-link">Thông tin danh mục</a>
                </li>
                
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <i class="fa fa-circle" aria-hidden="true"></i>
                <span class="title">Liên hệ</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('contact.create')}}" title="" class="nav-link">Thông tin liên hệ</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
