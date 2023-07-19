@foreach($data as $item)
<div class="rechare_list">
    
        <img src="../../mobile/img/email_ico.png" />
        <div class="email_xx1"></div>
        <div class="email_xx2"></div>
        <div class="email_wk">
            <div class="email_w">{{ $item['orderid'] }}</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
                <img src="../../mobile/img/jb.png" />
                {{$item['count'] ?? 0}}  {{ $item['status'] }}
                </div>
                <div class="email_w_right">{{$item['create_time']}}</div>
            </div>
        </div>
        <div class="email_hd"></div>
 
</div>
@endforeach  