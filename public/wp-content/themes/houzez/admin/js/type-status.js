// function ActionModal(){}
// ActionModal.prototype = {
//   init:function () {
//     var _self = this;
//     _self.onClick();
//     _self.validate();
//     _self.formSubmit();
//   },
//   onClick: function () {
//     var _this = this;
//     $('.btn-edit').click(function () {
//       var value = $(this).parents('.getData').data('title');
//       var id = $(this).parents('.getData').data('id');
//       var action = $(this).parent().data('action');
//       _this.eventEdit(value, id, action);
//     });
//     $('.btn-delete').click(function () {
//       var id = $(this).parents('.getData').data('id');
//       var action = $(this).parent().data('action');
//       _this.eventDelete(id, action)
//     })
//   },
//   validate: function () {
//     $("#update_edit_modal, #create_type").validate({
//       rules: {
//         title: "required",
//       },
//       messages: {
//         title: "",
//       }
//     })
//   },
//   formSubmit: function () {
//     $('#update_edit_modal').submit(function (event) {
//       event.preventDefault();
//       if ($("#update_edit_modal").valid()) {
//         var url = $('#update_edit_modal').attr('action');
//         var id = $('#_id').val();
//         var value =  $('#title_text').val();
//         $.ajax({
//           url: url,
//           type: "POST",
//           dataType: 'JSON',
//           data: $('#update_edit_modal').serialize(),
//           success: function(res)
//           {
//             if (res.status) {
//               $('#' + id).find('.title_content').text(value);
//               $('#' + id).find('.getData').data('title', value);
//               $('.modal').modal('hide');
//               $('#title_text').val('');
//             }
//           },
//           error: function (res) {
//             console.log(res);
//           }
//         });
//       }
//     });
//   },
//   eventEdit: function (value, id, action) {
//     $('#title_text').val(value);
//     $('#_id').val(id);
//     $('#update_edit_modal').attr('action', action)
//   },
//   eventDelete: function (id, action) {
//     $('.accept_confirm').click(function () {
//       $.ajax({
//         url: action,
//         type: "POST",
//         dataType: 'JSON',
//         data: {id:id},
//         success: function(res)
//         {
//           if (res.status) {
//             $('#' + id).remove();
//             $('.modal').modal('hide');
//           }
//         },
//         error: function (res) {
//           console.log(res);
//         }
//       });
//     })
//   }
// }

$('.btn-edit').click(function () {
  var value = $(this).parents('.getData').data('title');
  var id = $(this).parents('.getData').data('id');
  var action = $(this).parent().data('action');
  $('#title_text').val(value);
  $('#_id').val(id);
  $('#update_edit_modal').attr('action', action)
})
$("#update_edit_modal, #create_type").validate({
  rules: {
    title: "required",
  },
  messages: {
    title: "",
  }
});
$('#update_edit_modal').submit(function (event) {
  event.preventDefault();
  if ($("#update_edit_modal").valid()) {
    var url = $('#update_edit_modal').attr('action');
    var id = $('#_id').val();
    var value =  $('#title_text').val();
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'JSON',
      data: $('#update_edit_modal').serialize(),
      success: function(res)
      {
        if (res.status) {
          $('#' + id).find('.title_content').text(value);
          $('#' + id).find('.getData').data('title', value);
          $('.modal').modal('hide');
          $('#title_text').val('');
        }
      },
      error: function (res) {
        console.log(res);
      }
    });
  }
});
$('.btn-delete').click(function () {
  var id = $(this).parents('.getData').data('id');
  var action = $(this).parent().data('action');
  deleteConfirm(id, action)
})
function deleteConfirm(id, action) {
  $('.accept_confirm').click(function () {
    $.ajax({
      url: action,
      type: "POST",
      dataType: 'JSON',
      data: {id:id},
      success: function(res)
      {
        console.log(res)
        if (res.status) {
          $('#' + id).remove();
          $('.modal').modal('hide');
        }
      },
      error: function (res) {
        console.log(res);
      }
    });
  })
}
