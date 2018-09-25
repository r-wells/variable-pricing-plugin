(function( $ ) {

  // *** var declarations ***
  // l = length 
  // w = width
  // a = area
  // c = cost/sqin
  // tc = total cost

  $(document).ready(function() {
    
    $('#length, #width, #quantity, #pics').keyup(keyup);

    function keyup() {
      bothHaveValues();
    }

    function bothHaveValues() {
      if ($('#length').val() != '' && $('#width').val() != '' && $('#quantity').val() != '') {  
        var l = $('#length').val();
        var w = $('#width').val();
        var q = $('#quantity').val();
        var p = $('#pics').val();
        //Sets min value for l & w
        if(l > 125 || w > 17) {
          if (l > 125) {
            l = 125;
            $('#length').val(l);
            $('#max_length').removeClass('dg_hidden');
          }
          if(w > 17) {
            $('#max_width').removeClass("dg_hidden");
            w = 17;
            $('#width').val(w);
          }
        }
        //Keeps min l, w & q at > 0
        if(l < 0 || w < 0 || q < 0) {
          if (l < 0) {
            l = 0;
            $('#length').val(l);
          }
          if(w < 0) {
            w = 0;
            $('#width').val(w);
          }
          if(q < 0) {
            q = 0;
            $('#quantity').val(q);
          }
        }
        Calculate(l, w, q, p);
      }
      //Sets values back to zero if user deletes input values
      if ($('#length').val() == '' || $('#width').val() == '' || $('#quantity').val() == '') {
        $('#area').html((0).toFixed(2));
        $('#totalarea').html((0).toFixed(2));
        $('#cost').html((0).toFixed(2));
        $('.price').html("$" + (0).toFixed(2) + "/sq in");
        $('#hidden_field').val(0);
        $('#costpertransfer').html((0).toFixed(2));
      }
    }
    
    function Calculate(l, w, q, p) {
      //sets string to number
      length = Number(l);
      width = Number(w);
      quantity = Number(q);
      pics = Number(p);
      var a = (length + .25) * (width + .25) * (quantity/144);
      var c = 0.13 * Math.pow(a, -0.134);
      var cps = c.toFixed(2);
      var each = (c * length * width);
      var tc = (each * quantity) + (quantity * pics * 0.15);
      var price = "$" + cps + "/sq in";
      $('#area').html((length * width).toFixed(2));
      $('#totalarea').html((length * width * quantity).toFixed(2));
      $('#cost').html((tc).toFixed(2));
      $('#costpertransfer').html((tc/quantity).toFixed(2))
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