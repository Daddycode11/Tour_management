<div class="container py-4">

  <img src="assets/img/tourism logo.png" alt="Logo" class="mx-auto d-block" style="height: 100px;">

  <div class="card border-warning shadow-sm p-4" style="border: 2px dashed #b8860b; background: #fff8dc;">
    <h4 class="text-center mb-4" style="font-family: 'Georgia', serif; color: #6b3f27;">Booking Form</h4>
    <form action="" id="book-form">
      <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >

      <div class="form-group">
        <label for="schedule" class="font-weight-bold text-dark">Select Date</label>
        <input type="date" class="form-control" name="schedule" required>
      </div>

      <div class="form-group">
        <label for="time" class="font-weight-bold text-dark">Preferred Time</label>
        <input type="time" class="form-control" name="time" required>
      </div>

      <div class="form-group">
        <label for="pax" class="font-weight-bold text-dark">Number of Guests (Pax)</label>
        <input type="number" class="form-control" name="pax" min="1" max="100" required placeholder="e.g. 5">
      </div>

      <!--<div class="text-center mt-4">
        <button type="submit" class="btn btn-warning btn-lg px-4">
          Submit Booking <i class="fas fa-paper-plane ml-2"></i>
        </button>
      </div> -->
    </form>
  </div>
</div>
<script>
    $(function(){
        $('#book-form').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=book_tour",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        alert_toast("Book Request Successfully sent.")
                        $('.modal').modal('hide')
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>

<style>
    .card {
  border-radius: 10px;
  font-family: 'Merienda', cursive;
}

.card h4 {
  border-bottom: 2px solid #d2b48c;
  padding-bottom: 10px;
}
</style>