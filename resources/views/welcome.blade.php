@extends('layouts.app1')
@section('content')
    @include('elements/imageleaf')

    @include('ele_box_money')
    @include('challen_sleep_early')
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="card ">
                <div class="card-header">
                    Money
                </div>
                <div class="card-body">
                    <div id="wrap-money"></div>
                </div>
            </div>
        </div>


        <div class="col-md-6 pb-3">
            <div class="card ">
                <div class="card-header">
                    Star
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer text-muted">
                    ???
                </div>
            </div>
        </div>
    </div>



    <div class="ele-money d-none">
        <div class="ele_desc"></div>
        <div class="ele_value font-weight-bold"></div>
        <div class="ele_date"></div>
        <hr>
    </div>


    <hr>
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Thêm tiền</h4>
                </div>
                <div class="modal-body">
                    <h4>Number</h4>
                    <input class="form-control mount" type="number">
                    <h4>Description</h4>
                    <input class="form-control desc" type="text">
                    <h4>Password</h4>
                    <input class="form-control password" type="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-save">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <button class="btn btn-primary" id="add">Add money</button>

@endsection
@section('headerContent')
    <style>
        .soam {
            color: red;
        }

        .soduong {
            color: #0e7300;
        }
    </style>
@endsection

@section('footerContent')
    <script>

        $('button#add').click(() => {
            $("#modal-1").modal('show');
            $('.mount').focusin();
        })

        $('.mount').keyup((e) => {
            if (e.which == 13) {
                $('.submit-save').click();
            }
        });

        $('.submit-save').click(() => {
            saveMoney();
        })

        var elem = $('.ele-money');
        var trelem = $('.tr-ele-money');
        refreshDB();

        function saveMoney() {
            if($(".password").val() !== '321') return;
            let m = $('.mount').val();
            let desc = $('.desc').val();
            $.post('/api/money', {"value": m, "desc": desc, "type": "add"}, (data) => {
                $("#modal-1").modal('hide');
                refreshDB();
            });

        }

        function refreshDB() {
            $('.mount').val('');
            $('.desc').val('');
            $.get('/api/money', function (data) {
                let wrap_money = $("#wrap-money");
                wrap_money.html('');
                $("#table-wrap").html('');
                let total = 0;
                $.each(data, function (k, v) {
                    let el = elem.clone();
                    let trel = trelem.clone();
                    total += parseFloat(v.value);
                    let ele_value = el.find('.ele_value');
                    let ele_date = el.find('.ele_date');
                    let ele_desc = el.find('.ele_desc');

                    trel.find('.td-date').html(v.created_at);
                    trel.find('.td-desc').html(v.desc);
                    trel.find('.td-value').html(v.value_formated);
                    el.attr('title', v.created_at);
                    ele_date.html(v.created_at);
                    if (v.value < 0) {
                        ele_value.addClass('soam');
                        trel.find('.td-value').addClass('soam');
                    } else {
                        ele_value.addClass('soduong');
                        trel.find('.td-value').addClass('soduong');
                    }
                    ele_value.html(v.value_formated)
                    ele_desc.html(v.desc)
                    el.removeClass('d-none');
                    trel.removeClass('d-none');
                    wrap_money.prepend(el);
                    $("#table-wrap").prepend(trel);
                })
                $('.wrap-total').html(total);

            })
        }
        refreshChallege();
        function refreshChallege(){
            $.get('/api/challenge/1',(data)=>{
                $('#challenge-1') .html('');
                for(i=0;i<data.value;i++){
                    $('#challenge-1').append('<td>✅</td>')
                }
                for(i=0;i<7-data.value;i++){
                    $('#challenge-1').append('<td>⬜</td>')
                }
                $("#input-challenge").val('');
            })
        }

        // $("#input-challenge").
        $("#input-challenge").keyup((e) => {
            if (e.which == 13) {
                $.ajax({
                    url: '/api/challenge/1',
                    data:{"value":$("#input-challenge").val()},
                    type: 'PUT',
                    success: (response) =>{
                        refreshChallege();
                    }
                });
            }
        });
    </script>
@endsection
