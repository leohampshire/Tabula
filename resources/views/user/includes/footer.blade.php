<?php
  $pages = DB::table('pages')->get();
?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h4>O tabula</h4>
        <ul>
          <li><a href="#">Institucional</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="{{route('company.register')}}">Tabula para Empresas</a></li>
        </ul>
      </div>
      <div class="col-sm-4">
        <h4>Suporte</h4>
        <ul>
          @foreach($pages as $page)
          <li><a href="{{route('page', ['urn'=> $page->urn])}}">{{$page->name}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-sm-4">
        <h4>Comunidade</h4>
        <ul>
          <li><a href="#">Parceiros</a></li>
          <li><a href="{{route('all-companies')}}">Empresas</a></li>
          <li><a href="{{route('all-teachers')}}">Professores</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-credit">
      <div class="row">
        <div class="col-sm-12">
          <p class="text-center">© 2019 Tabula. Todos os direitos reservados.</p>
          <p class="text-center">CNPJ: 05.517.390/0001-95. Atendimento: suporte@tabula.com.br</p>
          <p class="text-center"></p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
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

$(document).on('click', '#scroll', function(event){
    var tela = $(window).width();
    if(tela < 768){
        event.preventDefault(); 
        $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top -90
        }, 800);
    } else {
        event.preventDefault(); 
        $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top -50
        }, 800);
    }
});
  function states()
  {
    if($('#country').val() == 1){
        $('.state').slideDown();
      }else{
        $('.state').slideUp();
     }
   }
 $(document).ready(function(){
  // a cada click em qualquer checkbox ou no botao de procurar
  $('input[name="macrotema"], input[name="subtema"], #search_btn').click(function(){

  var checked_group = [];
  // controla a quantidade de checks, se = 0, any_check = false
  var checked_num = 0;
  // controla o valor do campo de busca (string), se '', any_string = false
  var course_title;
  // variavel que vai segurar ATRIBRUTOS extras no 'data' do ajax, e passar para o controller
  var output;

  // adiciona cada categoria checada no array checked_group (a cada click em qualquer checkbox ou no botao de procurar)
  $('input[name="macrotema"]:checked').each(function()
  {
    var count_sub_checked = 0;
    var count_sub_total = 0;

    // Faz a contagem de quantas subcategorias da categoria principal estão selecionadas
    $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
      if($(this).is(':checked')){
          count_sub_checked++;
      }
      count_sub_total++;
    });

    // Se não for selecionada nenhuma ou todas as subcategorias para filtro
    if(count_sub_checked == 0 || count_sub_total == count_sub_checked){
      // Adiciona a categoria principal na busca
      checked_group.push($(this).val());
      checked_num++;
      // Adiciona todas as subcategorias na busca
      $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
          checked_group.push($(this).val());
          checked_num++;
      });
    } else {
      $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
          if($(this).is(':checked')){
              checked_group.push($(this).val());
              checked_num++;
          }
      });
    }
  });

  checked_group = checked_group.toString();
    
  // pega o valor do campo de busca (string)
  var course_title = $('#search_string').val();
  course_title = course_title.toString();

  // verifica se existe check ou string e altera os ATRIBUTOS que serão usados pelo controller
  if (course_title != "" && checked_num > 0)
      output = {any_string:true,any_check:true,checked_group_output:checked_group,course_title_output:course_title};
  else if (course_title != "" && checked_num == 0)

      output = {any_string:true,any_check:false,course_title_output:course_title};
  else if (course_title == "" && checked_num > 0)
      output = {any_string:false,any_check:true,checked_group_output:checked_group};
  else
      output = {any_string:false,any_check:false,};
