@extends('layouts.stack')

@section('title')
    اضافة شيخ
@endsection
 

@section('content') 
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="card-header">
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
                    <form class="form-horizontal" method="POST" action="{{ route('cpanel-store-sheikh') }}">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-12 mb-1">
                                    <fieldset class="form-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">اسم الشيخ</label>
                                        <input type="text" class="form-control" id="name" name="name" required autofocus>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                                    <fieldset class="form-group form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="name">ترجمة الشيخ</label> 
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </fieldset>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 mb-1"> 
                                	<button type="submit" class="btn btn-primary">اضافة <i class="ft-thumbs-up position-right"></i></button>
                                    
                                    <button type="reset" class="btn btn-warning">تفريغ <i class="ft-refresh-cw position-right"></i></button>
                                    </fieldset>
                                </div>
                            </div> 

                        </div>   
                        {{ csrf_field() }}
                    </form> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

 