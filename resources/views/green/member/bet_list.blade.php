@foreach($data as $item)
<div class="rechare_list">
        <div class="email_wk" style="width:330px;">
            <div class="email_w" style="width:277px;">{{ $item['bet_id'] }}</div>
            <div class="rechare_zt">Montante da aposta: {{ $item['bet_amount'] }}</div>
            <div class="email_w_bottom">
                <div class="email_w_left">
                <img src="https://wwv.condebet.com/bx_4/public/mobile/img/jb.png" />
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