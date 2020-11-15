$(document).ready(function(){ 
 
    var count = 0;
   
    $('#barang_dialog').dialog({
     autoOpen:false,
     width:400
    });
   
    $('#add').click(function(){
     $('#barang_dialog').dialog('option', 'title', 'Add Data');
     $('#barang_id').val('');
     $('#jumlah_permintaan').val('');
     $('#error_barang_id').text('');
     $('#error_jumlah_permintaan').text('');
     $('#barang_id').css('border-color', '');
     $('#jumlah_permintaan').css('border-color', '');
     $('#save').text('Save');
     $('#barang_dialog').dialog('open');
    });
   
    $('#save').click(function(){
     var error_barang_id = '';
     var error_jumlah_permintaan = '';
     var barang_id = '';
     var jumlah_permintaan = '';
     if($('#barang_id').val() == '')
     {
      error_barang_id = 'Jenis barang perlu dipilih';
      $('#error_barang_id').text(error_barang_id);
      $('#barang_id').css('border-color', '#cc0000');
      barang_id = '';
     }
     else
     {
      error_barang_id = '';
      $('#error_barang_id').text(error_barang_id);
      $('#barang_id').css('border-color', '');
      barang_id = $('#barang_id').val();
     } 
     if($('#jumlah_permintaan').val() == '')
     {
      error_jumlah_permintaan = 'Jumlah permintaan perlu diisi';
      $('#error_jumlah_permintaan').text(error_jumlah_permintaan);
      $('#jumlah_permintaan').css('border-color', '#cc0000');
      jumlah_permintaan = '';
     }
     else
     {
      error_jumlah_permintaan = '';
      $('#error_jumlah_permintaan').text(error_jumlah_permintaan);
      $('#jumlah_permintaan').css('border-color', '');
      jumlah_permintaan = $('#jumlah_permintaan').val();
     }
     if(error_barang_id != '' || error_jumlah_permintaan != '')
     {
      return false;
     }
     else
     {
      if($('#save').text() == 'Save')
      {
       count = count + 1;
       output = '<tr id="row_'+count+'">';
       output += '<td>'+barang_id+' <input type="hidden" name="hidden_barang_id[]" id="barang_id'+count+'" class="barang_id" value="'+barang_id+'" /></td>';
       output += '<td>'+jumlah_permintaan+' <input type="hidden" name="hidden_jumlah_permintaan[]" id="jumlah_permintaan'+count+'" value="'+jumlah_permintaan+'" /></td>';
       output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
       output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
       output += '</tr>';
       $('#data_barang').append(output);
      }
      else
      {
       var row_id = $('#hidden_row_id').val();
       output = '<td>'+barang_id+' <input type="hidden" name="hidden_barang_id[]" id="barang_id'+row_id+'" class="barang_id" value="'+barang_id+'" /></td>';
       output += '<td>'+jumlah_permintaan+' <input type="hidden" name="hidden_jumlah_permintaan[]" id="jumlah_permintaan'+row_id+'" value="'+jumlah_permintaan+'" /></td>';
       output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
       output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
       $('#row_'+row_id+'').html(output);
      }
   
      $('#barang_dialog').dialog('close');
     }
    });
   
    $(document).on('click', '.view_details', function(){
     var row_id = $(this).attr("id");
     var barang_id = $('#barang_id'+row_id+'').val();
     var jumlah_permintaan = $('#jumlah_permintaan'+row_id+'').val();
     $('#barang_id').val(barang_id);
     $('#jumlah_permintaan').val(jumlah_permintaan);
     $('#save').text('Edit');
     $('#hidden_row_id').val(row_id);
     $('#barang_dialog').dialog('option', 'title', 'Edit Data');
     $('#barang_dialog').dialog('open');
    });
   
    $(document).on('click', '.remove_details', function(){
     var row_id = $(this).attr("id");
     if(confirm("Are you sure you want to remove this row data?"))
     {
      $('#row_'+row_id+'').remove();
     }
     else
     {
      return false;
     }
    });
   
    $('#action_alert').dialog({
     autoOpen:false
    });
   
    $('#barang_form').on('submit', function(event){
     event.preventDefault();
     var count_data = 0;
     $('.barang_id').each(function(){
      count_data = count_data + 1;
     });
     if(count_data > 0)
     {
      var form_data = $(this).serialize();
      $.ajax({
       url:"<?= base_url('user/tambahPermintaanBarang'); ?>",
       method:"POST",
       data:form_data,
       success:function(data)
       {
         console.log(data); 
        $('#data_barang').find("tr:gt(0)").remove();
        $('#action_alert').html('<p>Data Inserted Successfully</p>');
        $('#action_alert').dialog('open');
       }
      })
     }
     else
     {
      $('#action_alert').html('<p>Please Add atleast one data</p>');
      $('#action_alert').dialog('open');
     }
    });
    
   });  