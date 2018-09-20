(function( $ ) {

  // *** var declarations ***
  // l = length 
  // w = width
  // a = area
  // c = cost/sqin
  // tc = total cost

  $(document).ready(function() {
    
    $('#length, #width, #quantity').keyup(keyup);

    function keyup() {
      bothHaveValues();
    }

    function bothHaveValues() {
      if ($('#length').val() != '' && $('#width').val() != '' && $('#quantity').val() != '') {  
        var l = $('#length').val();
        var w = $('#width').val();
        var q = $('#quantity').val();
        // if(l > 125 || w > 17) {
        //   if (l > 125) {
        //     l = 125;
        //     $('#length').val(l);
        //   }
        //   if(w > 17) {
        //     w = 17;
        //     $('#width').val(w);
        //   }
        // }
        Calculate(l, w, q);
      }
    }
    
    function Calculate(l, w, q) {
      length = Number(l);
      width = Number(w);
      quantity = Number(q);
      var a = (length + .25) * (width + .25) * (quantity/144);
      var c = 0.13 * Math.pow(a, -0.134);
      var cps = c.toFixed(2);
      var each = (c * length * width);
      var tc = (each * quantity);
      var price = "$" + cps + "/sqin";
      $('#area').html((length * width).toFixed(2));
      $('#totalarea').html((length * width * quantity).toFixed(2));
      $('#cost').html((tc).toFixed(2));
      $('.price').html(price);
      $('#hidden_field').val(tc);
      if (tc < 25) {
        $("#hidden_paragraph").removeClass( "dg_hidden" );
      }
      if (tc > 25) {
        $("#hidden_paragraph").addClass( "dg_hidden" );
      }
    }

  });

})( jQuery );