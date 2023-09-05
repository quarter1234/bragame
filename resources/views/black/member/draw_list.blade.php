@foreach($data as $item)
<div class="rechare_list">
    
        <img src="../../mobile/blue/images/dd_ico.png" />
        <div class="email_xx1"></div>
        <div class="email_xx2"></div>
        <div class="email_wk">
            <div class="email_w">{{ $item['orderid'] }}</div>
            <div class="rechare_zt">{{ $item['format_status'] }}</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
                <img src="../../mobile/img/jb.png" />
               {{$item['real_amount'] ?? 0}}  
               {{-- 金币：{{$item['coin'] ?? 0}}  --}} 
              
                </div>
                <div class="email_w_right">{{$item['format_create_time']}}</div>
            </div>
        </div>
       <div class="rechare_button copy_btn"  data-clipboard-text="{{ $item['orderid'] }}">Cópia</div> 
</div>
@endforeach  