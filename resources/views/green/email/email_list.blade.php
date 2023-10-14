@foreach($data as $item)
<div class="email_list">
    <a href="{{ route('mobile.email.info', ['id' => $item['id']]) }}">
        <img src="/mobile/green/images/email_ico.png" />
        <div class="email_xx1"></div>
        <div class="email_xx2"></div>
        <div class="email_wk">
            <div class="email_w">Receba sua recompensa</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/jb.png" />
                {{$item['attach'][1] ?? 0}} 
                </div>
                <div class="email_w_right">{{$item['timestamp']}}</div>
            </div>
        </div>
        @if($item['hasread'] == 0)
        <div class="email_hd"></div>
        @endif
    </a>
</div>
@endforeach  
