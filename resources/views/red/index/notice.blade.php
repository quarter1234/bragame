@if(Auth::check() && $indexNotice && $indexNotice['status'] == 1)
<div class="gg_db">
                    <div class="gg_tc">
                        <div class="gg_tc_title">
                            <span>noticias oficiais</span>
                            <label><a></a></label>
                        </div>
                        <div class="gg_tc_tit">
                            <h2>Primeiro deposito</h2>
                            <p>{{date('Y-m-d', $indexNotice['create_time'])}}</p>
                        </div>
                        <div class="gg_centen"><img src="{{$indexNotice['img']}}" />
                     
                        {!! $indexNotice['content'] !!}
                    </div>

                    </div>
            </div>
@endif
<script>
    function showNotice() {
        $('.gg_db').show()
    }
    $(function(){
        showNotice();
        $('.gg_tc a').click(function(){
            $('.gg_db').hide()
        })
    })
</script>            
