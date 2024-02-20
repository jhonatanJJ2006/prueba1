(function() {

    const player = document.querySelector('#player');
    const playerContenedor = document.querySelector('.player__contenedor');

    if(player.classList.contains('vjs-error')) {
        playerContenedor.classList.add('player__disabled');

    } else {

        playerContenedor.classList.remove('player__disabled');
    }

})();