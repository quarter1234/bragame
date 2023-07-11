<div class="xk">
    <p>分享的链接</p>
    <div class="xk_t">
        <input type="text" value="{{$link}}" id="demoInput" />
        <button id="btn"><img src="../../mobile/img/fz.png" /></button>
    </div>
    <p>邀请码</p>
    <div class="xk_t">
        <input type="text" value="{{$user['code']}}" />
        <button><img src="../../mobile/img/fz.png" /></button>
    </div>
</div>
<div class="xk_b">
    <h2>{{$user['coin']}}</h2>
    <div class="xk_but">
    <button style="background-color:#334d5d;">佣金</button>
    <button style="background-color:#007aff;">提取</button>
    </div>
    <p></p>
</div>

<script>
    const btn = document.querySelector('#btn');
btn.addEventListener('click', () => {
	const input = document.querySelector('#demoInput');
	input.select();
	if (document.execCommand('copy')) {
		document.execCommand('copy');
		console.log(document.execCommand('copy'));
	}
})
</script>