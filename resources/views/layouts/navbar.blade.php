<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
		<img src="" width="30" height="30" class="d-inline-block align-top" alt="">
		CorcisaVirtual
	</a>
	
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('clientes.index')}}">Clientes</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('servicios.index')}}">Servicios</a>
          
        </li>
        
        
      </ul>
	  
	  <ul class="navbar-nav ml-md-auto">
    
		<li class="nav-item">
               
			<div class="dropdown">
			  <button class="btn dropdown-toggle text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				@auth
					{{auth()->user()->name}}
				@endauth
			  </button>
			  <div class="dropdown-menu">
				
				<a class="dropdown-item" 
				   href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					Salir.
				</a>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
			  </div>
			</div>
			   
	    </li>
    
	  </ul>
	  
    </div>
  </nav>