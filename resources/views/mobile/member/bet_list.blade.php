@foreach($data as $item)
<div class="rechare_list">
    
        <img src="../../mobile/img/dd_ico.png" />
        <div class="email_xx1"></div>
        <div class="email_xx2"></div>
        <div class="email_wk">
            <div class="email_w">{{ $item['bet_id'] }}</div>
            <div class="rechare_zt">{{ $item['bet_amount'] }}</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
                <img src="../../mobile/img/jb.png" />
               {{$item['settled_amount'] ?? 0}}  
               {{-- 金币：{{$item['format_platform'] ?? 0}}  --}} 
               {{-- {{$item['settled_amount']}}  --}} 
              
                </div>
                <div class="email_w_right">{{$item['format_create_time']}}</div>
            </div>
        </div>
       <div class="rechare_button copy_btn"  data-clipboard-text="{{ $item['bet_id'] }}">Cópia</div> 
</div>
@endforeach  