@extends('layouts.app')

@section('content')



<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Pagar Servicio
                   <div class="float-left">
                        <button class="btn btn-primary btn-sm btn-check">
                            <i class="fa fa-plus"></i>
                        </button>

                   </div>               
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="consulta" class="table">

                        <thead>
                            <tr>
                                <th></th>
                                <th>N° Orden</th>
                                <th>Rut</th>
                                <th>Total</th>
                                <th>Estado</th>

                            </tr>
                        </thead>

                    </table>                
                    </div>
                </div>              
            </div>            
        </div>
    </div>
</div>


<form id="registro" autocomplete="off"> 

<!-- Modal -->
<div class="modal fade" id="modal-registro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <!--
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        -->
      </div>
      <div class="modal-body">
        <button class="btn btn-primary btn-pagar">Finalizar pago</button>

        @csrf
        
               

        <hr>

        <div class="table-responsive">
            
               <table id="consulta_check" class="table">
                    <thead>
                        <tr>                            
                            <th>N° Orden</th>
                            <th>Rut</th>
                            <th>Servicio</th>
                            <th>Valor</th> 
                            <th>Cantidad</th>
                            <th>Total</th>                             
                        </tr>
                    </thead>
                    <tfoot>
                            <tr>
                                <th colspan="5" style="text-align:right">Total:</th>
                                <th></th>
                            </tr>
                    </tfoot>
                </table>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-cancelar-pago" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>


</form>


<script>
    
function loadData(){ 

    $(document).ready(function(){           

        //Datatable
        table =  $('#consulta').DataTable({                

                destroy:true,
                bAutoWidth: false,

                //language esta accion permite la traduccion de errores en ingles dejarlos en español, el archivo se encuentra en Public\js\spanish.json y es configurable
                language:{

                    url:'{{asset('js/spanish.json') }}'
                },


                ajax:{

                    url:'{{ route('pagos.index') }}',
                    type:'GET'

                },
                columns:[

                    //{data:'id'},
                    {data:'numero_orden'}, //se agrega este dato para que pueda ser enviado por el checkbox                                    
                    {data:'numero_orden'},
                    {data:'rut_venta'},
                    {data:'total',render: $.fn.dataTable.render.number( '.', ',', 0, '$' )},                    
                    {data:'estado'},                    

                ],
                columnDefs:[

                    {

                    targets:0,
                        checkboxes:{
                         seletRow:true
                        }

                    }

                ],
                select:{

                style:'multi'
                },
                order:[[1,'asc']]

            });


 


        //CheckBox
        $(document).on('click','.btn-check',function(e){        
        

           var rows = table.column(0).checkboxes.selected();           


           var data = [];//Array que contendrá los elementos

            $.each(rows,function(index,rowId){

            //Agregar elementos al Array
            data.push(rowId);    


            });
            
            
            if(data.length>0){

                

                $.ajax({

                    url:'{{ route('pago.pago') }}',
                    type:'POST',
                    data:{'id_usuario':'{{ Auth::user()->id }}','_token':'{{ csrf_token() }}','items':data},
                    dataType:'JSON',
                    beforeSend:function(){


                        Swal.fire({

                            title:'Cargando Información',
                            text :'Espere un Momento...',
                            showConfirmButton:false


                        });


                    },
                    success:function(result){


                        Swal.fire({

                            title:'Servicio Cargado',
                            text :'Información Cargada',
                            icon :'success',
                            timer : 1000,
                            showConfirmButton:false


                        });

                         // data = JSON.parse(result);

                        $('#consulta_check').DataTable( {

                        data: result,
                        destroy:true,
                        bAutoWidth: false,

                        //language esta accion permite la traduccion de errores en ingles dejarlos en español, el archivo se encuentra en Public\js\spanish.json y es configurable
                        language:{

                            url:'{{asset('js/spanish.json') }}'
                        },

                        columns: [

                                {data:'numero_orden'}, 
                                {data:'rut_venta'},             
                                {data:'nombre_servicio'},
                                {data:'valor',render: $.fn.dataTable.render.number( '.', ',', 0, '$' )},
                                {data:'cantidad'},
                                {data:'total',render: $.fn.dataTable.render.number( '.', ',', 0, '$' )} 
                                

                        ],

                                //sumatoria

                                "footerCallback": function ( row, data, start, end, display ) {
                                var api = this.api(), data;
                     
                                // Remove the formatting to get integer data for summation
                                var intVal = function ( i ) {
                                    return typeof i === 'string' ?
                                        i.replace(/[\$,]/g, '')*1 :
                                        typeof i === 'number' ?
                                            i : 0;
                                };
                                 
                     
                                // Total over this page
                                pageTotal = api
                                    .column( 5, { page: 'current'} )
                                    .data()
                                    .reduce( function (a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0 );
                     
                                // Update footer
                                $( api.column( 5 ).footer() ).html(
                                    '$'+pageTotal 
                                );
                            }



                     //fin sumatoria


                        } );

                        

                        
                        $('.modal-title').html('Pago de servicios');
                        $('#modal-registro').modal('show');                   

                    }

                });


            }else{


                Swal.fire({

                    title:'Lista Vacia',
                    text :'No ha seleccionado ningún elemento',
                    icon :'warning',
                    timer:2000,
                    showConfirmButton:false


                });
            }
            

        });


        });



//pagar servicio final
$(document).on('click','.btn-pagar', function(e){

       

      $.ajax({


                    url:'{{ route('pago.finalizarpago') }}',
                    type:'PUT',
                    data:{'id_usuario':'{{ Auth::user()->id }}', '_token':'{{ csrf_token() }}'},
                    dataType:'JSON',
                    beforeSend:function(){


                        Swal.fire({

                            title:'Pagando servicio',
                            text :'Espere un Momento...',                            
                            showConfirmButton:true


                        });


                    },
                    success:function(data){

                        $('#modal-registro').modal('hide');


                        loadData();

                           Swal.fire({

                                title:data.title,
                                text :data.text,
                                icon :data.icon,
                                timer : 3000,
                                showConfirmButton:false


                        });



                    }




        });



        e.preventDefault();


             
              
        
        

    });    

    //cuando el usuario cierra ventana de pago
$(document).on('click','.btn-cancelar-pago', function(e){

    $.ajax({


                    url:'{{ route('pago.cancelarpago') }}',
                    type:'PUT',
                    data:{'id_usuario':'{{ Auth::user()->id }}', '_token':'{{ csrf_token() }}'},
                    dataType:'JSON'

        });

    $('#modal-registro').modal('hide');

    loadData();

});






    
    
};//ultimo cierre

loadData();





</script>











@endsection
