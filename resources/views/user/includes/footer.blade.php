<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h4>O tabula</h4>
        <ul>
          <li><a href="#">Institucional</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Tabula para Empresas</a></li>
        </ul>
      </div>
      <div class="col-sm-4">
        <h4>Suporte</h4>
        <ul>
          <li><a href="#">Central de Ajuda</a></li>
          <li><a href="#">Perguntas Frequentes</a></li>
          <li><a href="#">Termos e Condições</a></li>
          <li><a href="#">Política de Privacidade</a></li>
          <li><a href="#">Política de Propriedade Intelectual</a></li>
        </ul>
      </div>
      <div class="col-sm-4">
        <h4>Comunidade</h4>
        <ul>
          <li><a href="#">Parceiros</a></li>
          <li><a href="#">Empresas</a></li>
          <li><a href="#">Professores</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">

$('.carousel-courses').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow: $('.prev-carousel-courses'),
  nextArrow: $('.next-carousel-courses'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

function states()
  {
    if($('#country').val() == 1){
        $('.state').slideDown();
      }else{
        $('.state').slideUp();
      }
    }
  $('.state').hide();
  states();
  $('#country').change(function(){
    states();
  });

</script>