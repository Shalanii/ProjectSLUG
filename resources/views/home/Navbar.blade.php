 <script>
	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 250 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 250 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();
	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();
</script>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand"><img src="/img/slug.png" class="img-responsive" width="90px" height="60px" alt="logo"></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
		  <li class="nav-item"><a class="nav-link" href="/sportresult">Results</a></li>
	          <li class="nav-item"><a class="nav-link" href="/Schedule1">Schedule</a></li>
	         

		
	          <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Points
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                        <a class="dropdown-item" href="/TotalPoint">Total Points</a>
                        <a class="dropdown-item" href="/TeamGames">Games Points</a>
                    </div>
                </li>
		<!--<li class="nav-item"><a class="nav-link" href="/Ongoing">Live Updates</a></li>--!>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Games
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/eventSchedule">Latest Games</a>
                    <a class="dropdown-item" href="#">Previous Games</a>
                </div>
                </li>
		--!>
		<li class="nav-item"><a class="nav-link" href="/homealbum">Gallery</a></li>
		<li class="nav-item"><a class="nav-link" href="/eventSchedule">Games</a></li>
		<li class="nav-item"><a class="nav-link" href="https://youtu.be/YVMlVuT8IGM">Streaming</a></li>
		<!--<li class="nav-item"><a class="nav-link" href="/Notices">Notices</a></li>!-->

	        	        </ul>
	      </div>
        </div>
    </nav>