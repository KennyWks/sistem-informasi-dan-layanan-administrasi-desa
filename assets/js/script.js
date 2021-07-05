//animation javascript untuk jumbotron pembanguanan
$(window).on('load', function () {
	$('.deskripsi').addClass('tampil');
	$('.oleh').addClass('tampil');
});

//animation javascript untuk jumbotron home
$(window).on('load', function () {
	$('.slip').addClass('tampil');
	$('.kenali').addClass('tampil');
});

$(window).scroll(function () {
	//animasi tomobol bergerak di jumbotron halaman home
	let wScroll = $(this).scrollTop();

	$('.jumbotron a').css({
		'transform': 'translate(0px, ' + wScroll / 1.5 + '%)'
	});

	//animasi transisi gambar halaman pembangunan
	if ($('div').hasClass('gambar')) {
		if (wScroll > $('.card-body').offset().top - 250) {
			$('.card-body .gambar').each(function (i) {
				setTimeout(function () {
					$('.card-body .gambar').eq(i).addClass('muncul');
				}, 800 * (i + 1));
			});
		}
	}
	//animasi transisi gambar halaman home
	if ($('div').hasClass('img-splashed')) {
		if (wScroll > $('.img-splashed').offset().top - 250) {
			$('.img-splashed .gambar').each(function (i) {
				setTimeout(function () {
					$('.img-splashed .gambar').eq(i).addClass('muncul');
				}, 800 * (i + 1));
			});
		}
	}
});

// Scroll to top button 
(function ($) {
	"use strict"; // Start of use strict

	// Scroll to top button appear
	$(document).on('scroll', function () {
		const scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});

	// Smooth scrolling using jQuery easing
	$(document).on('click', 'a.scroll-to-top', function (e) {
		const $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		e.preventDefault();
	});

})(jQuery); // End of use strict

$(window).load(function () {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");
});

//batasi karakter pada komentar pada berita dan pesan pada kontak
const panjangKarakter = 150;
$('textarea').keyup(function () {
	const panjangText = panjangKarakter - $(this).val().length;
	$('.hitungKarakter').text(panjangText);
});