<div class="game_list">
    @foreach($favorRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach      
    </div>