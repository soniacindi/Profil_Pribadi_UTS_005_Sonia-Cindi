<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->



<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<head>

<title>Multi Tabs Resume Widget A Flat Responsive Widget Template :: W3layouts</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Multi Tabs Resume Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Custom-Style-Sheet -->
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all">
<!-- //Custom-Style-Sheet -->

<!-- Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" type="text/css" media="all">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700"			   type="text/css" media="all">
<!-- //Fonts -->

<!-- Default-JavaScript --><script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

</head>
<!-- //Head -->



	<!-- Body -->
	<body>

		<h1>Profile Pribadi</h1>

		<div class="containerw3layouts-agileits">

			<div id="verticalTab" class="resp-vtabs w3-agile" style="display: block; width: 100%; margin: 0px;">

				<ul class="resp-tabs-list agileits-w3layouts">
					<li class="resp-tab-item"><span>Biodata</span></li>
					<li class="resp-tab-item"><span>Pengalaman</span></li>
					<li class="resp-tab-item agileinfo"><span>Pendidikan</span></li>
					<li class="resp-tab-item"><span>Keahlian</span></li>
					<li class="resp-tab-item"><span>Kontak</span></li>
				</ul>

				<div class="resp-tabs-container">

					<div class="resp-tab-content">
						<div class="agileabout">
							<div class="agileabout-image w3-agileits">
								<img src="image/foto_biodata/{{$biodatas->foto}}" alt="W3layouts">
							</div>							<div class="agileabout-info">
								
								<ul>
									
									<li><div class="li1">Nama</div><div class="li2">:</div><div class="li3">{{$biodatas->nama}}</div><div class="clearfix"></div></li>
									<li><div class="li1">Tanggal Lahir</div><div class="li2">:</div><div class="li3">{{$biodatas->tanggal_lahir}}</div><div class="clearfix w3-agileits"></div></li>
									<li><div class="li1">No Telepon</div><div class="li2">:</div><div class="li3">{{$biodatas->no_telepon}}</div><div class="clearfix"></div></li>
									<li><div class="li1">Email</div><div class="li2 agileinfo">:</div><div class="li3"><a class="mail" href="mailto:mail@example.com">{{$biodatas->email}}</a></div><div class="clearfix"></div></li>
									<li><div class="li1">Website</div><div class="li2">:</div><div class="li3"><a href="#">{{$biodatas->website}}</a></div><div class="clearfix"></div></li>
									<li><div class="li1 agileinfo">Alamat</div><div class="li2">:</div><div class="li3 w3-agileits">{{$biodatas->alamat}}</div><div class="clearfix wthree"></div></li>

								</ul>
								
							</div>
							<div class="clear"></div>
						</div>
					</div>

					<div class="resp-tab-content">
						<div class="work">
							@foreach($pengalamens as $pengalamen)
							<div class="work-info agileits-w3layouts">
								<h4>{{$pengalamen->tahun_pengalamen}}</h4>
								<h5>{{$pengalamen->pengalamen_kerja}}</h5>
								<p>{{$pengalamen->deskripsi_pengalamen}} </p>
							</div>
							@endforeach
						</div>
					</div>

					<div class="resp-tab-content">
						<div class="work w3-agileits">
							<div class="work-info">
								<h4>2015-2019</h4>
								<h5>Universitas Negeri Surabaya</h5>
								<p>prestasi yang telah saya dapatkan pada saat saya kuliah adalah...</p>
							</div>
							<div class="work-info agileinfo">
								<h4>2013-2015</h4>
								<h5>SMA Pandaan 1</h5>
								<p>prestasi yang telah saya peroleh selama masa SMA adalah ...</p>
							</div>
							<div class="work-info w3layouts">
								<h4>2010-2013</h4>
								<h5>SMP Giki 1</h5>
								<p>prestasi yang telah saya dapatkan sewaktu SMP adalah ...</p>
							</div>
						</div>
					</div>

					<div class="resp-tab-content">
						<div class="our-skills">
							<div class="single-skill">
								<p class="lead"> sedikit tentang memahami javascript HTML </p>
							</div>
							<div class="single-skill">
								<p class="lead">50 persen memahami CSS</p>
							</div>
							<div class="single-skill">
								<p class="lead">70 persen memahami JAVASCRIPT</p>
							</div>
							<div class="single-skill">
								<p class="lead">50 persen PHP</p>
							</div>
							<div class="single-skill">
								<p class="lead">60 persen SQL</p>
							</div>
						</div>
					</div>

					<div class="resp-tab-content">						
						<div class="agileabout-info aitsabout">
							<ul>
								<li><div class="li1">Nama</div><div class="li2 wthree">:</div><div class="li3">{{$biodatas->nama}}</div><div class="clearfix w3-agile"></div></li>
								<li><div class="li1 w3-agile">Tanggal Lahir</div><div class="li2">:</div><div class="li3">{{$biodatas->tanggal_lahir}}</div><div class="clearfix"></div></li>
								<li><div class="li1">No Telepon</div><div class="li2 w3-agile">:</div><div class="li3">{{$biodatas->no_telepon}}</div><div class="clearfix"></div></li>
								<li><div class="li1">Email</div><div class="li2">:</div><div class="li3"><a class="mail" href="mailto:mail@example.com">{{$biodatas->email}}</a></div><div class="clearfix agile"></div></li>
								<li><div class="li1">Website</div><div class="li2">:</div><div class="li3"><a href="#">{{$biodatas->website}}</a></div><div class="clearfix"></div></li>
								<li><div class="li1 w3-agile">Alamat</div><div class="li2">:</div><div class="li3">{{$biodatas->alamat}}</div><div class="clearfix"></div></li>
							</ul>
						</div>
						<div class="clear"></div>
						<div class="social-icons w3layouts agileits">
							<h4>Sosial Media Saya</h4>
							<ul>
								<li class="fb w3ls w3layouts agileits"><a href="#"><span class="icons w3layouts agileits"></span><span class="text w3layouts agileits">Facebook</span></a></li>
								<li class="twt w3ls w3layouts agileits"><a href="#"><span class="icons w3layouts agileits"></span><span class="text w3layouts agileits">Twitter</span></a></li>
								<li class="ggp w3ls w3layouts agileits"><a href="#"><span class="icons w3layouts agileits"></span><span class="text w3layouts agileits">Google+</span></a></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>

				</div>
				<div class="clear w3-agile"></div>

			</div>

		</div>

		<div class="w3lsfooteragileits">
			<p> &copy; 2021 Profile Pribadi. Seluruh Hak Cipta| Design by <a href="http://w3layouts.com" target="=_blank">W3layouts</a></p>
		</div>



		<!-- Necessary-JavaScript-Files-&-Links -->

			<!-- Tabs-JavaScript -->
				<script src="{{asset('js/easyResponsiveTabs.js')}}"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',
							width: 'auto',
							fit: true,
							closed: 'accordion',
							activate: function(event) {
								var $tab = $(this);
								var $info = $('#tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});
						$('#verticalTab').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true
						});
					});
				</script>
			<!-- //Tabs-JavaScript -->


		<!-- //Necessary-JavaScript-Files-&-Links -->



	</body>
	<!-- //Body -->

</html>