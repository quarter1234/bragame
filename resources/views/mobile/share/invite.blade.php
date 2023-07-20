<div class="xk">
    <p>Link{{--分享的链接--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$link}}" id="demoInput" />
        <button id="btn"><img src="../../mobile/img/fz.png" /></button>
    </div>
    <p>O código de convite{{--邀请码--}}</p>
    <div class="xk_t">
        <input type="text" value="{{$user['code']}}" id="demoInput2" />
        <button id="btn2"><img src="../../mobile/img/fz.png" /></button>
    </div>
</div>
<div class="xk_b">
    <p>Clique no botão de link de compartilhamento para obter um link de compartilhamento de jogo para um amigo, e o jogador da conta de registro de amigos obtém o número de agentes de compartilhamento.Jogadores de recarga de amigos podem obter certas recompensas e compartilhar mais recompensas.</p>
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