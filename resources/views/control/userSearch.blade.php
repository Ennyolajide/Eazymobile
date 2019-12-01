@extends('dashboard.layouts.master')

    @section('title') User Search @endsection

    @section('content')
        <!-- Main content -->
        <div class="row small-spacing">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-content">
                    <h3 class="box-title">Users</h3>
                        <!-- /.box-header -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Search</label>
                                <div class="col-sm-7 col-xs-12">
                                    <input type="text" id="name" name="name" class="form-control pull-right" placeholder="Enter name or email ......."/>
                                    <br/>
                                    <div id="loader">checking ... <img src="\images/loaders/ajax-horizontal-loader.gif"> ......</div>
                                </div>
                                <br/>
                            </div>
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
