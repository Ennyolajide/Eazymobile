@extends('dashboard.layouts.master')

    @section('title')Data Topup @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    @endSection

    @section('content-header')
        <section class="content-header">
            <h1>Buy Data</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="active">Data</li>
            </ol>
        </section>
    @endsection

    @section('content')
        <!-- Main content -->
        <section class="content" id="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-purple">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buy Data</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <section class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                        @include('dashboard.layouts.errors')
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <br/>
                                                <img v-if="networkImage" v-bind:src="networkImage" style="height: 60px; width:50px; margin-right:5px;" class="img-responsive pull-right">
                                            </div>
                                        </div>
                                        <form id="data-purchase-form" class="form-horizontal form-prevent-multiple-submits" action="{{ route('data.buy') }}" method="post">
                                            @csrf
                                            <br/>
                                            <div class="form-group" id="choose-wallet-type">
                                                <label for="inputWallet" class="col-sm-2 col-xs-12 control-label">Network</label>

                                                <div class="col-sm-10 col-xs-12 ">
                                                    <select class="form-control"  v-model="dataPlans"  v-on:change="showPlans">
                                                        <option value="" disabled>Select network Type</option>
                                                        <option v-for="network in networks" v-bind:value="network">
                                                            ${ network[0].network.toUpperCase() }
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br/>
                                            <div id="other-fields">
                                                <div class="form-group" id="data-plan">
                                                    <label class="col-sm-2 col-xs-12 control-label" >Choose data plan</label>
                                                    <div class="col-sm-10 col-xs-12  form-grouping">
                                                        <select class="form-control" name="plan" v-model="dataPlan">
                                                            <option value="" disabled>Choose a data plan</option>
                                                            <option v-for="dataPlan in dataPlans" v-bind:value="dataPlan.id">
                                                                ${ dataPlan.volume } = ₦ ${ dataPlan.amount }
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-12 control-label">Phone Number</label>
                                                    <div class="col-sm-10 col-xs-12 form-grouping">
                                                        <input type="text" class="form-control" name="phone" placeholder="Please Eneter Phone Number">
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="form-group">
                                                    <div class="col-x-12">
                                                        <button  class="btn bg-primary btn-rounded btn-flat pull-right button-prevent-multiple-submits">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- .box-footer -->
                    @include('dashboard.layouts.box-footer')
                    <!-- /.box-footer -->
                </div>
            </div>
            <!-- /.box -->
        </section>
    @endSection

    @section('scripts')
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#mtnImage,#airtelImage,#gloImage,#9mobileImage').hide();

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-grouping')
                            .removeClass('has-error');
                    }
                });

                $('#data-purchase-form').validate({
                    rules: {
                        phone: {
                            required: true,
                            number: true
                        },
                        plan: {
                            required: true,
                        }
                    },
                    messages: {
                        phone: {
                            required: "Please enter phone number.",
                            number:  "Phone numbers only "
                        },
                        plan: {
                            required: "Please select a dataplan",
                        }

                    }
                });

            });

            new Vue({
                delimiters: ['${', '}'],
                el : '#content',
                data : {
                    dataPlan : '',
                    dataPlans : '',
                    networkImage : false,
                    networks: @json($networks),
                },
                methods : {
                    showPlans : function () {
                        if(this.dataPlans.length > 0){
                            if(this.dataPlans[0].network == '9mobile Gifting') {
                                this.networkImage = '/images/networks/9mobile.png';
                            }else{
                                this.networkImage = `/images/networks/${this.dataPlans[0].network.toLowerCase()}.png`;
                                //console.log(this.networkImage);
                            }
                        }
                    },


                }

            });

        </script>
    @endSection
