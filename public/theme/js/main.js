$(document).ready(function(){
    setTimeout(function(){
        $('.pageloader').fadeOut('fast');
    },2000);

    $('.menu-icon').click(function(){
        $(this).toggleClass('active');
        $('nav ul').slideToggle(200);
        $('nav .redessociais').slideToggle(200);
    });

    $("nav li.receitas a").click(function (event)
	{
		event.preventDefault();
        $('.menu-icon').toggleClass('active');
        if($('.menu-icon').css('display') == "block"){
            $('nav ul').slideToggle(200);
            $('nav .redessociais').slideToggle(200);
        }
        var deslocamento = $("#receitas").offset().top-56;
		$('html, body').animate({ scrollTop: deslocamento }, 700);
	});

    $('.carousel-produtos').slick({
        dots: false,
        infinite: true,
        speed: 400,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<a href="#" class="seta-receita prev-receita"></a>',
        nextArrow: '<a href="#" class="seta-receita next-receita"></a>',
    });

    $('.carousel-receitas').slick({
        dots: false,
        infinite: true,
        speed: 400,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<a href="#" class="seta-receita prev-receita"></a>',
        nextArrow: '<a href="#" class="seta-receita next-receita"></a>',
    });

    $('.carousel-receitas').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('section.receitas .img-receita-fundo').addClass('esconder');
        $('section.receitas .img-receita-fundo').eq(nextSlide).removeClass('esconder');
    });
});
