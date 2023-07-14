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
            <div class="times_fl">
                <span class="b1"></span>
                <div class="text">Meus dados do agente  </div>
                <label></label>
            </div>
            <div class="times_sh">
                <table>
                    <thead>
                        <tr>
                            <td>Número</td>
                            <td>Valor do código</td>
                            <td>Recarga total</td>
                            <td>Carga inicial</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $item['oneGradeInviteNum'] + $item['twoGradeInviteNum'] }}</td>
                        <td>{{ $item['oneTbetcoin'] + $item['twoTbetcoin'] }}</td>
                        <td>{{ $item['oneRechargeAmount'] + $item['twoRechargeAmount'] }}</td>
                        <td>{{ $item['oneFirstRecharge'] + $item['twoFirstRecharge'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="times_fl">
                <span class="b2"></span>
                <div class="text">Agente nível 1</div>
                <label></label>
            </div>
            <div class="times_sh">
                    <table>
                    <thead>
                        <tr>
                            <td>Número</td>
                            <td>Valor do código</td>
                            <td>Recarga total</td>
                            <td>Carga inicial</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['oneGradeInviteNum'] }}</td>
                            <td>{{ $item['oneTbetcoin'] }}</td>
                            <td>{{ $item['oneRechargeAmount'] }}</td>
                            <td>{{ $item['oneFirstRecharge'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="times_fl">
                <span class="b3"></span>
                <div class="text">Agente nível 2</div>
                <label></label>
            </div>
            <div class="times_sh">
                <table>
                    <thead>
                        <tr>
                        <td>Número</td>
                        <td>Valor do código</td>
                        <td>Recarga total</td>
                        <td>Carga inicial</td>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['twoGradeInviteNum'] }}</td>
                        <td>{{ $item['twoTbetcoin'] }}</td>
                        <td>{{ $item['twoRechargeAmount'] }}</td>
                        <td>{{ $item['twoFirstRecharge'] }}</td>
                    </tr>
                </tbody>
            </table>
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