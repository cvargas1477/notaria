@extends('layouts.app')

@section('content')


<div class="container">	
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		Mantenimiento Usuario
                   <div class="float-right">
                        <button class="btn btn-primary btn-sm btn-agregar">
                            <i class="fa fa-plus"></i>
                        </button>
                   </div>        		
            	</div>
            	<div class="card-body">
            		<div class="table-responsive">
                	<table id="consulta" class="table">
                		<thead>
                			<tr>
                				<th>Id</th>
                                <th>Estado</th>
                				<th>Usuario</th>
                                <th>Email</th>
                                <th>Roles</th>
                				<th>Acciones</th>
                			</tr>
                		</thead>
                	</table>                
                    </div>
                </div>        		
            </div>            
        </div>
    </div>
</div>

<!--  Modal Agregar/Actualizar-->
<form id="registro" autocomplete="off">     
        <div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <!-- Agregar el token de seguridad   -->
                     @csrf

                    <!--  Input para poder pasar los valores cuando se agregen o se actualicen los datos   -->
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="ruta" class="ruta">
                    <input type="hidden" name="type" class="type">

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="name form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="password-confirm form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                    <div class="form-group row">
                        <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                          
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mesoncajero" class="col-md-4 col-form-label text-md-right">{{ __('Mesoncajero') }}</label>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="mesoncajero" value="mesoncajero">                      
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="meson" class="col-md-4 col-form-label text-md-right">{{ __('Meson') }}</label>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="meson" value="meson">                          
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="cajero" class="col-md-4 col-form-label text-md-right">{{ __('Cajero') }}</label>   
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="cajero" value="cajero">
                          
                        </div>
                    </div>    


                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                    
                  </div>
                </div>
            </div>
        </div>

</form>

<!-- Aca estan las funciones para cargar el formulario -->
<script>    
    function loadData(){
        $(document).ready(function(){
                $('#consulta').DataTable({

                    //Destroy, permite simpre cargar la tabla actualizada, para evitar cuando se eliminen registro se muestren en la tabla despues de eliminarse
                    destroy:true,

                    //language esta accion permite la traduccion de errores en ingles dejarlos en español, el archivo se encuentra en Public\js\spanish.json y es configurable
                    language:{

                        url:'{{asset('js/spanish.json') }}'
                    },

                    //esta accion muestra la tabla que se envio en el controlador
                    ajax:{
                        //envio la tabla en formato con ajax por el modelo descargado de datatable
                        url:'{{ route('usuario_mantenimiento.index') }}',
                        type:'GET'
                    },

                    columns:[

                   //aca definimos los botones de actualizar y eliminar
                         //esta es la informacion que se muestra en el formulario de la BD
                        {data:'id'},
                        {data:'enabled'},
                        {data:'name'},
                        {data:'email'}, 
                        {data:'roles'},                       

                                                
                        {data:null,render:function(data){
                            return `
                                <button
                                 data-id="${data.id}" class="btn btn-primary btn-sm btn-actualizar">
                                    <i class="fa fa-pencil" ></i>
                                </button>

                                <button data-id="${data.id}" class="btn btn-danger btn-sm btn-eliminar">
                                    <i class="fa fa-trash"> </i>

                                </button >

                            `;
                        }},    

                        
                    ]
                });
        });
    }

//permite cargar los datos de la BD en la pagina cada vez que ingresemos, carga los datos de la funcion loadData que esta arriba.
loadData();

//Cargar Modal general, esta es la base del formulario agregar, actualizar
$(document).on('click','.btn-agregar', function(){

        //dejar sin valores el registro antes de mostrarlo
        $('#registro')[0].reset();

        //desbloquear el codigo
        //$('.codigo').removeAttr('readonly','');          

         //cuando cargamos el modal, modificamos la ruta y el type
        $('.ruta').val('{{ route('usuario_mantenimiento.agregar') }}');
        $('.type').val('POST');       

        //Modifico el titulo del modal antes de mostrarlo cuando se carga, para que sea personalizable
        $('.btn-submit').html('Agregar');
        $('.modal-title').html('Agregar Usuario');

        //mostrar el modal al hacer click en el boton
        $('#modal-registro').modal('show');

    });

//Modal agregar
$(document).on('submit', '#registro', function(e){       

        //obtener todos los registros del formulario
        parametros = $(this).serialize();

        //con estas variables traemos los datos de formulario para pasarlo
        ruta = $('.ruta').val();
        type = $('.type').val();        

        $.ajax({
            url:ruta,
            type:type,
            data:parametros,
            dataType:'JSON',
            beforeSend:function(){
                Swal.fire({
                    title:'Cargando',
                    text:'Espere un momento...',
                    imageUrl:'{{ asset('img/loader.gif') }}',
                    showConfirmButton:false
                });
            },
            success:function(data){

                $('#modal-registro').modal('hide');

                loadData();

                Swal.fire({
                    title   :data.title,
                    text    :data.text,
                    icon    :data.icon,
                    timer   :3000,
                    showConfirmButton:false
                });
            }
        }); 
        e.preventDefault();

});

//Cargar Modal Actualizar
$(document).on('click','.btn-actualizar', function(){

        //dejar sin valores el registro antes de mostrarlo
        $('#registro')[0].reset(); 

        //bloquear el codigo
        //$('.codigo').attr('readonly','');

        //este valor se obtiene del formulario en el boton editar existe data-id="$data.id" que es la que obtiene el id de la BD
        id = $(this).data('id');

        //cuando cargamos el modal, modificamos la ruta y el type             
        $('.id').val(id);                      
        $('.ruta').val('{{ route('usuario_mantenimiento.actualizar') }}');
        $('.type').val('PUT');

        $.ajax({

            //aca traemos el registro para actualizar y mostrarlo en la tabla, por eso se agrega la ruta consultar
            url: '{{ route('usuario_mantenimiento.consultar') }}',
            type: 'GET',
            data:{'id':id},
            dataType:'JSON',
            success:function(data){

            //cargar valores de la tabla en el formulario para actualizar
            $('.id').val(data.id);
            $('.enabled').val(data.enabled);
            $('.name').val(data.name);
            $('.email').val(data.email);
            $('.roles').val(data.roles);
           

            }
        });             

        $('.btn-submit').html('Actualizar');
        $('.modal-title').html('Actualizar Servicio');        
        $('#modal-registro').modal('show');

    });

//Cargar Alerta eliminar
$(document).on('click','.btn-eliminar', function(){

     //guardar la variable id del sistema   
     id = $(this).data('id');
        Swal.fire({
                  title: 'Estas seguro?',
                  text: "El registro se eliminara permanentemente!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Estoy seguro'
        }).then((result) => {
                  if (result.value) {
                  
                  //Ajax para mostrar el gif de loader(carga) public/img/loader.gif
                  $.ajax({
                            url:'{{  route('servicio_mantenimiento.eliminar')}}',
                            type:'DELETE',
                            data:{'id':id, '_token':'{{ csrf_token() }}'},
                            dataType: 'JSON',
                            beforSend:function(){

                                Swal.fire({
                                    title:'Cargando',
                                    text:'Espere un momento...',
                                    imageUrl:'{{ asset('img/loader.gif') }}',                   
                                    showConfirmButton:false,                                    
                                });
                            },
                            success:function(data){
                                loadData();
                                   Swal.fire({
                                        title:data.title,
                                        text: data.text,
                                        icon: data.icon,
                                        timer: data.timer,
                                        showConfirmButton: false,
                                    });
                            },

                        });
                  }
        });
    });

</script> 
@endsection