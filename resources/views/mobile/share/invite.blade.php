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
    <h2>{{$user['coin']}}</h2>
    <div class="xk_but">
    <button style="background-color:#334d5d;">comissão{{--佣金--}}</button>
    <button style="background-color:#0a9bc6;">levantamento{{--提取--}}</button>
    </div>
    <p></p>
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