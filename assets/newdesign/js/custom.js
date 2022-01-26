$(document).ready(function(){
    $(".Polaris-TopBar__NavigationIcon").click(function(){
      $(".Polaris-Frame__Navigation").addClass("Polaris-Frame__Navigation--visible Polaris-Frame__Navigation--enterActive");
    });
    $(".Polaris-Frame__NavigationDismiss").click(function(){
        $(".Polaris-Frame__Navigation").removeClass("Polaris-Frame__Navigation--visible Polaris-Frame__Navigation--enterActive");
      });
  });

/*Add Room Modal js*/
$(document).ready(function(){
    $('.create-tier-btn').click(function(event) {
        $('.add-room-modal').show();
        $('.add-room-overlay').show();
    });
    $('.modal-close-btn').click(function(event) {
        $('.add-room-modal').hide();
        $('.add-room-overlay').hide();
    });

});

$(document).ready(function(){
    $('.edit-tier').click(function(event) {
        $('.tier-modal').show();
        $('.add-room-overlay').show();
    });
    $('.modal-close-btn').click(function(event) {
        $('.tier-modal').hide();
        $('.add-room-overlay').hide();
    });

});



