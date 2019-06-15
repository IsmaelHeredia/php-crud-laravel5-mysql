@extends('layouts.layout_admin')
@section('content')

<script type="text/javascript">
  $(function () {
      $('#grafico1').highcharts({
          chart: {
              type: 'bar'
          },
          title: {
              text: 'Reporte de productos y sus precios'
          },
          xAxis: {
              categories: {!! $textos_grafico1 !!},
              title: {
              text: 'Productos'
              }
          },
                  
          yAxis: {
              min: 0,
              title: {
                  text: 'Precios',
                  align: 'high'
              },
              labels: {
                  overflow: 'justify'
              }
          },
          tooltip: {
          useHTML: true,
          formatter: function() {
              return '<b>Precio : </b>$'+this.point.y;
          }},
          plotOptions: {
          
          series: {
              dataLabels:{
                  //enabled:true,
              },events: {
                  legendItemClick: function () {
                          return false; 
                  }
              }
          }
            },
          legend: {
              reversed: true
          },
          credits: {
              enabled: false
          },
          series: [{
          name:'Precios',
          data: {!! $series_grafico1 !!}
      }]
      });
      $('#grafico2').highcharts({
          chart: {
              type: 'bar'
          },
          title: {
              text: 'Reporte de cantidad de productos por proveedores'
          },
          xAxis: {
              categories: {!! $textos_grafico2 !!},
              title: {
              text: 'Empresas'
              }
          },
                  
          yAxis: {
              min: 0,
              title: {
                  text: 'Productos',
                  align: 'high'
              },
              labels: {
                  overflow: 'justify'
              }
          },
          tooltip: {
          useHTML: true,
          formatter: function() {
              return '<b>Cantidad de productos : </b>'+this.point.y;
          }},
          plotOptions: {
          
          series: {
              dataLabels:{
                  //enabled:true,
              },events: {
                  legendItemClick: function () {
                          return false; 
                  }
              }
          }
            },
          legend: {
              reversed: true
          },
          credits: {
              enabled: false
          },
          series: [{
          name:'Productos',
          data: {!! $series_grafico2 !!}
        }]
      });
  });
</script> 

<h1 class="text-center">Estadísticas</h1>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Productos encontrados : {{ $cantidad_productos }}</div>
    <div class="card-body">
      <div class="card-block">
        <table class="table">
         <thead>
           <th scope="col">Nombre</th>
           <th scope="col">Descripción</th>
           <th scope="col">Precio</th>
           <th scope="col">Proveedor</th>
           <th scope="col">Fecha registro</th>
         </thead>
           <tbody>
            @if($productos->count())  
            @foreach($productos as $producto)  
            <tr>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->descripcion}}</td>
              <td>{{$producto->precio}}</td>
              <td>{{$producto->proveedor->nombre}}</td>
              <td>{{date('d/m/Y', strtotime($producto->fecha_registro))}}</td>
             </tr>
             @endforeach 
             @else
             <tr>
              <td colspan="8">No hay registros !!</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
</div>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Gráfico 1</div>
    <div class="card-body">
    <div id="grafico1" style="width: 800px; height: 400px;"></div>
  </div>
</div>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Gráfico 2</div>
    <div class="card-body">
    <div id="grafico2" style="width: 800px; height: 400px;"></div>
  </div>
</div>

 
@endsection