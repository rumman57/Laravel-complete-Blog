(function(){
   
 var form  = document.getElementsByTagName('form')[0];
 var url = form.getAttribute("action");
 var _token = document.getElementsByTagName('input')[0].value;
 var result = document.getElementById('search_result');
 var search1="";
 var page=1;

/*$('#search').keyup(function() {
    //document.write(url);
     var search = $(this).val();
     //var search = document.getElementsByTagName('input')[1].value;
     if(search!=""){
      search1 = search;
       load_data(page,search);
     }
  });*/


  $('form').submit(function(e) {
     e.preventDefault();
    //document.write(url);
    // var search = $(this).val();
     var search = document.getElementsByTagName('input')[1].value;
     if(search!=""){
      search1 = search;
       load_data(page,search);
     }
  });


 function load_data(page,search){
     $.ajax({
         url: url,
         method:"POST",
         data:{
              search:search,
              page:page,
              _token:_token
         },
         success: function(data){
            result.innerHTML = data;
         }
  })
}

 /*****  Pagination Link Function Start  *******/
// $(document).on('click','.paginate',function(){ 
 /////   var page = $(this).attr("id");
 ///   load_data(page,search1);
 //});
  /*****  Pagination Link Function End  *******/


  /*****  Pagination Link Function Start  *******/
  $(document).on( "click", ".ac a", function (e){
    e.preventDefault();
    var page = $(this).attr("data-page"); 
    load_data(page,search1);
  });
  /*****  Pagination Link Function End  *******/
 
})();