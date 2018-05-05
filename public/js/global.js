// funções

$(document).ready(function(){

  // mascaras
  $('.cep').mask('00000-000');
  $('.telefone').mask('(00) 0000-0000');
  $('.cpf').mask('000.000.000-00');

  // funções
  $('.voltar').click(function(){
    history.back();
  });
  $('.dataTable').dataTable({
     "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
     }
  });
});
