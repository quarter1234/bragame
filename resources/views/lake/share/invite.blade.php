<div class="xk">
    <p data-locale="Sharelink">Compartilhe o link{{--分享的链接--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$link}}" id="demoInput" />
        <button id="btn"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/fz.png" /></button>
    </div>
    {{--<p style="padding-top:10px;">O código de convite</p>--}}
    {{--<div class="xk_t">
        <input type="text" value="{{$user['code']}}" id="demoInput2" />
        <button id="btn2"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/fz.png" /></button>
    </div>--}}
</div>
<div class="xk_b">
    <h2><span><label></label></span>Bônus de convite</h2>
    <p style="border-bottom:1px solid rgba(255,255,255,.1); padding-bottom:5px">Bônus atual por novo membro：<span>R$10</span></p>
    <p>Para cada membro que você convidar, você receberá R$ <span>10.00</span>&nbsp;&nbsp;a&nbsp;&nbsp;<span>20.00</span> ao completar um depósito igual ou superior a R$ 20.Ao</p>
    <p>convidar mais novos membros para se juntarem à equipe, você poderá receber bônus de convite adicionais de membros até dois níveis abaixo</p>
    <p><img src="/mobile/lake/images/agent-relation-c804b4ec.png" /></p>
    <table>
        <thead>
           <tr>
                <td rowspan="2">Nivel</td>
                <td rowspan="2">Número do depósito</td>
                <td colspan="3">Comissbes de Primeiro Depositos</td>
           </tr>
           <tr>
                <td>Primeiro</td>
                <td>Segundo</td>
                <td>Terceiro</td>
           </tr>
    </thead>
           <tr>
                <td><img src="/mobile/lake/images/level-one-e2a0e6af (1).png" /></td>
                <td>0</td>
                <td>10</td>
                <td>0</td>
                <td>0</td>
           </tr>
           <tr>
                <td><img src="/mobile/lake/images/level-two-cb45bb36 (1).png" /></td>
                <td>79+</td>
                <td>13</td>
                <td>3</td>
                <td>0</td>
           </tr>
           <tr>
                <td><img src="/mobile/lake/images/level-three-82829089 (1).png" /></td>
                <td>899+</td>
                <td>15</td>
                <td>3</td>
                <td>1</td>
           </tr>
           <tr>
                <td><img src="/mobile/lake/images/level-four-e2e963fc (1).png" /></td>
                <td>7999+</td>
                <td>17</td>
                <td>3</td>
                <td>1</td>
           </tr>
           <tr>
                <td><img src="/mobile/lake/images/level-five-b93b8b4f_1.png" /></td>
                <td>39999+</td>
                <td>20</td>
                <td>3</td>
                <td>1</td>
           </tr>
    </table>  
</div>

<div class="yh_top">
<div class="yh_t_list">
            <h2>{{ $invite['one_grade_count'] }}</h2>
            <p><img src="/mobile/lake/images/d_l1.png" />{{--一级邀请--}}</p>
        </div>
        <div class="yh_t_list">
            <h2>{{ $invite['two_grade_count'] }}</h2>
            <p><img src="/mobile/lake/images/d_l2.png" />{{--二级邀请--}}</p>
        </div>
       
</div>

{{--loading组件--}}
@include('lake.common.loading')

<script>
    const btn = document.querySelector('#btn');
    const btn2 = document.querySelector('#btn2');
btn.addEventListener('click', () => {
	const input = document.querySelector('#demoInput');
	input.select();
	if (document.execCommand('copy')) {
		document.execCommand('copy');
		console.log(document.execCommand('copy'));
	}
})
// btn2.addEventListener('click', () => {
// 	const input = document.querySelector('#demoInput2');
// 	input.select();
// 	if (document.execCommand('copy')) {
// 		document.execCommand('copy');
// 		console.log(document.execCommand('copy'));
// 	}
// })
function loadInvites() {
        let page = $('#invite_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/share/invites')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#invite_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                    let item = '<tr><td>'+element.descendant.playername+'</td><td>'+element.ancestor_h+'</td><td>'+element.descendant.create_time+'</td></tr>';
                  $('#tab3_content_invites').append(item)
                })
              }
          })
    }
    
    $(document).ready(function() {
        loadInvites();  
    })
</script>