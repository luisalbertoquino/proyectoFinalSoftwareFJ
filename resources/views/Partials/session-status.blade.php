@if(session('status'))

<div class="alert alert-success" id="success-alert" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Correcto!</strong>
    {{ session('status') }}
 </div>
  
@endif 
