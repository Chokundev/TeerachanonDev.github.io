//MAP TOOLTIPS SCRIPT
var tooltipNum = ['#nova-scotia', '#new-brunswick']

$(tooltipNum).qtip({
  content: function() {
    return $( this ).data('tooltip'); //store data in data-tooltip
    },
  position: {
    my: 'bottom center',  // Position my top left...
    at: 'top center', // at the bottom right of...
    adjust: {
            y: 10
        }
  },
  style: {
    tip: {
    corner: true,
    corner: 'bottom center',
    border: 1,
    width: 15,
    height: 7
    }
  }
});

var tooltipNum2 = ['#british-columbia', '#alberta', '#saskatchewan', '#manitoba', '#ontario', '#quebec']

$(tooltipNum2).qtip({
  content: function() {
    return $( this ).data('tooltip'); //store data in data-tooltip
    },
  position: {
    my: 'bottom center',  // Position my top left...
    at: 'top center', // at the bottom right of...
    adjust: {
            y: 30
        }
  },
  style: {
    tip: {
    corner: true,
    border: 1,
    width: 15,
    height: 7
    }
  }
});