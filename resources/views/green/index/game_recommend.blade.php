<div style="text-align:center;">
    <div class="game_qb_title">
        <div class="game_qb_left">
            <span class="game_ico"></span>Original
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(9)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里 喜欢的--}}
    <div class="game_list rm">
    @foreach($favorRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach      
    </div>
    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            <span class="pp_game"></span>Jackpost
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(2)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里 PG--}}
    <div class="game_list">
    @foreach($pgRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>
    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            <span class="pg_game"></span>slotc
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(1)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_list">
    @foreach($ppRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>

    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            <span class="pg_game"></span>live
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(3)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_list">
    @foreach($getTadaRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>
</div>