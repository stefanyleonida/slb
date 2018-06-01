// funções

function carregandoOn(){
  $('#loading').show();
  $('#over_loading').show();
  $('.modal_hide').fadeOut('slow');
}

function carregandoOff(){
  $('#loading').fadeOut('slow');
  $('#over_loading').fadeOut('slow');
}

$(document).ready(function(){

  // mascaras
  $('.cep').mask('00000-000');
  $('.telefone').mask('(00) 0000-0000');
  $('.cpf').mask('000.000.000-00');
  $('.ano').mask('0000');

  // funções
  $('.voltar').click(function(){
    history.back();
  });
  $('.carregando').submit(function(){
    carregandoOn();
  });
  $('.dataTable').dataTable({
     "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
     }
  });

  $('.excluir').click(function(){
    var href = $(this).data('href');
    swal({
      title: 'Tem certeza?',
      text: "Deseja realmente excluir o cadastro?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, excluir!',
      cancelButtonText: 'Não, cancelar!'
    }).then((result) => {
      if (result.value) {
        window.location.href = href;
      }
    });
  });
    carregandoOff();
});
