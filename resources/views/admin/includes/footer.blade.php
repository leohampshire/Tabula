<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <b>Tabula</b>.</strong> Todos os direitos reservados.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js?ver=1.1')}}"></script>

<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $('#type-transaction').on('change', function(){
    var type = $(this).val();
    if (type != 1) {
      $('#due_date').hide();
    }else{
      $('#due_date').show();
    }
  });

//////////////////////////////////////////////////////////////////////////////////

  // Identifica se algum caracter foi digitado e executa a função
  $('#dataOrder input').keyup( function(){

    var total    = 0;
    var subtotal = realToFloat($('#dataOrder input[name="subtotal"]').val());
    var freight    = realToFloat($('#dataOrder input[name="freight"]').val());
    var discount = realToFloat($('#dataOrder input[name="discount"]').val());

    total = subtotal + freight - discount;

    // Fixa apenas duas casas decimais para o número
    total = total.toFixed(2);

    // Converte para o formato brasileiro
    total = floatToReal(total);

    // Passa o valor para o formulário
    $('#dataOrder input[name="total"]').val(total);

  });
// Seo
  seoValidate();

  $('#pageType').change(function(){
    seoValidate();
  });
    


function seoValidate()
{
    if($('#pageType').val() == 'home'){
      $('.pageCateg').hide();
      $('.pageCourse').hide();
    } else if ($('#pageType').val() == 'category') {
      $('.pageCateg').show();
      $('.pageCourse').hide();
    }else if($('#pageType').val() == 'course'){
      $('.pageCateg').hide();
      $('.pageCourse').show();
    }else{
      $('.pageCateg').hide();
      $('.pageCourse').hide();
    }
}
//Fim Tela de SEO


  $(document).ready(function() {
    $(".multiple").select2({
      ajax: { 
       url: "{{route('admin.coupon.search')}}",
       type: "post",
       dataType: 'json',
       delay: 250,
       
       data: function (params) {
        return {
          searchTerm: params.term,
          type: $('select[name="type_coupon"]').val(),
        };
       },
       processResults: function (response) {
        console.log(response);
         return {
            results: response
         };
       },
       cache: true
      },
      minimumInputLength: 3
    });  
  });
  // Controle Cupom
  $(document).ready(function(){
    $('.course').hide();
    $('.macrotema').hide();
    $('.subcateg').hide();
    if ($('select[name="type_coupon"]').val() == 'produto') {
        $('.course').show();
        $('.macrotema').hide();
        $('.subcateg').hide();
      }else if($('select[name="type_coupon"]').val() == 'macrotema'){
        $('.course').hide();
        $('.macrotema').show();
        $('.subcateg').hide();
      }else if($('select[name="type_coupon"]').val() == 'subcategoria'){  
        $('.course').hide();
        $('.macrotema').hide();
        $('.subcateg').show();
      }else{
        $('.course').hide();
        $('.macrotema').hide();
        $('.subcateg').hide();
      }

  });

  function states()
  {
    if($('#country').val() == 1){
        $('.state').show();
      }else{
        $('.state').hide();
      }
    }
  $('.state').hide();
  states();
  $('#country').change(function(){
    states();
  });

  
  $('#type_coupon').change(function(){
    if($(this).val() == 'produto'){
      $('.course').show();  
      $('.macrotema').hide();
      $('.subcateg').hide();
    } else{
      if ($(this).val() == 'macrotema') {
        $('.macrotema').show();
        $('.course').hide();
        $('.subcateg').hide();
      }else{
        if ($(this).val() == 'subcategoria') {
          $('.subcateg').show();
          $('.macrotema').hide();
          $('.course').hide();
        }else{
          $('.subcateg').hide();
          $('.macrotema').hide();
          $('.course').hide();
        }
      }
    }
  });
