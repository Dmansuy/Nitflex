$('.conteneur-mas').imagesLoaded( { background: '.item' }, function() {
    $('.conteneur-mas').masonry({
        horizontalOrder: true,
        fitWidth: true,
        itemSelector: '.Unfilm'
    });
});