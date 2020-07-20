$('.popup img').show();
$('.popup').css( 'cursor', 'hand' );

$('.popup').click(function(){$(this).css('zIndex', -1);$(this).animate({top:-110},100, 'linear', function(){$(this).animate({top:0},500, 'linear', function(){$(this).remove()})}); return false;});

$('summary hgroup + p a').click(function(){ 'return false;' } );