console.log(output);
  $.ajax({
      type: 'GET',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: '{{ route('search.category') }}',
      data: output,
      error: function(e){
          console.log(e);
      },
      success: function(response){
          console.log(response);
          $('#search-results').html(response);
      }
    });
  });
});

  
  $('.state').hide();
  states();
  $(document).on("change", '#country', function(event){
    states();
  });

    var url = "{{route('teacher.course.subcategory')}}";
    @isset($course)
    var id = '{{$course->category_id}}';
    categAjax(url, id);
    @endisset

    $('#sub_categ').hide();
    $(document).on("change", '#categ', function(event) { 
      var categId = $('#categ option:selected').val();
      console.log(categId);
      categAjax(url, categId);
    });
    $(document).on("change", '#category_id', function(event) { 
      var url = "{{route('teacher.course.subcategory')}}";
      var categId = $('#category_id option:selected').val();
      categAjax(url, categId);
    });

    var url_atual = window.location.href;
    var uri = window.location.pathname;
    var url = window.location.protocol + "//" + window.location.host;
    var urn = url+uri;
     if (urn == '{{route('user.panel')}}') {
      getContent("{{route('user.personal')}}");
    }
   

    $('.personal').on('click', function(){
      var url = $(this).data('url');
      $('.btn-panel-menu').removeClass('btn-active');
      $(this).find('button').addClass('btn-active');
      getContent(url);
    });
    $('.teach').on('click', function(){
      var url = $(this).data('url');
      $('.btn-panel-menu').removeClass('btn-active');
      $(this).find('button').addClass('btn-active');
      getContent(url);
    });

    $(document).on("click", '.course-create', function(event) { 
      var url = $(this).data('url');
      $('.btn-panel-menu').removeClass('btn-active');
      $(this).find('button').addClass('btn-active');
      getContent(url);
    });

    $('.my-course').on('click', function(){
      var url = $(this).data('url');
      $('.btn-panel-menu').removeClass('btn-active');
      $(this).find('button').addClass('btn-active');
      getContent(url);
    });

    $(document).on("click", '.course-edit', function(event) { 
      var url = $(this).data('url');
      getContent(url);
    });

    $(document).on("click", '.test-index', function(event) { 
      var url = $(this).data('url');
      getContent(url);
    });

    $(document).on("click", '.course-item', function(event){
      var url = $(this).data('url');
      getContent(url);
    });
    $(document).on("click", '.teacher-include', function(e) { 
      e.preventDefault();
      var url = $(this).data('url');
      $('.btn-panel-menu').removeClass('btn-active');
      $(this).find('button').addClass('btn-active');
      $('#teacherModal form input[name="company_id"]').val($(this).data('id'));
      $('#teacherModal').modal('show');
    });
    

    $('.answer').hide();
    function seeAnswer(id){
      $('#'+id).slideToggle();
    }
    


function avaliar(estrela) {
  var url = window.location;
  url = url.toString()
  url = url.split("index.html");
  url = url[0];
  var s1 = document.getElementById("s1").src;
  var s2 = document.getElementById("s2").src;
  var s3 = document.getElementById("s3").src;
  var s4 = document.getElementById("s4").src;
  var s5 = document.getElementById("s5").src;
  var avaliacao = 0;

  if (estrela == 5){ 
    if (s5 == "{{asset('images/img/star0.png')}}") {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star1.png')}}";
      avaliacao = 5;
    } else {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 4;
    }
  }

  //ESTRELA 4
  if (estrela == 4){ 
    if (s4 == "{{asset('images/img/star0.png')}}") {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 4;
    } else {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 3;
    }
  }

  //ESTRELA 3
  if (estrela == 3){ 
    if (s3 == "{{asset('images/img/star0.png')}}") {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 3;
    } else {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 2;
    }
  }

  //ESTRELA 2
  if (estrela == 2){ 
    if (s2 == "{{asset('images/img/star0.png')}}") {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 2;
    } else {
       document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
       document.getElementById("s2").src = "{{asset('images/img/star0.png')}}";
       document.getElementById("s3").src = "{{asset('images/img/star0.png')}}";
       document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
       document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
       avaliacao = 1;
    }
  }
   
   //ESTRELA 1
  if (estrela == 1){ 
    if (s1 == "{{asset('images/img/star0.png')}}") {
      document.getElementById("s1").src = "{{asset('images/img/star1.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 1;
    } else {
      document.getElementById("s1").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s2").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s3").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s4").src = "{{asset('images/img/star0.png')}}";
      document.getElementById("s5").src = "{{asset('images/img/star0.png')}}";
      avaliacao = 0;
    }
  }

  document.getElementById('rating').innerHTML = avaliacao;
  document.getElementById('ratings').value = avaliacao;

}

