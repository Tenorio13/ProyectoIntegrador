@extends('layouts.app')

@section('title','Geo Plastic')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.cart")
@include("dashboard.order")
@include("dashboard.messages")


@section('content')

    <div class="section container">
      <h2 class="title text-center"> ¡Hola amig@, {{ Auth::user()->name }}! Ventas Administrador </h2>

      <hr>
      
      @if (session('notification'))
      <div class="alert alert-success text-center">
          {{ session('notification') }}
      </div>
  @endif
  <button type="submit" rel="tooltip" title="Grafica" class="btn btn-success "data-toggle="modal" data-target="#gradicaModal">
                     VENTAS
                  </button>

 
    <div class="modal-body">
    <div class="table-responsive">
      <table class="table">
          <thead>
              <tr>
                <th>Folio</th>
                <th>Fecha_compra </th>
                <th>Producto</th>
                <th>Precio </th>
                <th>Cantidad </th>

                <th>Status</th>
                <th>Subtotal </th>
                <th>#usuario </th>
                <th>Cancelar</th>
              </tr>
          </thead>
          

            

                             
                  @foreach( $compras as $ventas)
                  <tr>

                    <td class="col-md-4">{{ $ventas->code }}</td>
                    <td class="col-md-4">{{ $ventas->order_date }}</td>
                    <td class="col-md-4">{{ $ventas->name }}</td>
                    <td class="col-md-4">&dollar;{{ $ventas->precio }}</td>
                    <td class="col-md-4">{{ $ventas->cantidad }}</td>
                    <td class="col-md-4">{{ $ventas->status }}</td>

                    <td class="col-md-4">&dollar;{{ $ventas->total }}</td>
                    <td class="col-md-4">{{ $ventas->user_id }}</td>

                    
                    
                    <td class="td-actions text-right col-md-4">
                   <form method="POST"  action="{{ url('/order'.$ventas->id.'') }}" >

                   {{ csrf_field() }} 
                    {{ method_field('DELETE') }}

                    
                    
                    
                      
                    <button type="submit" rel="tooltip" title="Cancelar venta" class="btn btn-danger btn-fab btn-fab-mini btn-round"data-toggle="modal" data-target="#confirmModal">
                      <i class="fa fa-times"></i>
                  </button>

                   

                    </form>
                  </center>
                 
                </td>
              </tr>
              <div class="center-block">
                {{ $compras->links("pagination::bootstrap-4") }}
              </div>
                  @endforeach
              

                  
                
          </tbody>
         
          
      </table>
  </div>
  
  


  
         
</div>
</div>

  





 


<!-- Modal Confirm delete -->


      <div class="modal fade bd-example-modal-lg" id="gradicaModal" tabindex="-1" role="dialog" aria-labelledby="gradicaModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
          <center>
            
  
                            
                            
                                  
                                  <span class=" p-b-34 p-t-27">
                                    <h2 class="text-center title">Grafica</h2>
  
                                </span>
                
                             
                         
              <center>
       

              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             
   
              <script type="text/javascript" src="graficas/googlechart.js"></script>

<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

          ['Mes', 'Ventas'],
      @php
      $totalVentasMensuales = 0;
      @endphp
      @foreach ($compras as $pastel)
        @php
        $totalVentasMensuales += $pastel->total;
        @endphp
        ['{{ $pastel->created_at }}', {{ $pastel->total }}],
      @endforeach

            

        ]);

        var options = {
 width: 800,
          height: 600,
          
 
          title: 'Ventas mensuales'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

      }
    </script>
 
 <div id="piechart" ></div>
 
          
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
         </div>
     </div>
   </div> 
  

<!-- Modal Confirm delete -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Esta seguro que desea eliminar este pedido?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ url('/order') }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection

