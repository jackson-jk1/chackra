$(document).ready(function () { $('#sidebarCollapse').on('click', function () { $('#sidebar').toggleClass('active'); }); });
$("body").on('click', "[data-custom='open_modal']", function (event) {
    event.preventDefault();
    var btn = $(this);
    var link = $(this).attr('href');
    var title = $(this).text();
    $('#custom_modal_resource').remove();
    var modal = '<div class="modal" id="custom_modal_resource">\
    	<div class="modal-dialog">\
    	<div class="modal-content">\
    	<div class="modal-header">\
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
    	<h4 class="modal-title">'+ title + '</h4>\
    	</div>\
    	<div class="modal-body">\
    	\<form method="POST" action="/">\
    	\@csrf\
  <div class="form-group">\
    <label for="exampleFormControlInput1"><h3>Seu email</h3></label>\
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">\
    \ <label for="exampleFormControlInput1"><h3>Seu nome</h3></label>\
    \<input type="text" class="form-control" id="name" placeholder="seu nome" name="name">\
  </div>\
  <div class="form-group">\
  </div>\
  <div class="form-group">\
  </div>\
  <div class="form-group">\
    <label for="exampleFormControlTextarea1"><h3>Digite sua Mensagem</h3></label>\
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bodyMessage"></textarea>\
  </div>\
  \<button type="submit" class="btn btn-success">Success</button>\
</form>\
    	</div>\
    	</div>\
    	</div>\
    	</div>';
    $('body').append(modal);
    $('#custom_modal_resource').modal('show');
    $('#custom_modal_resource .modal-body').load(link);
});
