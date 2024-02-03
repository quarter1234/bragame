@foreach($data as $item)
<div class="rechare_list">
        {{-- <div class="email_w" style="width:150px;">{{ $item['id'] }}</div> --}}
        <div class="email_wk" style="width:330px;">
            <div class="rechare_zt">Montante da aposta: {{ $item['coins'] }}</div>
        </div>
        <div class="email_w_bottom xg">
                <div class="email_w_left">
                <img src="https://www.betbra.net:8032/bx_1/public/mobile/img/jb.png" />
               {{$item['coin'] ?? 0}}  
               {{-- 金币：{{$item['format_platform'] ?? 0}}  --}} 
               {{-- {{$item['settled_amount']}}  --}} 
              
                </div>
                <div class="email_w_right">{{$item['time']}}</div>
            </div>
       {{-- <div class="rechare_button copy_btn"  data-clipboard-text="{{ $item['bet_id'] }}">Cópia</div>  --}}
</div>
@endforeach  