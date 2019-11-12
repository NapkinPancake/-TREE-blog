   
        
        <div id="navbar" class="navbar navbar-dark navbar-expand-md   shadow-sm">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" 
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                
                        <div class="col-1 "></div>
                        <div class="col-4 " > 

                            <ul class="navbar-nav">
                                <li class="nav-item mr-5">
                                       <a class='nav-link navbar-elements' href="/"> Home</a>
                                </li>
                                <li class="nav-item">
                                        <a class='nav-link navbar-elements' href="/stories"> Stories</a>
                                 </li>
                            </ul>
                           
                        </div>


                        <div class="col-2 text-center">
                                <a  href="{{ url('/') }}">
                                <img src="{{asset('img/2.png')}}" alt="">
                            </a></div>

                
                 
                 <div class="col-4">
                    
               
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        @guest
                            <li class="nav-item">
                                <a class="nav-link navbar-elements" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                        @else 

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-elements" href="#" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                

                                <div class="dropdown-menu"  aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item mr-3 " href="/home/">Home</a>

                                    <a class="dropdown-item mr-3 " href="/home/show">Your stories</a>

                                    <a class="dropdown-item mr-3 " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                            <li class="nav-item">
                                <a href="#" class="nav-link navbar-elements ml-5">About Us</a>
                            </li>
                        
                        
                    </ul>

                </div>

                <div class="col-1 "></div>
                </div>

                </div>
            </div>
        </div>


 
