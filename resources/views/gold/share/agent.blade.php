<div class="times">
    <div class="times_list times_on">Today</div>
    <div class="times_list">Yesterday</div>
    <div class="times_list">Week</div>
    <div class="times_list">Month</div>
    <div class="times_list">Year</div>
</div>
<div class="times_xk">

    @foreach($agent as $key => $item)
    <div class="times_div" @unless($key != 'today') style="display:block;" @endunless>

            <div class="dl_conten">
                <div class="dl_title">
                    <span><img src="/mobile/black/images/dl1.png" /></span><span>Meus dados do agente</span> 
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/sz_ico.png" />
                        <span>Número</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneGradeInviteNum'] + $item['twoGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                        <span>Valor do código</span> 
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneTbetcoin'] + $item['twoTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/cq_ico.png" />
                        <span>Recarga total</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneRechargeAmount'] + $item['twoRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/cs_ico.png" />
                        <span>Carga inicial</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneFirstRecharge'] + $item['twoFirstRecharge'] }}</p></div>
                </div>
            </div>

            <div class="dl_conten">
                <div class="dl_title">
                    <span><img src="/mobile/black/images/dl1.png" /></span>Agente nível 1 
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/sz_ico.png" />
                        <span>Número</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                       <span> Valor do código</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cq_ico.png" />
                        <span>Recarga total</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cs_ico.png" />
                        <span>Carga inicial</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneFirstRecharge'] }}</p></div>
                </div>
            </div>

            <div class="dl_conten">
                <div class="dl_title">
                    <span><img src="/mobile/black/images/dl1.png" /></span>Agente nível 2
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/sz_ico.png" />
                        <span>Número</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                        <span>Valor do código</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cq_ico.png" />
                        <span>Recarga total</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cs_ico.png" />
                        <span>Carga inicial</span>
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoFirstRecharge'] }}</p></div>
                </div>
            </div>
    </div>
    @endforeach  

</div>

<script>
    $(function(){
        $('.times_fl').click(function(){
            $(this).next('.times_sh').toggle()
        })
    })
</script>