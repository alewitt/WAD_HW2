// $(document).ready(function(){
//   var data = 'ready=true';
//   $.ajax({
//     url: "db_access.php",
//     data: data,
//     type: "GET",
//     dataType: "json",
//     success: function(json){
//       var count = 1;
//       var num_selections = json.num_selections;
//       while(count <= num_selections){
//         var formEl = $('#joshForm');
//         var fieldEl = $('#selectionField');
//         var inputEl = $(document.createElement("input"));
//         var labelEl = $(document.createElement("label"));
//         formEl.append(fieldEl);
//         fieldEl.append(labelEl);
//         labelEl.attr("class", "radio");
//
//         labelEl.append(inputEl);
//         inputEl.attr("type", "radio");
//         inputEl.attr("name", "joshMood");
//         inputEl.attr("value", count);
//
//         labelEl.append(json.names[count-1]);
//
//         // if(count !== 5){
//         //   var br = $(document.createElement("br"));
//         //   formEl.append(br);
//         // }
//         count += 1;
//       }
//     },
//     error: function(xhr,status,error){
//       alert("AJAX onload failed" + error);
//     },
//     complete: function(xhr, status){
//       //done
//     },
//     cache: false
//   }).done( function(){
//
//     $('#joshForm input').on('change', function(){
//       var chosen = $('input[name=joshMood]:checked', '#joshForm').val();
//       var data = 'joshMood=' + chosen;
//
//       $.ajax({
//         url: "gather.php",
//         data: data,
//         type: "GET",
//         dataType: "json",
//         success: function(json){
//           var imgEl = $('img');
//           if(imgEl.length === 0){
//             imgEl = $(document.createElement("img"));
//             imgEl.insertAfter('#joshForm');
//             imgEl.attr("class", "col-md-6 picture");
//           }
//           imgEl.attr("src", json.image);
//         },
//         error: function(xhr, status, error){
//           alert("AJAX onchange failed" + error);
//         },
//         complete: function(xhr, status){
//           //done
//         },
//         cache: false
//       });
//     });
//
//   });
// });

$('#joshForm input').on('change', function(){
  var chosen = $('input[name=joshMood]:checked', '#joshForm').val();
  var data = 'joshMood=' + chosen;

  $.ajax({
    url: "gather.php",
    data: data,
    type: "GET",
    dataType: "json",
    success: function(json){
      var imgEl = $('img');
      if(imgEl.length === 0){
        imgEl = $(document.createElement("img"));
        imgEl.insertAfter('#joshForm');
        imgEl.attr("class", "col-md-6 picture");
      }
      imgEl.attr("src", json.image);
    },
    error: function(xhr, status, error){
      alert("AJAX onchange failed" + error);
    },
    complete: function(xhr, status){
      //done
    },
    cache: false
  });
});
