@extends('layouts.stack') 

@section('title')
    عرض المقدمات
@endsection
 
@section('content')
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cpanel-add-moqdma') }}">
                        <button type="button" class="btn btn-primary">اضافة مقدمة</button>
                    </a> 
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>

                 <div class="card-body  card-dashboard">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                              <th>اسم المقدمة</th>
                              <th>اسم الشيخ</th>
                              <th>الرابط</th>
                              <th>ظهور</th>
                              <th>خيارات</th>
                            </tr>
                        </thead>
                        <tbody> 
                           @foreach ($moqdmat as $moqdma)
                            <tr>
                                <td>{{ $moqdma->name }}</td>
                                <td>{{ $moqdma->sheikh->name }}</td>
                                <td><input class="form-control" type="text" name="" value="{{ url($moqdma->path) }}"></td>
                                <td><i class="font-large-1 {{ ($moqdma->active) ? 'fa fa-eye success darken-1 ' : 'fa fa-eye-slash red accent-4' }}" ></i></td>
                                <td> 
                                    <form id="delete" method="POST" action="{{ route('cpanel-delete-moqdma',[$moqdma->id]) }}" accept-charset="UTF-8">
                                        <a href="{{ route('cpanel-edit-moqdma',[$moqdma->id]) }}">
                                             <i class="fa fa-pencil-square-o font-large-1 cyan" title='Edit'></i>
                                        </a> 
                                        {{method_field('DELETE')}} {{ csrf_field() }}
                                        <i class="fa fa-times-circle-o  font-large-1 red lighten-1  pl-1  cursor-pointer " title='Delete' onclick="$('#delete').submit();"></i>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                        <tfoot>
                            <tr>
                              <th>اسم المقدمة</th>
                              <th>اسم الشيخ</th>
                              <th>الرابط</th>
                              <th>ظهور</th>
                              <th>خيارات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
 

@section('page_vendor_js')
    <script src="{{ URL('/temp_dashboard/app-assets/vendors/js/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/temp_dashboard/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
@endsection

@section('page_level_js')
    <script src="{{ URL('/temp_dashboard/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection
