{!! Form::open(['method'=>'GET','url'=>'home','class'=>'navbar-form navbar-left'])  !!}
<div class="input-group custom-search-form">
        <input type="text" class="form-control" name="search" placeholder=@lang('sidebar.search')>
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="javascript:void(0)"><i class="fa fa-book fa-fw"></i>@lang('sidebar.categories')<span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('home.show', $category->id) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-pencil fa-fw"></i>@lang('sidebar.author')<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach ($author as $au)
                        <li>
                            <a href="{{ route('home.show', ($au->id) + 100) }}">{{ $au->author_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('home.show', 0) }}"><i class="fa fa-newspaper-o fa-fw"></i>@lang('sidebar.latest-stories')</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-heart fa-fw"></i>@lang('sidebar.most-popular')</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-phone fa-fw"></i>@lang('sidebar.contact')</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-internet-explorer fa-fw"></i>@lang('sidebar.references')
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
