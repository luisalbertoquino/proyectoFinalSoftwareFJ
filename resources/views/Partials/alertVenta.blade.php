@if(session('venta'))

<div hidden class="alert alert-success" id="success-alert" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Correcto!</strong>
    {{ session('venta') }}
    <a class="btn btn-danger"  data-toggle="modal" data-target="#facturaPrevia" id="facturaPrevia1"><i class="fas fa-trash-alt"></i></a>
</div>

  
@endif 