// Fim controle do cupom
  $(document).ready(function(){
    @isset($course)
    var id = '{{$course->category_id}}';
    var url = "{{route('admin.course.subcategory')}}";
    categAjax(url, id);
    @endisset

      $('#categ' ).change(function() {
        var categId = $('#categ option:selected').val();
        console.log(categId);
        categAjax(url, categId);
      });
    $('#sub_categ').hide();
    $('#category_id' ).change(function() {
      var url = "{{route('admin.course.subcategory')}}";
      var categId = $('#category_id option:selected').val();
      categAjax(url, categId);
      
    });

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
            console.log(result[i].id);
                  $('#subcategory_id').append('<option value="'+result[i].id+'" >'+result[i].name+'</option>');
              }
              $('#categ').removeClass('col-xs-12');
              $('#categ').addClass('col-xs-6');
              $('#sub_categ').show();

            }else{
              $('#categ').removeClass('col-xs-6');
              $('#categ').addClass('col-xs-12');
              $('#sub_categ').hide();
            }
        }
      });
    }
  });  

  // Converte número do formato brasileiro para tipo float
  function realToFloat(amount){
    amount = amount.replace(/\./g, "");
    amount = amount.replace(",", ".");
    amount = parseFloat(amount);
    return amount;
  }
  // Converte número do formato float para o formato brasileiro
  function floatToReal(n, c, d, t){
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }
/*-----------------------------------------------------------------------------------------------------*/

//Modals
  $('.act-delete').on('click', function (e) {
    e.preventDefault();
    $('#confirmationModal .modal-title').html('Confirmação');
    $('#confirmationModal .modal-body p').html('Tem certeza que deseja realizar esta exclusão?');
    var href = $(this).attr('href');
    $('#confirmationModal').modal('show').on('click', '#confirm', function() {
      window.location.href=href;
    });
  });

  $('.act-chapter').on('click', function(e){
    e.preventDefault();
    $('#chapterModal').modal('show');
  });

   $('.act-student').on('click', function(e){
    e.preventDefault();
    $('#studentModal form input[name="id"]').val($(this).data('id'));
    $('#studentModal').modal('show');
  });

  $('.act-edit-chapter').on('click', function(e){
    e.preventDefault();
    $('#chapterEditModal form input[name="id"]').val($(this).data('id'));
    $('#chapterEditModal form input[name="name"]').val($(this).data('name'));
    $('#chapterEditModal form input[name="desc"]').val($(this).data('desc'));
    $('#chapterEditModal').modal('show');
  });
  $('.act-include').on('click', function(e){
    e.preventDefault();
    $('#includeModal form input[name="id"]').val($(this).data('id'));
    $('#includeModal').modal('show');
  });

   $('.act-edit-item').on('click', function(e){
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


  $('.act-class').on('click', function(e){
    e.preventDefault();
    $('#itemModal').modal('show');
  });
  $('.act-complement').on('click', function(e){
    e.preventDefault();
    $('#complementModal').modal('show');
  });

  $('.act-test').on('click', function(e){
    e.preventDefault();
    $('#classModal').modal('show');
  });

  $('.act-question').on('click', function(e){
    e.preventDefault();
    $('#questionModal').modal('show');
  });
//End-Modals 
/*-------------------------------------------------------------------------------------*/
// Perguntas das provas
$('.alt_mult').hide();
$('.alternative').hide();
$('.truefalse').hide();
$('.dissertative').hide();
  $('.item_type_id').change(function(){
    if($(this).val() == 7){
      $('.alt_mult').slideDown();
      $('.dissertative').slideUp();
      $('.alternative').slideUp();
      $('.truefalse').slideUp();
    }else if($(this).val() == 8){
      $('.truefalse').slideDown();
      $('.dissertative').slideUp();
      $('.alternative').slideUp();
      $('.alt_mult').slideUp();
    }else if($(this).val() == 9){
      $('.alternative').slideDown();
      $('.dissertative').slideUp();
      $('.truefalse').slideUp();
      $('.alt_mult').slideUp();
    }else{
      $('.dissertative').slideDown();
      $('.alternative').slideUp();
      $('.truefalse').slideUp();
      $('.alt_mult').slideUp();
    }
  });
// fim Perguntas das provas
/*-------------------------------------------------------------------------------------------------------*/
  $('.file').hide();
  $('.item_type_id').change(function(){
    if($(this).val() == 3){
      $('.file').slideUp();
    }else{
      $('.file').slideDown();
    }
  });

  $('.clear-filters').click( function(){
    $(':input','#filterForm')
    .not(':button, :submit, :reset, :hidden')
    .val('')
    .prop('checked', false)
    .prop('selected', false);
  });

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

    $('.input-cep').inputmask({"mask": "99999-999", "placeholder":"_"});

    $('.input-cnpj').inputmask({"mask": "99.999.999/9999-99", "placeholder":"_"});

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

