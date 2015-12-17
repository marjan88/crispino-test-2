<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{route('home')}}" class="navbar-brand">Crispino</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            @if(\Auth::user())
            <ul class="nav navbar-nav">
                <li @if(\Request::is('/')) class="active" @endif><a href="/">Home</a></li>  
                <li @if(\Request::is('/task')) class="active" @endif><a href="{{route('task.index')}}">Task</a></li> 
            </ul>            
            @endif
            <ul class="nav navbar-nav navbar-right">
                
                @if(\Auth::user())
                <li class="dropdown">
                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="{{\Auth::user()->getAvatarUrl(20)}}" alt="{{\Auth::user()->getNameOrUsername()}}" /> 
                        {{\Auth::user()->getNameOrUsername()}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                            
                        <li class="divider" role="separator"></li>                        
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>                       
                    </ul>
                </li>
                @else 
                <li @if(\Request::is('register')) class="active" @endif><a href="{{route('register')}}">Register</a></li>
                <li @if(\Request::is('login')) class="active" @endif><a href="{{route('login')}}">Sign in</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>