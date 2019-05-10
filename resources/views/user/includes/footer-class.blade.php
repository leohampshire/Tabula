

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
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

    $(document).on("click", '.check-class', function(event){
      var class_id = $(this).attr('id');
      var url = $(this).data('url');
      var user_id = $(this).data('user_id');
      checkedClassAjax(url, class_id, user_id);
    });

    $(document).on("click", '.check-class', function(event){
      
    });


  /*----------------------------------------------------------------------------------------------*/
    //Funcoes Ajax
    function getContent(url){
      $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function(){
          $('#content').html('Carregando...');
        },
        success: function(data){
          $('#content').html(data);
        },
        error: function(e){
          console.log(e);
        }
      });
    }


    function checkedClassAjax(url, class_id, user_id){
      $.ajax({
        type: 'POST',
        url: url,
        data:{
            class_id: class_id,
            user_id: user_id,
        },
        beforeSend: function(){
          console.log('carregando...');
        },
        success: function(data){
            //var result = $.parseJSON(data);
            console.log(data);
        }
      });
    }

//--------Fim funções ajax-------------------------------------------------------------------------
// Mask
  $( document ).ready(function() {
    $('.input-telefone').each( function(){
      var phone = $(this).val().replace(/\D/g, '');
      if(phone.length > 10){
        $(this).inputmask({"mask": "(99) 99999-9999", "placeholder":" "});
      } else {
        $(this).inputmask({"mask": "(99) 9999-99999", "placeholder":" "});
      }
    });
  });

  $('.input-phone').focusout( function(){
    var phone = $(this).val().replace(/\D/g, '');
    if(phone.length > 10){
      $(this).inputmask({"mask": "(99) 99999-9999", "placeholder":" "});
    } else {
      $(this).inputmask({"mask": "(99) 9999-99999", "placeholder":" "});
    }
  });
    

  $('.alert .close').click( function(){
    $(this).parent().hide();
  });

  $('.input-date').datepicker({
      language: 'pt-BR',
      format: 'dd/mm/yyyy',
      autoclose: true
  });

  $(".input-money").maskMoney({
      thousands:'.', 
      decimal:',', 
      allowZero: true,
      symbolStay: true
  });
//Fim mascaras
</script>