/*-----------------------------Modals------------------------------------*/

  $(document).on("click", '.act-delete', function(e) { 
    e.preventDefault();
    $('#confirmationModal .modal-title').html('Confirmação');
    $('#confirmationModal .modal-body p').html('Tem certeza que deseja realizar esta exclusão?');
    var href = $(this).attr('href');
    $('#confirmationModal').modal('show').on('click', '#confirm', function() {
      window.location.href=href;
    });
  });
  $(document).on("click", '.act-avaliable', function(e) { 
    e.preventDefault();
    var href = $(this).attr('href');
    $('#avaliableModal').modal('show').on('click', '#confirm', function() {
      window.location.href=href;
    });
  });
  $(document).on("click", '.act-chapter', function(e) { 
    e.preventDefault();
    $('#chapterModal form input[name="course_id"]').val($(this).data('id'));
    $('#chapterModal').modal('show');
  });

  $(document).on("click", '.act-edit-chapter', function(e) { 
    e.preventDefault();
    $('#chapterEditModal form input[name="id"]').val($(this).data('id'));
    $('#chapterEditModal form input[name="name"]').val($(this).data('name'));
    $('#chapterEditModal form input[name="desc"]').val($(this).data('desc'));
    $('#chapterEditModal').modal('show');
  });
  $(document).on("click", '.act-include', function(e) {
    e.preventDefault();
    $('#includeModal form input[name="id"]').val($(this).data('id'));
    $('#includeModal').modal('show');
  });

  $('.act-answer').on("click", function(e) {
    e.preventDefault();
    $('#answerModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#answerModal form input[name="answer"]').val($(this).data('answer'));
    $('#answerModal').modal('show');
  });

  $('.act-free-item').on('click', function(e){
    e.preventDefault();
    var name = $(this).data('name');
    var desc = $(this).data('desc');
    var path = $(this).data('path');
    var type = $(this).data('type');
    var url = $(this).data('url');
    $('#freeItemModal').find('.nome').html('<h1>'+name+'</h1>');
    $('#freeItemModal').find('.desc').html('<p>'+desc+'</p>');
    if(type == 1 || type == 4){
      $('#freeItemModal').find('.path').html(
        '<video width="100%" id="path" controls> <source src="'+url+'/'+path+'" type="video/mp4"> </video>'
      );
    }else if (type == 2) {
      $('#freeItemModal').find('.path').html(
        '<img src="'+url+'/'+path+'" >'
      );
    }
    $('#freeItemModal').modal('show');
  });

  $('.stop').on('click', function(){
    path = document.getElementById('path');
      path.pause();
  });


  $(document).on("click", '.act-edit-item', function(e) { 
    e.preventDefault();
    var url = $(this).attr('data-url');
    var file = $(this).attr('data-file');
    var type = $(this).attr('data-type');
    $('#itemEditModal form input[name="id"]').val($(this).data('type'));
    $('#itemEditModal form input[name="name"]').val($(this).data('name'));
    $('#itemEditModal form textarea[name="desc"]').val($(this).data('desc'));
    if(type < 5){
    $('#itemEditModal form select[name="item_type_id"]').val($(this).data('id'));
      if (type == 3) {
        $('.file').slideUp();
      }else{
        $('.file').slideDown();
        if(type != 1){
          $(".path").html('<img src="'+url+'/'+file+'" height="400px"">');
        }else{
          $(".path").html('<video  height="400px" controls><source src="'+url+'/'+file+'"></video>');
        }
      }
    }else if(type == 5){
      
    }
    $('#itemEditModal').modal('show');
  });


  $(document).on("click", '.act-class', function(e) { 
    e.preventDefault();
    $('#itemModal form input[name="chapter_id"]').val($(this).data('chapter_id'));
    $('#itemModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#itemModal').modal('show');
  });

  $(document).on("click", '.act-complement', function(e) { 
    e.preventDefault();
    $('#complementModal form input[name="chapter_id"]').val($(this).data('chapter_id'));
    $('#complementModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#complementModal').modal('show');
  });

  $(document).on("click", '.act-test', function(e) { 
    e.preventDefault();
    $('#classModal form input[name="chapter_id"]').val($(this).data('chapter_id'));
    $('#classModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#classModal').modal('show');
  });


  $(document).on("click", '.act-question', function(e) { 
    e.preventDefault();
    $('#questionModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#questionModal form input[name="chapter_id"]').val($(this).data('chapter_id'));
    $('#questionModal form input[name="item_parent"]').val($(this).data('item'));
    $('#questionModal').modal('show');
  });

  $(document).on("click", '.act-rating', function(e) { 
    e.preventDefault(e);
    $('#ratingModal form input[name="course_id"]').val($(this).data('course_id'));
    $('#ratingModal form input[name="user_id"]').val($(this).data('user_id'));
    $('#ratingModal').modal('show');
  });
  //Fim Modais
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

    function categAjax(url, categId){
      $.ajax({
        type: 'GET',
        url: url,
        data:{
            categId: categId,
        },
        beforeSend: function(){
        },
        success: function(data){
            var result = $.parseJSON(data);
            var i = 0;
            $('#subcategory_id').html('');
            if (result.length != 0) {
              for (i =0; i < result.length; ++i){
                  $('#subcategory_id').append('<option value="'+result[i].id+'" >'+result[i].name+'</option>');
              }
              $('#sub_categ').show();

            }else{
              $('#sub_categ').hide();
            }
        }
      });
    }

//--------Fim funções ajax ---------------------------------------------------------------
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