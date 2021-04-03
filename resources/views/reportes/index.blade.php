@extends('layouts.app')


@section('content')

<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reporte Ventas                                 
                </div>

                <form id="reporte_fecha" autocomplete="off">
                    <div class="form'group">
                        <label>Desde</label>
                        <input type="date" name="fecha_ini" class="fecha_ini" required />
                    </div>
                    <div class="form'group">
                        <label>Hasta</label>
                        <input type="date" name="fecha_fin" class="fecha_fin" required/>
                    </div>
                    
                    <div class="float-left">
                        <button type="submit" class="btn btn-primary btn-sm btn-search">
                            <i class="fa fa-search"> </i>
                        </button>
                   </div>
                    
                </form>

                

                <div class="card-body">
                    <div class="table-responsive">
                    <table id="consulta" class="table">
                        <thead>
                            <tr>
                                <th>N° orden</th>
                                <th>Rut Venta</th>
                                <th>Total</th> 
                                <th>Fecha Pago</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="2" style="text-align:right">Total:</th>
                                <th></th>
                            </tr>
                    </tfoot>
                    </table>                
                    </div>
                </div>              
            </div>            
        </div>
    </div>
</div>



<script> 
function loadData(fecha_ini, fecha_fin){
        $(document).ready(function(){
                $('#consulta').DataTable({
                    
                    destroy:true,

                    language:{

                        url:'{{asset('js/spanish.json') }}'
                    },

                    ajax:{
                        
                        url:'{{ route('reporte.busqueda') }}',
                        type:'GET',
                        data:{'fecha_ini':fecha_ini,'fecha_fin':fecha_fin}
                    },

                    //boton exportar a Excel, Pdf, Print
                    dom: 'Bfrtip',
                    buttons: [
                                'excel','pdf', 'print'
                        ], 
                    
                    columns:[                                    
                                {data:'numero_orden'},
                                {data:'rut_venta'},
                                {data:'total'},
                                //{data:'total',render: $.fn.dataTable.render.number( '.', ',', 1, '$' )},
                                {data:'fecha_pago'}
                                                          
        
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
                                    .column( 2, { page: 'current'} )
                                    .data()
                                    .reduce( function (a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0 );
                     
                                // Update footer
                                $( api.column( 2 ).footer() ).html(
                                    '$'+pageTotal 
                                );
                            }

                     //fin sumatoria





                });
        });
    }


  
  


$(document).on('submit', '#reporte_fecha', function(e){

        
        fecha_ini   = $('.fecha_ini').val();
        fecha_fin   = $('.fecha_fin').val();

         loadData(fecha_ini,fecha_fin);

       e.preventDefault();
      
    });



    


    


 
</script>





@endsection