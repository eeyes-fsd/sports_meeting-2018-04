(function   ()  {
    $('.time-body').hide();
    $('#d14').on('click',function(){
        $('#con_14').css({'padding':'24'});
        $(this).addClass('active');
        $('#day14').removeClass('hidden').addClass('show');
        $('#day15').removeClass('show').addClass('hidden');
        $('#d15').removeClass('active');
    })
    $('#d15').on('click',function(){
        $('#con_14').css({'padding':'0'});
        $(this).addClass('active');
        $('#day15').removeClass('hidden').addClass('show');
        $('#day14').removeClass('show').addClass('hidden');
        $('#d14').removeClass('active');
    })
    $('#modal-rank').on('click',function(){
        console.log('a')
        $(this).addClass('active');
        $('#rank-section').removeClass('hidden').addClass('show');
        $('#vote-section').removeClass('show').addClass('hidden');
        $('#vote-rank').removeClass('active');
    })
    $('#vote-rank').on('click',function(){
        console.log('b')
        $(this).addClass('active');
        $('#vote-section').removeClass('hidden').addClass('show');
        $('#rank-section').removeClass('show').addClass('hidden');
        $('#modal-rank').removeClass('active');
    })
    $('.time-title').on('click',function(){
        if($(this).prev().css('transform') == 'matrix(6.12323e-17, 1, -1, 6.12323e-17, 0, 0)'){
            $(this).prev().css({
                'transform':'rotate(0)',
                '-webkit-transform':'rotate(0)',
            })
        }else{
            $(this).prev().css({
                'transform':'rotate(90deg)',
                '-webkit-transform':'rotate(90deg)',
            })
        }
        console.log( $(this).prev().css('transform'));
        $(this).next().toggle();
    })
})();