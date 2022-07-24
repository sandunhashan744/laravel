$(document).ready(function () {
  
  loadCard(); 

    $('.cartbtn').click(function (e) {
      e.preventDefault();

      var pname = $(this).closest('.maintst').find('.proName').html();
      var pid = $(this).closest('.maintst').find('.pro_id').val();
      var pcat = $(this).closest('.maintst').find('.pro_cat').val();
      var psubcat = $(this).closest('.maintst').find('.pro_subcat').val();
       

      var prodSize = $(this).closest('.maintst').find('#proSize').val();
      var prodQty = $(this).closest('.maintst').find('.Proqty').val();
      

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
          'pname':pname,
          'pid':pid,
          'pcat':pcat,
          'psubcat':psubcat,
          'prodSize':prodSize,
          'prodQty':prodQty,

        },
        success: function(response){
          loadCard();
          swal(response.status);
        }
      })
    });

    // for delete product form the cart
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

       var proId = $(this).closest('.cart-item-delete').find('.productId').val();
               
        $.ajax({
          method: "POST",
          url: "/delete-to-cart",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {
            'proId':proId,
          },
          success: function(response){
            window.location.reload();
            swal(response.status);
          }
        }) 
    });
        
    //increment and decrement buttons
    $('.increment-btn').click(function (e) {
          e.preventDefault();
  
        var incre = $(this).closest('.pro-qty-in-de').find('.qty-input').val(); 
        var Valu=parseInt(incre,10);
        Valu=isNaN(Valu) ? 0 : Valu;
         
         if(Valu < 10){
          Valu++;
          $(this).closest('.pro-qty-in-de').find('.qty-input').val(Valu);
        }        
    });
//-------------------------------------------------------
    $('.decrement-btn').click(function (e) {
      e.preventDefault();

      var decre = $(this).closest('.pro-qty-in-de').find('.qty-input').val();
      var Valu=parseInt(decre,10);

      Valu=isNaN(Valu) ? 0 : Valu;
      if(Valu > 1){  
        Valu--;
        $(this).closest('.pro-qty-in-de').find('.qty-input').val(Valu);
    }        
    });

    //Qty Change

    $('.qty-chan-btn').click(function (e) {
      e.preventDefault();

      var proid = $(this).closest('.proCart').find('.productId').val();  
      var proQty = $(this).closest('.proCart').find('.Proqty').val();
    
      $.ajax({
        method: "POST",
        url: "/update-cartTotPrice",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
          'proid':proid,
          'proQty':proQty,
        },
        success: function(response){
          window.location.reload();
          //swal(response.status);
        }
      }) ; 
          
    });

  function loadCard() {
    $.ajax({
      method: "GET",
      url: "/load-cart-data",   
      success: function(response){
        $('.cart-count').html('');
        $('.cart-count').html(response.count);
      }
    }); 
  }

  function totPrice(params) {

    var proQty = $(this).closest('.pro-qty-in-de').find('.qty-input').val();
    var produqty=parseInt(proQty);
    var proPri = $(this).closest('.cart-item-delete').find('.pro-price').val();
    var prodPrice=parseInt(proPri);

    var totPri = prodPrice * produqty;
    //alert(totPri);
    
    $('.totPriceqty').html('');
    $('.totPriceqty').html(totPri);
  }

  return});