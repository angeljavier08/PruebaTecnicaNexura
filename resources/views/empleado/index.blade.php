@extends('section.app')


@section('css')


<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

@section('title-content')
<strong>Empleados</strong>
@endsection

@section('title-actions')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-striped">
          <caption>Listado de Empleados</caption>

          <thead>
            <tr>
              <th scope="col"><i class="fa-fw fa fa-user" aria-hidden="true"></i> Nombre</th>
              <th scope="col"><i class="fa-fw fa fa-at" aria-hidden="true"></i>Email</th>
              <th scope="col"><i class="fa-fw fa fa-venus-mars" aria-hidden="true"></i>Sexo</th>
              <th scope="col"><i class="fa-fw fa fa-envelope" aria-hidden="true"></i>Boletín</th>
              <th scope="col"><i class="fa-fw fa fa-briefcase" aria-hidden="true"></i>Área</th>
              <th scope="col">Modificar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection



@section('script')


<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>


<script>
  $(document).ready(function() {
          listarTabla();
      });
      var listarTabla = function(){
          var table = $('#example1').DataTable({
              destroy: true,
              processing: true,
              serverSide: true,
              paging: true,
              searching: true,
              ordering: true,
              info: (screenWidth() > 720) ? true : false,
              lengthChange: (screenWidth() > 720) ? true : false,
              autoWidth: true,
              responsive: true,
              columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
              }],
              ajax: {
                    "type": "get",                    
                    "url": '{{ asset('api/empleados') }}',
                    "dataType": "json",
                    "contentType": 'application/json; charset=utf-8',
                    "data": "{'_token': '{{ csrf_token() }}'} "                      
              },
              columns: [
                  { data: 'nombres' },
                  { data: 'email' },
                  {
                        render: function (data, type, row) {
                                var sexo = '';
                                if(row.sexo == "M"){
                                  sexo = 'Masculino';
                                }
                                if(row.sexo == "F"){
                                  sexo = 'Femenino';
                                }
                                return sexo
                        }
                  },
                  {
                        render: function (data, type, row) {
                                var boletin = '';
                                if(row.boletin == "0"){
                                  boletin = 'No';
                                }
                                if(row.boletin == "1"){
                                  boletin = 'Si';
                                }
                                return boletin
                        }
                  },
                  { data: 'area' },
                  {
                         render: function (data, type, row) {
                          btn_ver = '<a title="modificar" href="{{url("empleados")}}/'+row.id+'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>'
                          return btn_ver 
                      }
                  },
                  {
                         render: function (data, type, row) {
                          btn_remove = '<a ="eliminar" href="'+row.id+'" class="btn btn-sm btn-danger remove"><i class="fa fa-trash"></i></a>'
                          return  btn_remove
                      }
                  }
              ],
              language: idioma_espanol,
              order: [[ 0, "desc" ]]

          });
      }

      var screenWidth = function () {
          return $(window).width();
      }

      var idioma_espanol = {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      }

      $("tbody").on("click", ".remove", function(e){
              e.preventDefault();
              var _token = $("input[name='_token']").val();
              data = {'_method': 'DELETE', '_token':_token},
              id_user = $(this).attr('href');
              Swal.fire({
                  title: "¿Seguro desea eliminar este empleado?",
                  text: "Esta opción será irreversible",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Si',
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'No'
              }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url: "{{url('empleados')}}/"+id_user,
                      type: 'POST',
                      datatype: 'json',
                      data:data,
                      success: function (respuesta) {
                          if (respuesta.success) {
                            Swal.fire(
                                'Borrado!',
                                'Ha sido eliminado con exito.',
                                'success'
                              )
                               $('#example1').DataTable().ajax.reload();
                          }
                      }
                  });
              }
              }).catch(function () {

              });



          });
</script>
@endsection