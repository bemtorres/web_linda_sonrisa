@php
 $numeroTelefono = "+ 562 2855 0556";	
@endphp
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Linda Sonrisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="/assets_home/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets_home/css/animate.css">
    
    <link rel="stylesheet" href="/assets_home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets_home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets_home/css/magnific-popup.css">

    <link rel="stylesheet" href="/assets_home/css/aos.css">

    <link rel="stylesheet" href="/assets_home/css/ionicons.min.css">
    
    <link rel="stylesheet" href="/assets_home/css/icomoon.css">
	<link rel="stylesheet" href="/assets_home/css/style.css">
	<link rel="icon" href="/assets/img/icono.ico" type="image/x-icon"/>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	<div class="py-1 bg-blue top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>

							<span class="text">{{ $numeroTelefono }}</span>							
						</div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">contacto@lindasonrisa.xyz</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						<p class="mb-0 register-link"><a href="{{ route('loginCliente') }}" class="mr-3">Ingreso Cliente</a><a href="{{ route('loginAdmin') }}">Ingreso Funcionario</a></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
			
		  {{-- <a class="navbar-brand" href="/">LindaSonrisa</a> --}}
		  <img src="/assets/img/banner.png" width="25%" class="navbar-brand img align-self-stretch" alt="" srcset="">
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Inicio</span></a></li>
			  <li class="nav-item"><a href="#about-section" class="nav-link"><span>Acerca</span></a></li>
	          <li class="nav-item"><a href="#servicios" class="nav-link"><span>Servicios</span></a></li>
	          {{-- <li class="nav-item"><a href="#solicitar" class="nav-link"><span>Inscripción</span></a></li> --}}
			  <li class="nav-item"><a href="#doctor-section" class="nav-link"><span>Especialistas</span></a></li>
				<li class="nav-item cta mr-md-2"><a   href="#solicitar" class="nav-link">Obtener Beneficios</a></li>
	          <li class="nav-item cta mr-md-2"><a  href="{{ route('loginCliente') }}" class="nav-link">Reserva tu hora</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	  <section class="hero-wrap js-fullheight" style="background-image: url('/assets_home/images/bg_3.jpg');" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 pt-5 ftco-animate">
          	<div class="mt-5">
          		<span class="subheading">Proyecto Linda Sonrisa</span>
	            <h1 class="mb-4">Salud Integral <br> Para tus Dientes</h1>
	            <p class="mb-4">Ofrece una nueva experiencia en servicio y atención, con box dentales equipados con la mejor tecnología y que atienden diversas especialidades, para el tratamiento dental.</p>
	            <p><a href="{{ route('loginCliente') }}" class="btn btn-primary py-3 px-4">Reserva tu hora</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(/assets_home/images/about.jpg);">
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
			            <h2 class="mb-4"> <span>LindaSonrisa</span> Cambia La Forma De Sonreir</h2>
			            <p>Creado por <strong>Luis y Marco</strong>, estudiantes en Odontológia de la Pontificia Universidad Católica. Crean el proyecto <strong>LindaSonrisa</strong> cuyo objetivo es dar una linda sonrisa a aquellas personas que no tienen la posibilidad económica para adquirir el servicio de forma particular.</p>
			            <p><a href="{{ route('loginCliente') }}" class="btn btn-secondary py-3 px-4">Solicitar Inscripción</a></p>
			          </div>
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
			<div class="container">
        <div class="row d-flex">
	        <div class="col-md-12 py-5">
	        	<div class="py-lg-5">
		        	<div class="row justify-content-center pb-5" id="servicios">
			          <div class="col-md-12 heading-section ftco-animate">
			            <h2 class="mb-3">Nuestros Servicios</h2>
			          </div>
			        </div>
			        <div class="row">
			        	<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-flex">
							<div class="icon justify-content-center align-items-center d-flex">   <span class="flaticon-ambulance"><img class="rounded-circle" src="/assets_home/images/icono-ortodoncia-1.gif" alt="" srcset=""></span></div>
							<div class="media-body pl-md-4">
								<h3 class="heading mb-3">ORTODONCIA</h3>
								<p>Especialidad que trata la alineación de los dientes y la resolución de problemas de mordida.</p>
							</div>
							</div>      
			          	</div>
						<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-flex">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor">
								<img class="rounded-circle" src="/assets_home/images/icono-implantologia.gif" alt="" srcset=""></span></div>
							<div class="media-body pl-md-4">
								<h3 class="heading mb-3">IMPLANTOLOGÍA</h3>
								<p>Es bueno consultar cuando hay pérdida de uno o más dientes, para evaluar la posibilidad de sustituir.</p>
							</div>
							</div>      
						</div>
						<div class="col-md-6 d-flex align-self-stretch ftco-animate">
								<div class="media block-6 services d-flex">
								<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-ambulance">
									<img class="rounded-circle" src="/assets_home/images/icono-odontologia.gif" alt="" srcset=""></span></div>
								<div class="media-body pl-md-4">
									<h3 class="heading mb-3">ODONTOLOGÍA GENERAL</h3>
									<p>Cuando tienes dolor, caries, inflamación leve de las encías, o necesitas realizar un chequeo general.</p>
								</div>
								</div>      
							  </div>
						<div class="col-md-6 d-flex align-self-stretch ftco-animate">
								<div class="media block-6 services d-flex">
								<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor">
									<img class="rounded-circle" src="/assets_home/images/icono-periodoncia.gif" alt="" srcset=""></span></div>
								<div class="media-body pl-md-4">
									<h3 class="heading mb-3">PERIODONCIA</h3>
									<p>Cuando tus encías están inflamadas o sangran al cepillarte los dientes, halitosis (mal olor en la cavidad bucal), o tienes piezas dentarias con movimiento.</p>
								</div>
								</div>      
							</div>
						<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-flex">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-stethoscope">
								<img class="rounded-circle" src="/assets_home/images/icono-odontopediatria.gif" alt="" srcset=""></span></div>
							<div class="media-body pl-md-4">
								<h3 class="heading mb-3">ODONTOPEDIATRÍA</h3>
								<p>Especialidad odontológica que trata el cuidado oral preventivo y terapéutico de niños y adolescentes.</p>
							</div>
							</div>      
						</div>
						<div class="col-md-6 d-flex align-self-stretch ftco-animate">
							<div class="media block-6 services d-flex">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-24-hours">
								<img class="rounded-circle" src="/assets_home/images/icono-disfuncion.gif" alt="" srcset=""></span></div>
							<div class="media-body pl-md-4">
								<h3 class="heading mb-3">DISFUNCIÓN</h3>
								<p>Cuando hay desgaste de piezas dentaria.
										Dolor al morder, dolor de cabeza y de musculatura relacionada con la zona orofacial.
										Rechinamiento nocturno.
										Apnea del sueño.</p>
							</div>
							</div>      
						</div>
			        </div>
			      </div>
		      </div>
		    </div>
			</div>
		</section>

    <section class="ftco-intro img" style="background-image: url(/assets_home/images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center" id="solicitar">
					<div class="col-md-9 text-center">
						<h2>¿Cómo adquerir el beneficio?</h2>
						<p><strong>Linda<em>Sonrisa</em></strong>: Es un proyecto de salud dental gratuito, cuyo objetivo es dar un servicio de alta calidad y tecnología a todas las personas que lo requieren.</p>
						
					
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb" >
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
    			<div class="col-md-4 d-flex">
    				<div class="img img-dept align-self-stretch" style="background-image: url(/assets_home/images/dept-1.jpg);"></div>
    			</div>

    			<div class="col-md-8">
    				<div class="row no-gutters">
    					<div class="col-md-12">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Paso 1</a></h3>
    								<p>Infórmate de los servicios que ofrecemos 100% gratuitos</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-12">
								<div class="department-wrap p-4 ftco-animate">
										<div class="text p-2 text-center">
											<div class="icon">
												<span class="flaticon-stethoscope"></span>
											</div>
											<h3><a href="#">Paso 2</a></h3>
											<p>Acércate a nuestro Centro Ubicado en .....</p>
										</div>
									</div>

    					</div>

    					<div class="col-md-12">
    							<div class="department-wrap p-4 ftco-animate">
										<div class="text p-2 text-center">
											<div class="icon">
												<span class="flaticon-stethoscope"></span>
											</div>
											<h3><a href="#">Paso 3</a></h3>
											<p>Entrega los siguientes documentos</p>
											<ul>
												<li>Fotocopia Carnet (Ambas parte)</li>
												<li>Ficha de Protección Social</li>
												<li>Certificado de residencia</li>
												<li>Liquidación de los últimos 4 meses</li>
											</ul>
										</div>
									</div>
    				
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-section" id="doctor-section">
			<div class="container-fluid px-5">
				<div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
						<h2 class="mb-4">Especialistas</h2>
						{{-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> --}}
					</div>
				</div>	
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(/assets_home/images/doc-8.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Luis </h3>
								<span class="position mb-2">Dentista</span>
								<div class="faded">
									<p>De pequeño mi padre me hablaba de la importancia de la higene bucal, como cepillarse los dientes, hasta el día de hoy lo cuido.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(/assets_home/images/doc-3.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3 class="mb-2">Dr. Marco</h3>
								<span class="position mb-2">Dentista</span>
								<div class="faded">
									<p>Siempre optamos por entregar una atención de calidad beneficiendo a nuestros clientes.</p>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>

		<section class="ftco-facts img ftco-counter" style="background-image: url(/assets_home/images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-md-5 heading-section heading-section-white">
						<span class="subheading">Servicios realizados</span>
						<h2 class="mb-4">Más de 300 consultas realizadas</h2>
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Reserva tu hora</a></p>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="70">0</strong>
		                <span>Números Beneficiados</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="500">0</strong>
		                <span>Personas con Linda Sonrisa</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="2">0</strong>
		                <span>Minutos se demorá para inscribir al beneficios</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="20">0</strong>
		                <span>Minutos es el promedio de una atención</span>
		              </div>
		            </div>
		          </div>
	          </div>
					</div>
				</div>
			</div>
		</section> 


    {{-- <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Gets Every Single Updates Here</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_1.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_2.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_3.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_4.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_5.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="/assets_home/blog-single.html" class="block-20" style="background-image: url('/assets_home/images/image_6.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="/assets_home/blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>
        </div>
      </div>
    </section> --}}

    {{-- <section class="ftco-section testimony-section img" style="background-image: url(/assets_home/images/bg_3.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Read testimonials</span>
            <h2 class="mb-4">Our Patient Says</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
			  </div>
			  <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
			  </div>
			  
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(/assets_home/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    {{-- <section class="ftco-section contact-section img" style="background-image: url(/assets_home/images/bg_3.jpg);" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="/assets_home/tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="/assets_home/mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section> --}}

    <footer class="ftco-footer ftco-section img" style="background-image: url(/assets_home/images/footer-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        {{-- <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Mediplus</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Departments</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Neurology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Opthalmology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Nuclear Magnetic</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Surgical</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Cardiology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Dental</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Departments</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Doctors</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Pricing</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Emergency Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Qualified Doctors</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Outdoors Checkup</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>24 Hours Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div> --}}
        <div class="row">
          <div class="col-md-12 text-center">
  			Copyright &copy; {{ date('Y') }} <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="/" target="_blank">LindaSonrisa</a></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/assets_home/js/jquery.min.js"></script>
  <script src="/assets_home/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/assets_home/js/popper.min.js"></script>
  <script src="/assets_home/js/bootstrap.min.js"></script>
  <script src="/assets_home/js/jquery.easing.1.3.js"></script>
  <script src="/assets_home/js/jquery.waypoints.min.js"></script>
  <script src="/assets_home/js/jquery.stellar.min.js"></script>
  <script src="/assets_home/js/owl.carousel.min.js"></script>
  <script src="/assets_home/js/jquery.magnific-popup.min.js"></script>
  <script src="/assets_home/js/aos.js"></script>
  <script src="/assets_home/js/jquery.animateNumber.min.js"></script>
  <script src="/assets_home/js/scrollax.min.js"></script>

  
  <script src="/assets_home/js/main.js"></script>
    
  </body>
</html>