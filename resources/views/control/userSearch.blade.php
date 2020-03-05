@extends('dashboard.layouts.master')

    @section('title') User Search @endsection

    @section('content-header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Users <small> Search</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Search</li>
            </ol>
        </section>
    @endSection

    @section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users</h3>
                            <div id="loader">checking ... <img src="\images/loaders/ajax-horizontal-loader.gif"> ......</div>
                                <div class="box-tools">
                                    <div class="has-feedback">
                                        <input type="text" id="name" name="name" class="form-control input-sm" placeholder="Enter name or email .......">
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    </div>
                                </div>
                                <!-- /.box-tools -->
                                <!--span class="pull-right"> &nbsp;&nbsp;&nbsp;<a href="{{-- route('admin.transaction.search.index') --}}" class="btn btn-flat btn-info pull-right">Search</a></span></h3-->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <br/>
                                    <table id="result" class="table table-hover">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endSection

    @section('scripts')
        <!-- DataTables -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready( () =>{
                $('#loader').hide();
                $("#name").keyup(() => {
                    $('.result_row').remove();
                    let user = $('#name').val();

                    if(user.length > 3){
                        $('#loader').show();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') } });

                        $.ajax({
                            type : 'POST',
                            url  : '{{ route("admin.users.search") }}',
                            data : { user : user },
                            success : (response) => {
                                $('#loader').hide();
                                response.forEach((data,index) => {
                                    $('#result').append(`<tr class="result_row"><th scope="row" class="pull-right col-sm-2">${index+1}</th><td><a href="/control/user/${data.id}">${data.email}</a></td><td>--</td><td><a href="/control/user/${data.id}">${data.name}</a></td> </tr>`);
                                });
                            }
                        });

                        return false;
                    }else{
                        $('#loader').hide();
                        $("#result").html('');
                    }
                });
            });
        </script>
    @endSection
