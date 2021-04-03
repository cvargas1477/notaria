@extends('layouts.app')


@section('content')



<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Generar Servicio
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
                                <th>Servicio</th>
                                <th>Valor</th>
                                
                            </tr>
                        </thead>
                    </table>                
                    </div>
                </div>              
            </div>            
        </div>
    </div>
</div>


<!-- Modal Registro-->
<form id="registro" autocomplete="off">
    
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <button class="btn btn-primary">Grabar Servicio</button>

        @csrf
        

        <div class="from-group">                
            
            <table>
                <tr>
                    <th>
                        <label>Rut persona o empresa</label>
                    </th>
                    <th>
                        <input type="number" placeholder="Ej:12345678" name="rut_venta" class=" descripcion form-control" required />
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}" />   
                    </th>
                    <th>
                        
                    </th>

                </tr>
                

            </table> 
                     
              
        </div>             

        <hr>

        <div class="table-responsive">
            
               <table id="consulta_check" class="table">
                    <thead>
                        <tr>                            
                            <th>Servicio</th>
                            <th>Valor</th>
                            <th>Cantidad</th> 
                            <th>Total</th>

                                      
                        </tr>
                    </thead>
                    <tfoot>
                            <tr>
                                
                                <th colspan="3" style="text-align:right">Total:
                                    
                                    <input name="total_suma" class="suma_total" id="total_suma"  disabled/>
                                     
                                        

                                </th>                                


                                <th>                                                                



                                </th>
                            </tr>
                    </tfoot>
                </table>
            </div>

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

                    url:'{{ route('servicio.index') }}',
                    type:'GET'

                },
                columns:[

                    {data:'id'},
                    {data:'nombre_servicio'},
                    {data:'valor',render: $.fn.dataTable.render.number( '.', ',', 0, '$' )}
                    
                    

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



            }); //fin Datatable
        


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

                    url:'{{ route('servicio.envio') }}',
                    type:'POST',
                    data:{'_token':'{{ csrf_token() }}','items':data},
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
                                
                                {data:'nombre_servicio'},             
                                {data:'valor',render: $.fn.dataTable.render.number( '.', ',', 0, '$' )}, 
                                {data:null,render:function(data){

                                    return `
                                    <input type="hidden" name="id[]" value="${data.id}" />
                                    
                                     <input type="hidden" id="valor_${data.id}" class="monto" name="valor[]" value="${data.valor}"/>

                                    <input type="number" name="cantidad[]"  min="1"
                                            data-valor="${data.valor}"
                                            data-id="${data.id}" 
                                            class="check_item" 
                                            id="cantidad_${data.id}"
                                            value="${data.cantidad}"
                                            required
                                            />`;                           

                                }},                                
                                  
                                 {data:null,render:function(data){
                                    return `
                                            <input type="number" 
                                                    name="total" 
                                                    data-id="${data.id}"
                                                    valor_inicial="${data.valor}" 
                                                    class="suma_total" 
                                                    id="total_${data.id}" 
                                                    value="${data.valor}" disabled/>
                                            `;                                    
                                    }}

                                   


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
                                    .column( 1, { page: 'current'} )
                                    .data()
                                    .reduce( function (a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0 );
                     
                                // Update footer
                                $('#total_suma').val(
                                    pageTotal  
                                    
                                );


                            }

                     //fin sumatoria
                     
                          

                     });

                                     

                     

                        //Multiplicar cantidad por valor
                        $(document).on('change','.check_item',function(){

                              id         = $(this).data('id');
                              valor    = $(this).data('valor');

                              cantidad       = $('#cantidad_'+id).val();


                              multi        = valor * cantidad;


                                $('#total_'+id).val(multi);                               
                               

                             
                             //llamar a la funcion llamar para calcular la suma total por cada cambio de aumento de cantidad   
                             sumar();
                             
                             
                              
                                
                            });
                         
                        $('.modal-title').html('Registro de Datos');
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


    }

    loadData();
   
    

    function sumar(){        

        var total_suma=0;
        var suma=0;
         $('.suma_total').each(function() {
                
            
                  id         = $(this).data('id');
                  total_suma = Number($('#total_'+id).val());


                  if(!isNaN(total_suma) ) {
                           suma = Number(suma+total_suma);
                    }
                 

                 });


         $('#total_suma').val(suma);         



    }
        
   
                          

    //Registro
    $(document).on('submit','#registro',function(e){

        parametros = $(this).serialize();


        $.ajax({


                    url:'{{ route('servicio.registro') }}',
                    type:'POST',
                    data:parametros,
                    dataType:'JSON',
                    beforeSend:function(){


                        Swal.fire({

                            title:'Cargando Registro',
                            text :'Espere un Momento...',
                            showConfirmButton:false


                        });


                    },
                    success:function(data){

                        if(data.icon=='success'){


                            setInterval(function(){

                                location.reload();


                            },3000);


                        }


                         Swal.fire({

                            title:data.numero_orden,
                            text :data.text,                                                       
                            icon :data.icon,
                            timer : 3000,
                            showConfirmButton:false


                        });



                    }




        });



        e.preventDefault();
    });





</script>


@endsection
