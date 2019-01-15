  function block(id,hasRestriction){

      $.ajax({   
                   type:'POST',  
                   url:"/customer/unfollow",
                   crossDomain: true,
                   data:
                      {
                        id:id,
                        hasRestriction:hasRestriction,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                   dataType:"json",
                     success :function(response) {
                      console.log(response);

                      },
                      error: function(e) {
                        console.log(e.responseText);
                      } 
      });
      window.location.reload();
  }


  function follow(customer,blogger){

      $("#follow").hide();
      $("#following").show();
      $.ajax({   
                   type:'POST',  
                   url:"/salesperson/follow",
                   crossDomain: true,
                   data:
                      {
                        customer:customer,
                        blogger:blogger,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                   dataType:"json",
                     success :function(response) {
                        
                      },
                      error: function(e) {
                        console.log(e.responseText);
                      } 
      });

  }

  function unfollow(customer,blogger){

      $("#following").hide();
      $("#follow").show();
      $.ajax({   
                   type:'POST',  
                   url:"/salesperson/unfollow",
                   crossDomain: true,
                   data:
                      {
                        customer:customer,
                        blogger:blogger,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                   dataType:"json",
                     success :function(response) {
                        
                      },
                      error: function(e) {
                        console.log(e.responseText);
                      } 
      });

  }  
