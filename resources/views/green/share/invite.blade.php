<div class="xk">
    <p>Link{{--分享的链接--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$link}}" id="demoInput" />
        <button id="btn"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/fz.png" /></button>
    </div>
    <p style="padding-top:10px;">O código de convite{{--邀请码--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$user['code']}}" id="demoInput2" />
        <button id="btn2"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/fz.png" /></button>
    </div>
</div>
<div class="xk_b">
    <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/share_bottom.png" />
    <p>1. Onde estd o link do meu convite? Na interface principal do compartilhamento, copie seu link deindicacao e compartilhe, os membros cadastrados dessa forma setornarao seus agentes diretos, e os membros de nivel inferior queeles convidarem sero considerados membros de sua equipe, eassim por diante, eles poderao se desenvolver infinitamente</p>
    <p>2. Onde posso consultar minha comissao? Na interface principal do compartilhamento, clique em “Referir”para visualizar os detalhes da comissao e receber a comissao.</p>    
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
btn2.addEventListener('click', () => {
	const input = document.querySelector('#demoInput2');
	input.select();
	if (document.execCommand('copy')) {
		document.execCommand('copy');
		console.log(document.execCommand('copy'));
	}
})
</script>