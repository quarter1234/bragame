<div class="xk">
    <p>Link{{--分享的链接--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$link}}" id="demoInput" />
        <button id="btn"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/fz.png" /></button>
    </div>
    {{--<p style="padding-top:10px;">O código de convite</p>--}}
    {{--<div class="xk_t">
        <input type="text" value="{{$user['code']}}" id="demoInput2" />
        <button id="btn2"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/fz.png" /></button>
    </div>--}}
</div>
<div class="xk_b">
    <img src="/mobile/black/images/share_bottom.png" />
    <p>1. Link de convite Copie seu link de recomendação na interface de compartilhamento principal e compartilhe-o, para que os membros registrados se tornem seus agentes diretos e os membros de nível inferior que eles convidarem sejam considerados membros de sua equipe</p>
    <p>2. Recomende que mais jogadores interajam juntos, convide jogadores maiores de 18 anos.</p>    
</div>

<div class="yh_top">
<div class="yh_t_list">
            <h2>{{ $invite['one_grade_count'] }}</h2>
            <p><img src="/mobile/red/images/grzx.png" />{{--一级邀请--}}</p>
        </div>
        <div class="yh_t_list">
            <h2>{{ $invite['two_grade_count'] }}</h2>
            <p><img src="/mobile/red/images/yqhy.png" />{{--二级邀请--}}</p>
        </div>
       
</div>

{{--loading组件--}}
@include('red.common.loading')

<div class="yh_table">
    <table>
        <thead>
        <tr>
            <td>prenome</td>
            <td>série</td>
            <td>tempo</td>
        </tr>
        </thead>
        <tbody id="tab3_content_invites">
        </tbody>
    </table>
    
    <div style="width:100%;text-align:center;margin-top:1rem">
        <button id="invite_load_more" page="0" onclick="loadInvites()"  style="color:#fff; font-size:14px;padding: 5px 10px;background:rgba(0, 0, 0, .2);border-radius: 5px;font-size: 14px;">{{--点击加载更多--}}Carregue mais</button>
    </div>

</div>
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