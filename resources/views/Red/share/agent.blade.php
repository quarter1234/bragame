<div class="dropdown" id="times">
    <button class="dropbtn">Select Time Range</button>
    <div class="dropdown-content">
        <a href="#" onclick="selectTime('Today')">Today</a>
        <a href="#" onclick="selectTime('Yesterday')">Yesterday</a>
        <a href="#" onclick="selectTime('Week')">Week</a>
        <a href="#" onclick="selectTime('Month')">Month</a>
        <a href="#" onclick="selectTime('Year')">Year</a>
    </div>
 
<script>
     function selectTime(value) {
        document.getElementById("times").querySelector(".dropbtn").innerText = value;
        document.getElementById("times").querySelector(".dropdown-content").style.display = "none";
    }
</script>

</div>
<div class="times_xk">

    @foreach($agent as $key => $item)
    <div class="times_div" @unless($key != 'today') style="display:block;" @endunless>

            <div class="dl_conten">
                <div class="dl_title">
                    <span><img src="/mobile/black/images/dl1.png" /></span>Meus dados do agente 
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/sz_ico.png" />
                        Número
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneGradeInviteNum'] + $item['twoGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                        Valor do código
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneTbetcoin'] + $item['twoTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/cq_ico.png" />
                        Recarga total
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneRechargeAmount'] + $item['twoRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/cs_ico.png" />
                        Carga inicial
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
                        Número
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                        Valor do código
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cq_ico.png" />
                        Recarga total
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['oneRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cs_ico.png" />
                        Carga inicial
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
                        Número
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoGradeInviteNum'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                        <img src="/mobile/black/images/dm_ico.png" />
                        Valor do código
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoTbetcoin'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cq_ico.png" />
                        Recarga total
                    </div>
                    <div class="dl_list_coentn dl_wz_right"><p>{{ $item['twoRechargeAmount'] }}</p></div>
                </div>
                <div class="dl_conten_list">
                    <div class="dl_list_coentn">
                    <img src="/mobile/black/images/cs_ico.png" />
                        Carga inicial
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