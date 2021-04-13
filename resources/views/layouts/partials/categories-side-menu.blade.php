<div class="catagories-side-menu">
    <!-- Close Icon -->
    <div id="sideMenuClose">
        <i class="ti-close"></i>
    </div>
    <!--  Side Nav  -->
    <div class="nav-side-menu">
        <div class="menu-list">
            <h6>Категории</h6>
            <ul id="menu-content" class="menu-content collapse out">

                @foreach(\App\Models\Category::with('subCategory')->get() as $category)
                <!-- Single Item -->
                <li data-toggle="collapse" data-target="#{{$category->id}}" class="collapsed active">
                    <a href="#">{{$category->title}}<span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="{{ $category->id }}">
                        @foreach($category['subCategory'] as $sub_category)
                        <li><a href="#">{{ $sub_category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                @endforeach

            </ul>
        </div>
    </div>
</div>
