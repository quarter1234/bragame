@foreach($data as $item)
<div class="email_list">
<<<<<<< HEAD
    <a href="{{ route('mobile.email.info', ['id' => $item['id']]) }}">
        <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/email_ico.png" />
=======
    <a href="{{ route('brling.email.info', ['id' => $item['id']]) }}">
        <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/img/email_ico.png" />
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
        <div class="email_xx1"></div>
        <div class="email_xx2"></div>
        <div class="email_wk">
            <div class="email_w">Receba sua recompensa</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
<<<<<<< HEAD
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/jb.png" />
=======
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/img/jb.png" />
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
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
